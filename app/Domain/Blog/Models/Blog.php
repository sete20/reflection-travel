<?php

namespace App\Domain\Blog\Models;

use App\Domain\Coretour\Models\Faqlink;
use App\Domain\CoreTour\Models\Highlightlink;
use App\Domain\Coretour\Models\TipLink;
use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Blog extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function faqs()
    {
        return $this->morphMany(Faqlink::class, 'faqlinkable');
    }

    public function scopeSaveColumns($q)
    {
        return $q->select(['id', 'slug', 'blog_cat_id', 'title', 'created_at']);
    }

    public function highlights()
    {
        return $this->morphMany(Highlightlink::class, 'highlightlinkable');
    }

    public function tips()
    {
        return $this->morphMany(Tiplink::class, 'tiplinkable');
    }

    public function category()
    {
        return $this->belongsTo(BlogCat::class, 'blog_cat_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('media')
            ->useDisk('media')
            ->withResponsiveImages();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function getCommentsCountAttribute()
    {
        return $this->comments->count();
    }
}
