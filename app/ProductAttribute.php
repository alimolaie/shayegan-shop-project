<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use Notifiable;
	
	public $table = "gwc_products_attribute";
	public function productColor(){
        return $this->belongsToMany(Color::class,'gwc_products_attribute','product_id','color_id')->withTimestamps();
    }
}
