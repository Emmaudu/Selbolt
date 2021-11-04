<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable 
{
    use HasFactory, Notifiable, Softdeletes;
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'login_status', 'first_name', 'last_name', 'email', 'password', 'phone_number', 'verification_code', 'pic', 'pic_id', 'channel'
    ];  
    
    protected $appends = ['custom_id'];
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function mentors()
    {
        return $this->belongsToMany(Mentor::class, 'mentor_user')->withPivot('status', 'end_date', 'start_date');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function fullname(){
        return ($this->first_name).' '.($this->last_name);
    }

    public function mentorUser(){
        return $this->hasMany(MentorUser::class, 'user_id');
    }

    public function transactions(){
        return $this->HasManyThrough(Transaction::class, MentorUser::class);
    }

    public function pendingTransactions(){
        $pendingTransactions = collect($this->transactions)->filter(function($trans){
            return $trans->status == 'pending';
        });

        return $pendingTransactions;
        //return $this->transactions()->where('status', 'pending')->get();
    }

    public function receivedMessages(){
        return $this->morphMany(Messages::class, "receiver");
    }


    public function senderMessages(){
        return $this->morphMany(Messages::class, "sender");
    }

    public function senderOneChat(){
        return $this->morphMany(OneChat::class, "sender");
    }

    public function receiverOneChat(){
        return $this->morphMany(OneChat::class, "receiver");
    }

    public function rooms(){
        return $this->morphToMany(Room::class, 'roomables');
    }
    
    public function chatMembers(){
        // query receivers 
        $receiver = $this->receiverOneChat;

        // query senders 
        $sender = $this->senderOneChat;

        //get unique message and pluck 
        $receiver = collect($receiver)->unique('sender_id')->pluck('sender');

        //get unique message and pluck 
        $sender = collect($sender)->unique('receiver_id')->pluck('receiver');

        
        return array_merge($receiver->toArray(), $sender->toArray());//[$receiver->all()[], $sender->all()];
    }

    public function getCustomIdAttribute()
    {
        return 'user-'.$this->id;
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
