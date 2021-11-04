<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function messages(){
        return $this->hasMany(Messages::class);
    }

    public function mentees()
    {
        return $this->morphByMany(User::class, 'roomables');
    }

    public function mentors()
    {
        return $this->morphByMany(Mentor::class, 'roomables');
    }

}
