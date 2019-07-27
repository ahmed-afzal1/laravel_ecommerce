<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'image'=>'image|nullable',
            'price'=>'required',
            'description'=>'nullable',
        ]);
        
        $product = new Product();
        $product_image = $request->image;
        $product_image_new_name = time().'.'.$product_image->getClientOriginalExtension();
        $product_image->move('uploads/products',$product_image_new_name);

        $product->name = $request->name;
        $product->image ='uploads/products/'.$product_image_new_name;
        $product->price = $request->price;
        $product->description = $request->description;

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'name'=>'required',
            'price'=>'required',
            'description'=>'nullable',
        ]);
        

        if($request->hasFile('image')){
            $product_image = $request->image;
            $product_image_new_name = time().'.'.$product_image->getClientOriginalExtension();
            $product_image->move('uploads/products',$product_image_new_name);
            $product->image ='uploads/products/'.$product_image_new_name;
            $product->save();
        }
        
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
         $product->delete();
         return redirect()->route('products.index');
    }
}
