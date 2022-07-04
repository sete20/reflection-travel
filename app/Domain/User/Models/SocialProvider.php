<?php

namespace App\Domain\User\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SocialProvider extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $fillable = ['avatar', 'avatar_link', 'provider', 'provider_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('profile')
            ->useDisk('profile');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200)
            ->sharpen(10);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
