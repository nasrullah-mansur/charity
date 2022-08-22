<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationSlot extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getValu1Attribute($value1)
    {
        return $value1 + 0;
    }

}
