<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    /**
     * Shipping Type Table
     *
     * @var string
     */
    protected $table = 'shippings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
