<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Pengiriman extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'pengiriman';
}
