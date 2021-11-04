<?php

namespace App\Http\Service;

use App\Interfaces\NewsletterInterface;
use Newsletter;

class NewsletterService implements NewsletterInterface
{

    public function subscribe($email, $firstname, $lastname, $tag)
    {
        
        Newsletter::subscribeOrUpdate($email, ['FNAME'=> $firstname,'LNAME'=> $lastname], 'subscribers', ['users'=> $tag]);
        Newsletter::addTags([$tag], $email);
        
        return true;
    }

    public function unsubcribe($email)
    {
        if ( ! Newsletter::isSubscribed($email) ) {
            Newsletter::unsubscribe($this->email);
            
            return true;
        }
        return false;
    }
    
}
