<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name', 'phone_number', 'company_name', 'job_role', 
        'user_id', 'profile_pic', 'bio', 'company_phone_number',
        'links',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
