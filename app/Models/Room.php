<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    /**
     * Tell laravel which table to use
     * @var string
     */
    protected $table = 'zalen';

    /**
     * Laravel will be able to edit data in these columns
     * @var array
     */
    protected $fillable = ['bioscoop_id', 'seats', 'handicapped_seats'];
}
