<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBlock extends Model
{
    /**
     * Tell laravel which table to use
     * @var string
     */
    protected $table = 'user_blocks';

    /**
     * Laravel will be able to edit data in these columns
     * @var array
     */
    protected $fillable = ['user_id', 'block_id'];
}
