<?php

namespace App;

use App\Models\Bioscoop;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Editor;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Laravel will be able to edit the following columns
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * Laravel will hide these columns
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Laravel will convert the following attributes to datatypes
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the roles of this user
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function roles()
    {
        return $this->hasManyThrough(Role::class, UserRole::class, 'user_id', 'id', 'id', 'role_id')->get();
    }

    public function bioscopen()
    {
        return $this->hasManyThrough(Bioscoop::class, Editor::class, 'user_id', 'id', 'id', 'bioscoop_id')->get();
    }

    public function isAdmin()
    {
        return !!$this->roles()->where("name", "Beheerder")->first();
    }

    public function isEditor()
    {
        return !!$this->roles()->where("name", "Redacteur")->first();
    }
}
