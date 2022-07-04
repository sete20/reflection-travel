<?php

namespace App\Domain\Step\Models;

use App\Domain\Core\Models\City;
use App\Domain\CoreTour\Models\Attendant;
use App\Domain\Coretour\Models\Permit;
use App\Domain\Coretour\Models\Place;
use App\Domain\Coretour\Models\Transport;
use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }
    public function permit()
    {
        return $this->belongsTo(Permit::class);
    }
    public function attendant()
    {
        return $this->belongsTo(Attendant::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function includes()
    {
        return $this->hasMany(StepInclude::class, 'step_id', 'id');
    }

    public function excludes()
    {
        return $this->hasMany(StepExclude::class, 'step_id', 'id');
    }
}
