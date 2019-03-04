<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * Items Table
     *
     * @var string
     */
    protected $table = 'items';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function measurement()
    {
        return $this->belongsTo(Measurement::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
