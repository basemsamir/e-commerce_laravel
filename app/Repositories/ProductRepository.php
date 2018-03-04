<?php
namespace App\Repositories;

use App\Product;
/**
 *
 */
class ProductRepository
{

  public function getProductWithCategory($product_id)
  {
    # code...
      return Product::with('category')
                    ->where('id',$product_id)
                    ->first();
  }
  public function searchByTitle($title)
  {
    # code...
      return Product::search_title($title)
                    ->get();
  }
}


 ?>
