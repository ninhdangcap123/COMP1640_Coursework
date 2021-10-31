<?php

namespace App\Models;

use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create( array $document )
 * @method static latest()
 * @property mixed $reads
 */
class Idea extends Model
{
    use HasFactory, Likeable;
    protected $fillable = [
      'title',
      'description',
        'uuid',
        'user_id',
        'category_id',
        'document',

    ];



    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable')->whereNull('parent_id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }




}
