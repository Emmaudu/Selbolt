<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Config;

trait AuthorizeUserView
{

    public function checkAuthentication(){
        $guards = ['mentors', 'admins', 'web'];

        collect($guards)->first(function($guard){
            if(auth($guard)->check()) return abort(403);
        });
    }

}