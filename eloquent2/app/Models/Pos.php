<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pos extends Model
{
    // use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getGetTitleAttribute()
    {
        return strtoupper($this->title); // el 'strtoupper' retorma en mayúscula
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);
    }
}
