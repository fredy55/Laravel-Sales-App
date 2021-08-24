<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Category extends Model
{
    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'category_id','category','description'
    ];
    
    public function products()
    {
        return $this->hasMany('App\Models\Products', 'category_id', 'category_id');
    }

}
