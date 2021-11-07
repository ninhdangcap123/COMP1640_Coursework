<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'idea_start_date',
        'idea_end_date',
        'comment_start_date',
        'comment_end_date'
    ];
    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }



}
