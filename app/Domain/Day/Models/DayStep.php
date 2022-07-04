<?php

namespace App\Domain\Day\Models;

use App\Domain\Step\Models\Step;
use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayStep extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return ($date) ? $date->format('Y-m-d H:i:s') : null;
    }

    public function step() {
        return $this->belongsTo(Step::class);
    }
}
