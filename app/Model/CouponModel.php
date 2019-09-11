<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CouponModel extends Model
{
    protected $table = 'coupon';
    protected $primaryKey = 'c_id';
    public $timestamps = false;
}
