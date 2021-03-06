<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user() {
    	return $this->belongsTo(User::class);
    }
    public function likes() {
    	return $this->hasMany(Like::class, 'post_id');
    }
    public function comments() {
    	return $this->hasMany(Comment::class, 'post_id');
    }
    public function images() {
    	return $this->hasMany(PostImage::class, 'post_id');
    }
}
