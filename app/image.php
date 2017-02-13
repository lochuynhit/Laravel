<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    protected $table = 'images';
    protected $fillable = [
    	'id','image','product_id'
    ];

    public function Product(){
    	return $this -> belongTo('App\Products');
    }
}
