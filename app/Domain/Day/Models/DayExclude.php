<?php

namespace App\Domain\Day\Models;

use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayExclude extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return ($date) ? $date->format('Y-m-d H:i:s') : null;
    }
}
