<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    protected $table = 'sesi';

    // Tak masuk FORM ke TABLE
    protected $guarded = [];
}
