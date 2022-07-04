<?php

namespace App\Domain\CoreTour\Models;

use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return ($date) ? $date->format('Y-m-d H:i:s') : null;
    }
}
