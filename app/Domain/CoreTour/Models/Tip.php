<?php

namespace App\Domain\Coretour\Models;

use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function tips()
    {
        return $this->hasMany(TipLink::class);
    }
}
