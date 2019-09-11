<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Table to connect user to one or multiple roles
 * Class UserRole
 * @package App
 */

class UserRole extends Model
{
    /**
     * Tell laravel which table to use
     * @var string
     */
    protected $table = 'user_roles';

    /**
     * Laravel will be able to edit data in these columns
     * @var array
     */
    protected $fillable = ['role_id', 'user_id'];
}
