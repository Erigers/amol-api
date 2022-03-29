<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Address extends Model
{
    protected $connection ="mongodb";
    protected $collection = "user_address";
}
