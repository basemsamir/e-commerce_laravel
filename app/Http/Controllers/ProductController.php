<?php

namespace App\Http\Controllers;

use App\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Product repository
     *
     */
    protected $product;

    public function __construct(ProductRepository $product)
    {
      # code...
      $this->product=$product;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = $this->product->getProductWithCategory($id);
       	return view('products.show',compact('product'));
    }
    // Search about main product
    public function search_product(Request $request)
    {
      # code...
        $input=$request->all();
        $products=$this->product->searchByTitle($input['Product']);
        return view('products.search_results',compact('products'));
    }
}
