<?php

namespace App\Domain\Blog\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Domain\Blog\Models\Blog;
use App\Domain\User\Models\User;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
