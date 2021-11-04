<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;

    protected $fillable = [
        "sender_id", "sender_type", "receiver_type", 'receiver_id', 'body'
    ];

    protected $with = ['sender', 'receiver'];

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function sender()
    {
        return $this->morphTo();
    }

    public function receiver()
    {
        return $this->morphTo();
    }



}
