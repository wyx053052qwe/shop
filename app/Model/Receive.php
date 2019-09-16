<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Receive extends Model
{
    protected $table = 'coupon_receive';
    protected $primaryKey = 'r_id';
    public $timestamps = false;
}
