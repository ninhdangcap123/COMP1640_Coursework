<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [

    ];
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function ideas(){
        return $this->belongsTo(Comment::class,'comment_id');
    }
}
