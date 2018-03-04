<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Repositories\CartRepository;
use Lang;
use Session;
use Auth;
class CartController extends Controller
{
    //

    protected $cart;
    protected $user;
    public function __construct(CartRepository $cart)
    {
      # code...
      $this->cart=$cart;
      $this->user=Auth::user();
    }
    public function index()
    {
      # code...
      $user_token = Auth::user()->api_token;
      $cart_items=$this->cart->getCartWithSession($user_token);
      return view('carts',compact('cart_items'));
    }
    public function store_item()
    {
        $session_id = request('user_token');
        $product_id = request('item_id');
        // Get Product Detils by ID
        $product = Product::where( 'id', $product_id )->first();
        if ( $product == null ) {
          return response()->json(['success'=>'false','message'=>Lang::get('site.NotFound',['name'=>'product'])]);
        }
        if ( Cart::where( 'session_id', '=', $session_id )->exists() ) {
          //CHeck whether product exist if yes increase quantity
          $entry = Cart::where( [ 'session_id' => $session_id, 'product_id' => $product_id ] )->increment( 'qty', 1 );
          if ( ! $entry ) {
            Cart::create( [
              'session_id'   => $session_id,
              'product_id'   => $product->id,
              'product_name' => $product->title,
              'price'        => $product->discount_price,
              'qty'          => 1
            ] );
          }
          return response()->json(['success'=>'true','message'=>Lang::get('site.Success',['operation'=>'Adding item to the cart'])]);
        }
        else{
          Cart::create( [
            'session_id'   => $session_id,
            'product_id'   => $product->id,
            'product_name' => $product->title,
            'price'        => $product->discount_price,
            'qty'          => 1
          ] );
          return response()->json(['success'=>'true','message'=>Lang::get('site.Success',['operation'=>'Adding item to the cart'])]);
        }

    }

    public function delete_item()
    {
      # code...
        $session_id = request('user_token');
        Cart::where('session_id', $session_id)
            ->where('product_id',request('product_id'))
            ->first()
            ->delete();
        return response()->json(['success'=>'true','message'=>Lang::get('site.Success',['operation'=>'Deleting item'])]);
    }
}
