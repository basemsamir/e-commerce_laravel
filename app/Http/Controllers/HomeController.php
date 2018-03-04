<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\HotProduct;
use App\TopProduct;
use App\Category;
use App\Product;
use App\Events;
use App\User;
use App\Repositories\CategoryRepository;
use App\Mail\Customer;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    protected $category;
    // index action

    public function __construct(CategoryRepository $category)
    {
      # code...
      $this->category=$category;
    }
    public function index()
    {
      # code...
       $hot_products = HotProduct::with('product')->get();
       $categories=$this->category->getSubCategories(6);
       return view('index',compact('hot_products','categories'));
    }

    public function show_auth()
    {
        return view('auth.index');
    }
    // Show category data
    public function show_category($id)
    {
      # code...
        $category=$this->category->getCategoryWithProducts($id);
      //  dd($category);
        return view('categories.index',compact('category'));
    }

    // Show events page
    public function show_events()
    {
      $events=Events::all();
      return view('events',compact('events'));
    }
    // Show best deals page
    public function show_bestdeals()
    {
      $category_products=Category::with('products')
                                 ->whereNotNull('main_category_id')
                                 ->take(3)
                                 ->get();
      return view('bestdeals',compact('category_products'));
    }

    // Show services page
    public function show_services()
    {
      return view('services');
    }

    // Show contact us page
    public function show_contactUS()
    {
      return view('contactus');
    }

    // send mail
    public function send_mail()
    {
      $data = request()->all();
      $user = auth()->user();
      Mail::to('site@site.com')->send(new Customer($data));
      return redirect()->back()->with(['success'=>'The Mail is sent!']);
    }
}
