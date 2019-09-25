<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    /**
     * Tell laravel which table to use
     * @var string
     */
    protected $table = 'bioscoop_users';

    /**
     * Laravel will be able to edit data in these columns
     * @var array
     */
    protected $fillable = ['bioscoop_id', 'user_id'];

}
