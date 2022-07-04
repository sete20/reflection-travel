<?php

namespace App\Domain\CoreTour\Models;

use App\Support\Concerns\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $dates = ['date'];
}
