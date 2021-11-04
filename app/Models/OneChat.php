<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OneChat extends Model
{
    use HasFactory;

    protected $fillable = ['receiver_id', 'sender_id', 'sender_type', 'receiver_type', 'channel'];
    
    protected $with = ['sender', 'receiver'];

    public function sender()
    {
        return $this->morphTo();
    }

    public function receiver()
    {
        return $this->morphTo();
    }

}
