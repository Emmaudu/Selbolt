<?php

namespace App\Http\Service;

use App\Interfaces\EmailInterface;
use Illuminate\Support\Facades\Mail;

class EmailService implements EmailInterface
{
    protected $customData;
    protected $to;
    protected $from = "makindet74@gmail.com";
    protected $subject;


    public function send($customData, $to, $subject, $view){
        
        Mail::send(
            $view,
            ["customData" => $customData],
            function ($m)use($to, $subject) {  
            $m->from($this->from);
            $m->to($to)->subject($subject);
            }
        );

        return true;
    }
}