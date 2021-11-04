<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    //
    public function __construct(){
        //$this->middleware('cors');
        $this->middleware('auth:mentors')->except('savePaymentDetails');
    }

    public function subaccountView(){

        $bearerToken = 'Bearer '.env('FLW_SECRET_KEY');

        $response = Http::withHeaders([
            'Authorization' => $bearerToken
        ])->get('https://api.flutterwave.com/v3/banks/NG');

        $bankCodes = $response['data'];
       // dd($bankCodes);
        return view('mentor.subaccount', compact('bankCodes'));
    }

    public function createSubaccount(Request $request){
        // validate request
        $validator = Validator::make($request->all(), [
            "account_number" => ["required"],
            "bank_code" => ["required"],
            "mobile" => ["required"],
        ]);

        // catch request
        try {

            // check for validation
            if ($validator->passes()) {
                if(auth()->user()->subaccount_id == null){
                // make request to flutterwave API

                    $bearerToken = 'Bearer '.env('FLW_SECRET_KEY');
                    
                    $response = Http::withHeaders([
                        'Authorization' => $bearerToken
                    ])->post('https://api.flutterwave.com/v3/subaccounts', [
                        'account_bank' => $request->bank_code,
                        "account_number" => $request->account_number,
                        "business_name" => auth()->user()->company_name,
                        "business_email" => auth()->user()->email,
                        "business_mobile" => $request->mobile,
                        "country" => "NG",
                        "split_type" => "percentage",
                        "split_value" => 0.8
                    ]);

                    $responseBody = $response->json();

                    $status = $responseBody['status'];
                    if($status == "error") {
                        $statusCode = 400;
                        return redirect()->back()->with(["success" => "Something went wrong"]); 
                    }else {
                        $statusCode = 200;
                        auth()->user()->update(['subaccount_id' => $responseBody['data']['subaccount_id']]);
                        return redirect()->back()->with(["success" => "Successfully Linked"]); 
                    }
                    //dd($responseBody);
                    // return response
                    return redirect()->back()->with(["success" => "Successfully Linked"]);  
                
                }else{
                    $bearerToken = 'Bearer '.env('FLW_SECRET_KEY');
                    
                    $response = Http::withHeaders([
                        'Authorization' => $bearerToken
                    ])->put('https://api.flutterwave.com/v3/subaccounts/'.auth()->user()->subaccount_id, [
                        'account_bank' => $request->bank_code,
                        "account_number" => $request->account_number,
                        "business_name" => auth()->user()->company_name,
                        "business_email" => auth()->user()->email,
                    ]);

                    $responseBody = $response->json();

                    $status = $responseBody['status'];
                    
                    if($status == "error") {
                        $statusCode = 400;
                    }else {
                        $statusCode = 200;
                        auth()->user()->update(['subaccount_id' => $responseBody['data']['subaccount_id']]);
                    }
                    return redirect()->back()->with(["success" => "Updated Successfully"]); 


                }
                // return response
                return redirect()->back()->withErrors($validator->errors());
            }

        } catch (Exception $ex) {
            return redirect()->back()->with(["error" => "Error occured!"]);
        }
        
    }

    public function deleteSubaccount(Request $request){
        // catch request
        try {

            // make request to flutterwave API
            $bearerToken = 'Bearer '.env('FLW_SECRET_KEY');

            $response = Http::withHeaders([
                'Authorization' => $bearerToken
            ])->delete('https://api.flutterwave.com/v3/subaccounts/'.auth()->user()->subaccount_id);

            $responseBody = $response->json();

            $status = $responseBody['status'];
            if(!$status) {
                $statusCode = 400;
            }else {
                $statusCode = 200;
                auth()->user()->update(['subaccount_id' => null]);
            }

            // return response
            return response()->json([], $statusCode);
        

            // return response
            return response()->json([
                "error" =>$validator->errors()
            ], 400);
            

        } catch (Exception $ex) {

            return response()->json([
                "message" => "internal server error",
                "error" => $ex->getMessage()
            ], 500);
        }
        
    }

    /* retrive subaccount details using work id
     * 
     * @param work id of the artwork
     * @return response
     */

    public function retriveSubaccount($id){
        try {
            //retrive work
            $mentor = Mentor::whereId($id)->first();

            return response()->json([
                "subaccount_id" => $mentor->subaccount_id
            ], 200);

        } catch (Exception $ex) {

            return response()->json([
                "message" => "probably invalid work id",
                "error" => $ex->getMessage()
            ], 500);
        }
        
    }

    public function savePaymentDetails(Request $request){
        $mentorId = $request->id;
        $amount = $request->amount;
        $payment_ref = $request->payment_ref;
        $user_id = $request->auth_user;
        $services = $request->services;

        //fetch mentee
        // assign mentee to mentor
        $mentor = Mentor::whereId($mentorId)->first();
        $mentor_user = $mentor->mentees()->where('user_id', $user_id)->count();
        $now = Carbon::now();
        
        if($mentor_user == 0){
            $mentor_user = $mentor->attach($user_id, [
                "status" => "active",
                "is_approve" => '1',
                "start_date" => $now,
                "end_date" => $now->addDays(7)
            ]);
        }else{
            $mentor_user = $mentor->sync($user_id, [
                "status" => "active",
                "is_approve" => '1',
                "start_date" => $now,
                "end_date" => $now->addDays(7),
            ]);
        }

        // get the pivot table
        $mentor_user = DB::table('mentor_user')->where('mentor_id', $mentorId)->where('user_id', $user_id)->get();
        
        //add transaction details
        $transaction = new Transaction;
        $transaction->mentor_user_id = $mentor_user[0]->id;
        $transaction->amount = $amount;
        $transaction->charge_amount = $amount;
        $transaction->payment_ref = $payment_ref;
        $transaction->services = json_encode($services);
        $transaction->save();

        return response()->json([
            "message" => "success"
        ], 200);
    }
}


