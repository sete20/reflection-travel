<?php

namespace App\Domain\Step\Models;

use App\Domain\CoreTour\Models\IncludeModel;
use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepInclude extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function include() {
        return $this->belongsTo(IncludeModel::class);
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return ($date) ? $date->format('Y-m-d H:i:s') : null;
    }
}
