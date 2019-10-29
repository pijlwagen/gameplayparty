<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Payment extends Model
{
    /**
     * Tell laravel which table to use
     * @var string
     */
    protected $table = 'payments';

    /**
     * Laravel will be able to edit data in these columns
     * @var array
     */
    protected $fillable = ['payerID', 'paymentID', 'reservation_id', 'amount'];

    public function reservation()
    {
        return $this->hasOne(Reservation::class, 'id', 'reservation_id')->first();
    }

    public function timelock()
    {
        return $this->reservation()->timelock()->first();
    }

    public function zaal()
    {
        return $this->reservation()->zaal();
    }

    public function bioscoop()
    {
        return $this->reservation()->zaal()->bioscoop();
    }
}
