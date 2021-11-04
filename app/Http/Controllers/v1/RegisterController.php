<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Validator;
use Hash;
use Exception;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    /**
     * register user function
     */

    public function register(Request $request){
        try {
            $validated = Validator::make($request->all(), [
                'full_name' => 'required',
                'phone_number' => 'unique:profiles',
                'email' => 'required|email|unique:users',
                'company_name' => '',
                'company_phone_number' => '',
                'mobile' => 'required',
                'account_number' => 'required',
                'bio' => '',
                'job_role' => '',
                'password' => 'required',
                'username' => 'required|unique:users',
                'facebook_link' => '',
                'linkedin_link' => '',
                'twitter_link' => '',
                'instagram_link' => '',
                'website_link' => '',
            ]);
            
            if ($validated->passes()) {
                $bankCode = $request->bank_code;
                $accountNumber = $request->account_number;
                $businessEmail = $request->email;
                $businessPhone = $request->mobile;
                $businessName = $request->company_name;

                $this->createSubaccount($bankCode, $accountNumber, $businessName, $businessEmail, $businessPhone);
                
                $user = User::create([
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);

                $links = [
                    'website_link' => $request->website_link,
                    'instagram_link' => $request->instagram_link,
                    'twitter_link' => $request->twitter_link,
                    'linkedin_link' => $request->instagram_link,
                    'facebook_link' => $request->facebook_link,
                ];
                $profile = Profile::create([
                    'phone_number' => $request->phone_number,
                    'job_role' => $request->job_role,
                    'company_name' => $request->company_name,
                    'full_name' => $request->full_name,
                    'user_id' => $user->id,
                    'links' => json_encode($links),
                    'company_phone_number' => $request->company_phone_number,
                    'bio' => $request->bio,
                ]);
                
                return response()->json(['message' => 'account created successfully'], 201);
    
            }
    
            return response()->json(['message' => $validated->errors()], 400);
        } catch (Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
        
        
    }

    /**
     * @param $bankCode, $accountNumber, $businessName, $businessEmail, $businessPhone
     * 
     * @return $bankCode, $accountNumber, $businessName, $businessEmail, $businessPhone
     */

    public function createSubaccount($bankCode, $accountNumber, $businessName, $businessEmail, $businessPhone){

        // make request to flutterwave API
        $bearerToken = 'Bearer '.env('FLW_SECRET_KEY');
        
        $response = Http::withHeaders([
            'Authorization' => $bearerToken
        ])->post('https://api.flutterwave.com/v3/subaccounts', [
            'account_bank' => $bankCode,
            "account_number" => $accountNumber,
            "business_name" => $businessName,
            "business_email" => $businessEmail,
            "business_mobile" => $businessPhone,
            "country" => "NG",
            "split_type" => "percentage",
            "split_value" => 0
        ]);

        $responseBody = $response->json();

        $status = $responseBody['status'];
        if($status == "error") {
            $statusCode = 400;
        }else {
            $statusCode = 200;
            auth()->user()->update(['subaccount_id' => $responseBody['data']['subaccount_id']]);
        }

        // return response
        return $statusCode;
            
        
    }
}
