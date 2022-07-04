<?php

namespace App\Domain\Core\Models;

use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'tourguide_fee'=>'array',
    ];

    public function GuideFee(){
        return $this->tourguide_fee;
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return ($date) ? $date->format('Y-m-d H:i:s') : null;
    }
}
