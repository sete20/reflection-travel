<?php

namespace App\Domain\Blog\Models;

use App\Domain\Coretour\Models\Faqlink;
use App\Domain\CoreTour\Models\Highlightlink;
use App\Domain\Coretour\Models\TipLink;
use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class BlogCat extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $guarded = [];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function section()
    {
        return $this->belongsTo(BlogSection::class, 'blog_section_id');
    }

    public function faqs()
    {
        return $this->morphMany(Faqlink::class, 'faqlinkable');
    }

    public function highlights()
    {
        return $this->morphMany(Highlightlink::class, 'highlightlinkable');
    }

    public function tips()
    {
        return $this->morphMany(TipLink::class, 'tiplinkable');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('media')
            ->useDisk('media')
            ->withResponsiveImages();
    }
}
