<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timelock extends Model
{
    /**
     * Tell laravel which table to use
     * @var string
     */
    protected $table = 'timelocks';

    /**
     * Laravel will be able to edit data in these columns
     * @var array
     */
    protected $fillable = ['start', 'end', 'date', 'zaal_id', 'price', 'available'];

    public $timestamps = false;

    public function zaal()
    {
        return $this->hasOne(Room::class, 'id', 'zaal_id');
    }
}
