<?php

namespace App\Domain\Coretour\Models;

use App\Domain\Core\Models\City;
use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
