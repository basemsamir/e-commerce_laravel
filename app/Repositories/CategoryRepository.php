<?php
namespace App\Repositories;

use App\Category;
/**
 *
 */
class CategoryRepository
{

  public function getCategoryWithProducts($category_id)
  {
    # code...
      return Category::with('parentcategory','products')
                   ->where('id',$category_id)
                   ->first();
  }
  public function getSubCategories($number_of_rows=0)
  {
    # code...
      return Category::with('subcategories')
                     ->whereNull('main_category_id')
                     ->take($number_of_rows)
                     ->get();
  }
}


 ?>
