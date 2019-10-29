<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    /**
     * Tell laravel which table to use
     * @var string
     */
    protected $table = 'reservations';

    /**
     * Laravel will be able to edit data in these columns
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'city', 'zip_code', 'address', 'email', 'phone', 'kids', 'normal', 'youth', 'elder', 'special', 'time'];

    public function people()
    {
        return ($this->kids + $this->normal + $this->youth + $this->elder + $this->special);
    }

    public function timelock()
    {
        return $this->hasOne(Timelock::class, 'id', 'time');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'reservation_id', 'id')->first();
    }

    public function zaal()
    {
        return Room::find($this->timelock()->first()->zaal_id);
    }

    public function total()
    {
        $time = $this->timelock()->first();
        $zaal = $this->zaal()->first();
        $people = $this->people();
        $total = 0;
        foreach ($this->toArray() as $key => $value) {
            if (in_array($key, ['kids', 'elder', 'youth', 'special', 'normal'])) {
                $total = $total + ($value * $this->prices[$key]);
            }
        }
        if ($zaal->{'3d'}) {
            $total = $total + $people * 0.50;
        }
        if ($zaal->atmos) {
            $total = $total + $people * 1.50;
        }
        if ($zaal->ultra) {
            $total = $total + $people * 2.50;
        }
        $total = $total + $people * $time->price;
        return $total;
    }

    private $prices = [
        'elder' => 9,
        'normal' => 10.80,
        'special' => 8.70,
        'kids' => 6.50,
        'youth' => 8.50
    ];
}
