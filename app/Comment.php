<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'xe_comments';
    protected $primaryKey = 'comment_srl';
    public $timestamps = true;

    protected $fillable = [
        'content', 'nick_name', 'user_name','member_srl', 'document_srl', 'email_address', 'ipaddress'
    ];

    public function post(){
        return $this->belongsTo(Post::class, 'document_srl');
    }

    public  function replies(){
        return $this->hasMany('App/CommentReply');
    }
    public function users()
    {
        $this->belongsTo(User::class, 'member_srl');
    }
}
