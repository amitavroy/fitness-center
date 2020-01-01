<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $guarded = [];

    public function reminders()
    {
        return $this->hasMany(Reminder::class)
            ->orderByDesc('id');
    }
}
