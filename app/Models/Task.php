<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'content', 'expiry_date', 'status', 'user_id', 'mentor_id', 'title', 'time_left', 'submission'
    ];

    public function mentees()
    {
        return $this->belongsTo(User::class);
    }

    // mentors
    public function mentors()
    {
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }
}
