<?php

namespace App\Domain\Blog\Models;

use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class BlogSubCategory extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(BlogCat::class, 'parent_category_id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('media')
            ->useDisk('media')
            ->withResponsiveImages();
    }
}
