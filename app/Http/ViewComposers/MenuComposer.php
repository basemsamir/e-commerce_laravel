<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Category;

/**
 *
 */
class MenuComposer
{
  public function compose(View $view)
  {
      $categories=Category::with('subcategories')->whereNull('main_category_id')->get();
      $view->with('categories', $categories);
  }
}
