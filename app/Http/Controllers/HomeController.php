<?php

namespace App\Http\Controllers;

use App\Models\MentorUser;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mentor;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveTransaction(Request $request)
    {
        //$request
        $flw_ref = $request->flw_ref;
        $status = $request->status;
        $customer_email = $request->customer_email;
        $transaction_id = $request->transaction_id;
        $subaccount_id = $request->subaccount_id;
        $amount = $request->amount;
        $tx_ref = $request->tx_ref;
        $services = $request->services;
        $now = Carbon::now();
        $user = User::where('email', $customer_email)->first();
        //retrive mentor
        $mentor = Mentor::where('subaccount_id', $subaccount_id)->first();
        // get the pivot table
        $mentor_user = MentorUser::where('mentor_id', $mentor->id)->where('user_id', $user->id)->first();

        if($mentor_user == null){
            $mentor->mentees()->attach($user->id, [
                "status" => "active",
                "is_approve" => '1',
                "start_date" => $now,
                "end_date" => $now->addDays(7),
                "services" => json_encode($services)
            ]);

        }else{
            $mentor->mentees()->updateExistingPivot($user->id, [
                "status" => "active",
                "is_approve" => '1',
                "start_date" => $now,
                "end_date" => $now->addDays(7),
                "services" => json_encode($services)
            ]);
        }

        $mentor_user = MentorUser::where('mentor_id', $mentor->id)->where('user_id', $user->id)->first();
        //store details to transaction table
        Transaction::create([
            'status' => $status, 
            'payment_ref' => $flw_ref, 
            'mentor_user_id' => $mentor_user->id, 
            'amount' => $amount,
            'charge_amount' => $amount,
            'services' => json_encode($services)
        ]);

        return response()->json([
            "status" => 'success'
        ], 200);

    }
}
