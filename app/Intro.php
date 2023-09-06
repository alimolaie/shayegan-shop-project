<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intro extends Model
{
    public $table = "intro_sections";
    protected $guarded=['id'];
}
