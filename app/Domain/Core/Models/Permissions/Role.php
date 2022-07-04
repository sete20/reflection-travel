<?php

namespace  App\Domain\Core\Models\Permissions;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
