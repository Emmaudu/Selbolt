<?php
namespace App\Interfaces;


interface EmailInterface{

    /**
     * @return array that belongs to a users
     * 
     * 
     */
    public function send($customData, $to, $subject, $view);
    
}