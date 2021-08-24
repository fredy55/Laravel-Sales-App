<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'product_id','product','category','price'
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'category_id');
    }
}
