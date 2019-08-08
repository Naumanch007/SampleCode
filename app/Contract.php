<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    const SHORT_24 = '24m';
    const SHORT_12 = '12m';
    const SHORT_1 = '1m';

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
