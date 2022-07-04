<?php

namespace App\Domain\Tour\Models;

use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Benfit extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $guarded = [];
}
