<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * Class Advert
 * @package App
 */
class Advert extends Model
{
    use Searchable;

    const ACTIVE_STATUS = 1;
    const CLOSED_STATUS = 0;

    public $timestamps = false;

    protected $fillable = ['title', 'category_id', 'description', 'city_id', 'price', 'pub_date', 'user_id'];

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
        return $this->hasOne(Photo::class);
    }

    /** SCOPES */
    public function scopeActive(Builder $query)
    {
        return $query->whereStatus(self::ACTIVE_STATUS);
    }

    /** METHODS */
    public function close()
    {
        $this->status = self::CLOSED_STATUS;
        $this->save();
    }
}
