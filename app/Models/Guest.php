<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'email', 'name', 'user_id',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
