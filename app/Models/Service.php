<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "price", "status"
    ];

    public function mentors(){
        return $this->belongsToMany(Mentor::class, 'mentor_service')->withPivot('price');
    }

}
