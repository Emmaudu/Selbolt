<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'status', 'payment_ref', 'mentor_user_id', 'amount', 'charge_amount', 'services'
    ];

    public function mentorUser(){
        return $this->belongsTo(MentorUser::class, 'mentor_user_id');
    }
}
