<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function posts() {
        return $this->hasMany(Post::class);
    }
    public function profile() {
        return $this->hasOne(Profile::class);
    }
    public function likes() {
        return $this->hasMany(Like::class, 'user_id');
    }
    public function comments() {
        return $this->hasMany(Comment::class, 'user_id');
    }
    public function postImages() {
        return $this->hasMany(PostImage::class, 'user_id');
    }
    public function friends() {
        return $this->belongsToMany(User::class, 'friends' , 'user_id', 'friend_id');
    }
    public function friendRequests() {
        return $this->hasMany(FriendRequest::class, 'receiver');
    }
    public function conversations() {
        return $this->hasMany(Conversation::class);
    }

}
