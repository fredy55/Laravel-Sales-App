<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\Category;
use App\Traits\Prodemo;

class ProductsController extends Controller
{
    use Prodemo;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Products::all();
        
        return view('index', ['products'=>$products]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        return view('add', ['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate form data
        $this->validate($request,[
            'product'=>'string|required',
            'price'=>'numeric|required',
            'category'=>'numeric|required',
        ]);
        
        //product does not exist
        $exist=Products::where('product',$request->post('product'))->doesntExist();

        if($exist){
            $prod = new Products;
            $prod->product_id = date('Gis',time());
            $prod->category_id = $request->post('category');
            $prod->product = $request->post('product');
            $prod->price = $request->post('price');

            if($prod->save()){
                return redirect()->route('product')->with(['success'=>'Product added successfully!']);
            }else{
                return redirect()->route('product.add')->with(['danger'=>'Product NOT added!']);  
            }
        }else{
            return redirect()->route('product.add')->with(['warning'=>'Product already exist!']);  
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$product=Products::where('product_id', $id)->first(); //when using product_id
        $product=Products::find($id);

        return view('details', ['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Products::find($id);

        return view('edit', ['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //validate form data
        $this->validate($request,[
            'product'=>'string|required',
            'price'=>'numeric|required',
            'category'=>'string|required',
        ]);
        
        //product does not exist
        $exist=Products::where('id',$request->post('id'))->exists();

        if($exist){
            $prod = Products::find($request->post('id'));
            $prod->product = $request->post('product');
            $prod->price = $request->post('price');
            $prod->category = $request->post('category');

            if($prod->save()){
                return redirect()->route('product')->with(['success'=>'Product updated successfully!']);
            }else{
                return redirect()->route('product.edit',['id'=>$request->post('id')])->with(['danger'=>'Product NOT updated!']);  
            }
        }else{
            return redirect()->route('product.edit',['id'=>$request->post('id')])->with(['warning'=>'Product does Not exist!']);  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ///product does exist
        $exist=Products::where('id',$id)->exists();

        if($exist){
            $prod = Products::find($id);

            if($prod->delete()){
                return redirect()->route('product')->with(['success'=>'Product deleted successfully!']);
            }else{
                return redirect()->route('product')->with(['danger'=>'Product NOT deleted!']);  
            }
        }else{
            return redirect()->route('product')->with(['warning'=>'Product does Not exist!']);  
        }
    }
}
