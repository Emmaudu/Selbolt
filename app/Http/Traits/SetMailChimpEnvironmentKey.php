<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Config;

trait SetMailChimpEnvironmentKey
{
    protected $audienceKey;

    public function setAudienceKey($key){
        $this->audienceKey = $key;

        return true;
    }

    public function setKeyOnEnvironmentChange(){
        
        if(app()->environment('local')){
            Config::set('newsletter.lists.subscribers.id', $this->audienceKey);
        }

        return true;

    }

}