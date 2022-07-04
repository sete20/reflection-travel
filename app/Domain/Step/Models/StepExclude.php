<?php

namespace App\Domain\Step\Models;

use App\Domain\CoreTour\Models\Exclude;
use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepExclude extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function exclude() {
        return $this->belongsTo(Exclude::class);
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return ($date) ? $date->format('Y-m-d H:i:s') : null;
    }
}
