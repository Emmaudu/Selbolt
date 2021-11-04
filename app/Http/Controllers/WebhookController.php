<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class WebhookController extends Controller
{
    public function transactionWebhook(Request $request){
        // Retrieve the request's body
        $body = $request->input();

        // retrieve the signature sent in the reques header's.
        $signature = $request->header('verif-hash');
        
        /* It is a good idea to log all events received. Add code *
        * here to log the signature and body to db or file       */
        
        if (!$signature) {
            // only a post with rave signature header gets our attention
            return;
        }

        // Store the same signature on your server as an env variable and check against what was sent in the headers
        $local_signature = env('SECRET_HASH');

        // confirm the event's signature
        if( $signature !== $local_signature ){
        // silently forget this ever happened
            return;
        }

        // pass this to job
        if ($body->status == 'successful') {
            
        }

        return response(null, 200); // PHP 5.4 or greater
        // parse event (which is json string) as object
        // Give value to your customer but don't give any output
        // Remember that this is a call from rave's servers and 
        // Your customer is not seeing the response here at all
        

        
        
    }
}
