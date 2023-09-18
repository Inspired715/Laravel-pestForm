<?php

namespace App\Models;

use Laravel\Paddle\Payment as PackagePayment;
use Carbon\Carbon;

class Payment extends PackagePayment
{

    public function rawAmount()
    {
        return ($this->amount / 100);
    }


    public function amount()
    {
        return $this->formatDecimalAmount($this->rawAmount());
    }

    
    public function date()
    {
        $date = Carbon::parse($this->date)->format('Y-m-d');
        return Carbon::createFromFormat('Y-m-d', $date, 'UTC')->startOfDay();
    }

}
