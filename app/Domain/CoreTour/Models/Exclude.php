<?php

namespace App\Domain\CoreTour\Models;

use App\Domain\Core\Models\City;
use App\Domain\Step\Models\StepExclude;
use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exclude extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function booted()
    {
        static::deleting(function ($record) {
            foreach ($record->step_excludes as $item) {
                $item->delete();
            }
        });
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function step_excludes()
    {
        return $this->hasMany(StepExclude::class, 'exclude_id', 'id');
    }
}
