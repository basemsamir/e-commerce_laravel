<?php
namespace App\Repositories;

use App\Cart;
/**
 *
 */
class CartRepository
{

  public function getCartWithSession($session_id)
  {
    # code...
      return Cart::where('session_id',$session_id)
                 ->get();
  }
}


 ?>
