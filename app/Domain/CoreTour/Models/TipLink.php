<?php

namespace App\Domain\Coretour\Models;

use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipLink extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function tipLinkable()
    {
        return $this->morphTo();
    }
}
