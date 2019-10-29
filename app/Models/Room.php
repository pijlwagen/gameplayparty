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
    protected $fillable = ['bioscoop_id', 'seats', 'handicapped_seats', 'name', 'slug', 'atmos', 'dolby', '3d', 'ultra'];

    public function tijden()
    {
        return $this->hasMany(Timelock::class, 'zaal_id', 'id')->get();
    }

    public function bioscoop()
    {
        return $this->hasOne(Bioscoop::class, 'id', 'bioscoop_id')->first();
    }
}
