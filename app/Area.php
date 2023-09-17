<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use Notifiable;
	
	
	public $table = "cities";
	
	
}
