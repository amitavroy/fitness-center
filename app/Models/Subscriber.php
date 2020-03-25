<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $guarded = [];

    public function getRenewalDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
