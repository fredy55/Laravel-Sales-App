<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait Prodemo {
    public function prod(){
        $product = DB::table('products')
                            ->select('product','price')
                            ->orderBy('product','asc')
                            ->get();
        
        return view('test', ['product'=>$product]); 
    }

    public function pronum(){
        return 5; 
    }

}