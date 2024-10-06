<?php

namespace App\Models;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'post',
        'image',
        'category_id',
        'tag_id',
        'user_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tag(){
        return $this->belongsTo(Tag::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}