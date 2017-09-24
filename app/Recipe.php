<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $connection = 'mysql';
    protected $table = 'tb_food';
}

