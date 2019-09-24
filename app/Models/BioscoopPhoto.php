<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BioscoopPhoto extends Model
{
    /**
     * Tell laravel which table to use
     * @var string
     */
    protected $table = 'bioscoop_files';

    /**
     * Laravel will be able to edit data in these columns
     * @var array
     */
    protected $fillable = ['bioscoop_id', 'file'];
}
