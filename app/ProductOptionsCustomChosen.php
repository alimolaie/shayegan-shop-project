<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class ProductOptionsCustomChosen extends Model
{
    use Notifiable;
	
	
	public $table = "gwc_products_option_custom_chosen";
	
}
