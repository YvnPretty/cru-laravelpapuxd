<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Nombre extends Model
{
    protected $connection = 'mongodb';

    protected $table = 'nombres';
}
