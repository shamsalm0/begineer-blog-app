<?php

namespace App\Models;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'post',
        'category_id',
        'tag_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tag(){
        return $this->belongsTo(Tag::class);
    }
}