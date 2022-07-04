<?php

namespace App\Domain\Accommodation\Models;

use App\Domain\Core\Models\City;
use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $appends = ['view_ids'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function prices()
    {
        return $this->hasMany(AccommodationPrice::class);
    }

    public function views() {
        return $this->belongsToMany(AccommodationView::class, 'accommodation_view');
    }

    public function viewsIn($ids)
    {
        return $this->prices()
            ->whereIn('view_id', $ids)
            ->groupBy('view_id')
            ->pluck('view_id')
            ->toArray();
    }

    public function deleteViewPrices($ids)
    {
        return $this->prices()
            ->whereNotIn('view_id', $ids)
            ->whereNotNull('view_id')
            ->delete();
    }

    public function getViewIdsAttribute()
    {
        return $this->prices()
            ->whereNotNull('view_id')
            ->groupBy('view_id')
            ->pluck('view_id')
            ->toArray();
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
