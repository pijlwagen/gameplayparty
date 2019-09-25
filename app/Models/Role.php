<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    /**
     * Tell laravel which table to use
     * @var string
     */
    protected $table = 'roles';

    /**
     * Laravel will be able to edit data in these columns
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get all users that have this role
     * @return \Illuminate\Database\Eloquent\Collection
     */

    public function users()
    {
        return $this->hasManyThrough(User::class, UserRole::class, 'role_id', 'id', 'id', 'user_id')->get();
    }
}
