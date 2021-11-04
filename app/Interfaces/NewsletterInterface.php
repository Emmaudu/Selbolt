<?php
namespace App\Interfaces;

interface NewsletterInterface{

    /**
     * @return array subscribe to newsletter
     * 
     * 
     */
    public function subscribe($email, $firstname, $lastname, $tag);

    /**
     * @return array unsubscibe to newsletter
     * 
     * 
     */
    public function unsubcribe($email);


}