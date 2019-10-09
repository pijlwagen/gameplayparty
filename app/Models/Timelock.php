<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timelock extends Model
{
    /**
     * Tell laravel which table to use
     * @var string
     */
    protected $table = 'bioscoop_tijden';

    /**
     * Laravel will be able to edit data in these columns
     * @var array
     */
    protected $fillable = ['start', 'end', 'date'];
}
