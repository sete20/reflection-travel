<?php

namespace App\Domain\Accommodation\Models;

use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccommodationPrice extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return ($date) ? $date->format('Y-m-d H:i:s') : null;
    }

    public function view()
    {
        return $this->belongsTo(View::class);
    }

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class);
    }
}
