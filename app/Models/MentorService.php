<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorService extends Model
{
    use HasFactory;

    protected $fillable = [
        "mentor_id", "service_id", "price"
    ];

    protected $table = "mentor_service";

    public function mentors(){
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }
}
