<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MentorUser extends Model
{
    use HasFactory;

    public $incrementing = true;

    protected $fillable = [
        "mentor_id", "user_id", "status", "start_date", "end_date", "interval", "is_approve", "delay", "services"
    ];
    
    protected $table = 'mentor_user';

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mentors(){
        return $this->belongsTo(Mentor::class, 'mentor_id');
    }

    public function transaction(){
        return $this->hasMany(Transaction::class, 'mentor_user_id');
    }

    public function pendingTransaction(){
        return $this->transaction()->where('status', 'pending')->get();
    }
}
