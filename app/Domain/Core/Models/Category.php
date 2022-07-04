<?php

namespace App\Domain\Core\Models;

use App\Domain\Tour\Models\Tour;
use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return ($date) ? $date->format('Y-m-d H:i:s') : null;
    }

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class, 'parent_id');
    }
    public function scopeTopCategories($q)
    {
        return $q->with(['media'])->withCount('tours')->havingRaw('tours_count > 0')->orderBy('tours_count', 'DESC')->limit(4);
    }
}
