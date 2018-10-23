<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $table = 'comment_replies';

    public function comment(){
        return $this->belongsTo('App/Comment');
    }
    public function users(){
        return $this->hasMany('App/User');
    }
}
