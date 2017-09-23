<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    protected $connection = 'mysql';
    protected $table = 'tb_ingredient';
}
