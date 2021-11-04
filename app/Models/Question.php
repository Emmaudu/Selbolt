<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'content', 'mentor_id'
    ];

    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }
    
    public function answer()
    {
        return $this->hasOne(Answer::class);
    }
}
