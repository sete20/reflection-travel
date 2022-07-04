<?php

namespace App\Domain\Day\Models;

use App\Domain\Core\Models\City;
use App\Domain\Coretour\Models\Airport;
use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function airport()
    {
        return $this->belongsTo(Airport::class);
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function includes()
    {
        return $this->hasMany(DayInclude::class, 'day_id', 'id');
    }

    public function excludes()
    {
        return $this->hasMany(DayExclude::class, 'day_id', 'id');
    }

    public function steps()
    {
        return $this->hasMany(DayStep::class, 'day_id', 'id');
    }
}
