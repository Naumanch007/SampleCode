<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coaching extends Model
{
    const SHORT_YES = 'yes';
    const SHORT_NO = 'yes';
    const SHORT_WEEKDAYS = 'weekdays';
    const SHORT_WEEKEND = 'weekend';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'short', 'description'
    ];

    public function studio()
    {
        return $this->belongsTo('App\Studio');
    }
}
