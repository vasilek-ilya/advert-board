<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Advert
 * @package App
 */
class Advert extends Model
{
    const ACTIVE_STATUS = 1;
    const CLOSED_STATUS = 0;

    public $timestamps = false;

    /** RELATIONS */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function main_photo()
    {
        return $this->hasMany(Photo::class)->take(1);
    }

    /** SCOPES */
    public function scopeActive(Builder $query)
    {
        return $query->whereStatus(self::ACTIVE_STATUS);
    }
}
