<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'time_24hours', 'street', 'postal_code', 'coaching', 'shower', 'contract', 'city'
    ];

    public function contract()
    {
        return $this->hasOne('App\Contract', 'short','contract');
    }

    public function shower()
    {
        return $this->hasOne('App\Shower', 'short','shower');
    }

    public function coaching()
    {
        return $this->hasOne('App\Coaching', 'short','coaching');
    }
}
