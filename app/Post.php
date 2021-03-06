<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name
    protected $table = 'xe_documents';
    // Primary Key
    protected $primaryKey = 'document_srl';
    public $timestamps = false;
    // Timestamps
    //public $timestamps = false;
    

    protected $fillable = [
        'module_srl', 'title', 'content', 'user_name', 'member_srl', 'email_address', 'regdate', 'last_update','nick_name', 'file', 'file_type'
    ];

    // protected $guarded = [];

    public function users(){
        return $this->belongsTo(User::class, 'member_srl' );
    }


    public function comments(){
        return $this->hasMany(Comment::class, 'comment_srl' , 'comment_srl');
    }
}
