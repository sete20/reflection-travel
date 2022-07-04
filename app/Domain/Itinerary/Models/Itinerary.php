<?php

namespace App\Domain\Itinerary\Models;

use App\Domain\Day\Models\Day;
use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function days() {
        return $this->belongsToMany(Day::class);
    }

    public function weekDays() {
        return $this->hasMany(ItineraryWeek::class);
    }
}
