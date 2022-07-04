<?php

namespace App\Domain\Coretour\Models;

use App\Domain\Core\Models\City;
use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function dropOffCity()
    {
        return $this->belongsTo(City::class, 'drop_off_city_id');
    }

    public function pickUpCity()
    {
        return $this->belongsTo(City::class, 'pickup_city_id');
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
