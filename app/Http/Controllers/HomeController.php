<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HotProduct;
use App\TopProduct;
use App\Category;
use App\Product;
use App\Events;

class HomeController extends Controller
{
    // index action
    public function index()
    {
      # code...
       $hot_products = HotProduct::with('product')->get();
       $categories=Category::with('subcategories')->whereNull('main_category_id')->take(6)->get();
       return view('index',compact('hot_products','categories'));
    }


    // Show category data
    public function show_category($id)
    {
      # code...
        $category=Category::with('parentcategory','products')->where('id',$id)->first();
      //  dd($category);
        return view('categories.index',compact('category'));
    }

    // Show events page
    public function show_events()
    {
      # code...
      $events=Events::all();
      return view('events',compact('events'));
    }
    // Show best deals page
    public function show_bestdeals()
    {
      # code...
      $category_products=Category::with('products')
                                 ->whereNotNull('main_category_id')
                                 ->take(3)
                                 ->get();
      return view('bestdeals',compact('category_products'));
    }

    // Show services page
    public function show_services()
    {
      # code...
      return view('services');
    }

}
