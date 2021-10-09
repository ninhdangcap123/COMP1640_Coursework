<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentComment extends Model
{
    use HasFactory;
    public function comments(){
        return $this->belongsTo(Comment::class, 'comment_id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id');

    }
    public function ideas(){
        return $this->belongsTo(Idea::class, 'idea_id');
    }
}
