<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shower extends Model
{
    const SHORT_FREE = 'free';
    const SHORT_FEE = 'fee';
    const SHORT_NO = 'no';

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
