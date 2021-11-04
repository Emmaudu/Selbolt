<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Mentor extends Authenticatable 
{
    use HasFactory, Notifiable, Softdeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'verification_code',
        'job_title',
        'company_name',
        'level',
        'subaccount_id',
        'bio',
        'why_a_mentor',
        'career_success',
        'tag',
        'social',
        'category_id',
        'mobile',
        'pic',
        'pic_id',
        'username',
        'country',
        'is_approve',
        'login_status'
    ];

    protected $appends = ['custom_id', 'custom_reviews'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function fullname(){
        return ($this->first_name).' '.($this->last_name);
    }

    public function mentees()
    {
        return $this->belongsToMany(User::class, 'mentor_user')->withPivot('status', 'delay');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'mentor_id');
    }

    public function activeMentees()
    {
        return $this->mentees()->wherePivot('status', 'active')->wherePivot('is_approve', 1);
    }

    public function inactiveMentees()
    {
        return $this->mentees()->wherePivot('status', 'inactive')->wherePivot('is_approve', 1);
    }

    public function unApproveMentees(){
        return $this->mentees()->wherePivot('is_approve', 0);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function services(){
        return $this->belongsToMany(Service::class, 'mentor_service')->withPivot('price');
    }

    public function activeServices(){
        return $this->services()->where('status', 'general')->get();
    }

    public function extraServices(){
        return $this->services()->where('status', 'extra')->get();
    }

    public function mentor_service(){
        return $this->hasMany(MentorService::class, 'mentor_id');
    }

    public function price(){
        $generalService = $this->services()->where('status', 'general')->get();
        $sum = 0;
        
        foreach ($generalService as $generalService) {
            $sum +=$generalService->pivot->price;
        }
        return $sum;
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

    public function rooms(){
        return $this->morphToMany(Room::class);
    }

    public function senderOneChat(){
        return $this->morphMany(OneChat::class, "sender");
    }

    public function receiverOneChat(){
        return $this->morphMany(OneChat::class, "receiver");
    }
    
    public function chatMembers(){
        // query receivers messages
        $receiverMessages = $this->receiverOneChat;

        // query senders messages
        $senderMessages = $this->senderOneChat;

        //get unique message and pluck 
        $receiver = collect($receiverMessages)->unique('sender_id')->pluck('sender');

        //get unique message and pluck 
        $sender = collect($senderMessages)->unique('receiver_id')->pluck('receiver');

        
        return array_merge($receiver->toArray(), $sender->toArray());//[$receiver->all()[], $sender->all()];
    }

    public function getCustomIdAttribute()
    {
        return 'mentor-'.$this->id;
    }

    public function getCustomReviewsAttribute()
    {
        $points = collect($this->reviews)->pluck('points')->avg();
        return $points;
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class, 'mentor_id');
    }

    public function answers(){
        return $this->hasMany(Answer::class)->distinct('user_id');
    }
    
}
