<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        "answer", "mentor_id", "user_id", "question_id"
    ];

    protected $table = 'answers';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function mentor(){
        return $this->belongsTo(Mentor::class);
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }


}
