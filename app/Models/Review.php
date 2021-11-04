<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'points', 'mentor_id', 'name'
    ];

    public function mentors()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }
}
