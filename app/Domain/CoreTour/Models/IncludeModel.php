<?php

namespace App\Domain\CoreTour\Models;

use App\Domain\Core\Models\City;
use App\Domain\Day\Models\DayInclude;
use App\Domain\Step\Models\StepInclude;
use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncludeModel extends Model
{
    use HasFactory;
    protected $table = 'includes';

    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function step_includes()
    {
        return $this->hasMany(StepInclude::class, 'include_id', 'id');
    }

    public function day_includes()
    {
        return $this->hasMany(DayInclude::class, 'include_id', 'id');
    }
}
