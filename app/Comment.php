<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'xe_comments';
    protected $primaryKey = 'comment_srl';
    public $timestamps = false;


    protected $fillable = [
        'content', 'nick_name', ''
    ];

    public function posts(){
        return $this->belongsTo('App\Post');
    }
}
