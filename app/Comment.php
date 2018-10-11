<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'xe_comments';
    protected $primaryKey = 'comment_srl';

    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'content', 'nick_name', 'user_name','member_srl', 'module_srl', 'document_srl', 'email_address', 'ipaddress'
    ];

    public function posts(){
        return $this->belongsTo('App\Post');
    }
}
