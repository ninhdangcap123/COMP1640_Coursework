<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;
    public function categories(){
        return $this->belongsTo(Category::class);
    }
    public function comments()
    {
        return $this->belongsTo(Comment::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
