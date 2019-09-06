<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function messages(){
    	return $this->hasMany(Message::class, 'conversation_id', 'conversation_id');
    }

    public function contact(){
    	return $this->hasOne(User::class, 'id', 'contact_id');
    }
}
