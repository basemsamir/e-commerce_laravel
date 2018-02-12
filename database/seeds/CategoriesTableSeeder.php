<?php

use Illuminate\Database\Seeder;

use App\Category;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::truncate();
        $categories = [ 'Branded Foods', 'Households',
        'Veggies & Fruits' => ['Vegetables','Fruits'], 'Kitchen' ,
        'Beverages'=>['Soft drinks','Juices'],'Pet Food',
        'Frozen Foods'=>['Frozen Snacks','Frozen Nonveg'], 'Bread & Bakery' ];
        $image_class_css_id=3;
        foreach ($categories as $key=>$category) {
          # code...

          if(is_numeric($key)){
            Category::create([
              'name'=>trim(strtolower($category)),
              'status'=>1,
              'image_class_css'=>'w3l_banner_nav_right_banner'.$image_class_css_id,
              'created_at'=>Carbon::now()
            ]);
          }
          else{
            $main_category=
            Category::create([
              'name'=>trim(strtolower($key)),
              'status'=>1,
              'created_at'=>Carbon::now()
            ]);
            foreach($category as $sub_category){
              Category::create([
                'name'=>trim(strtolower($sub_category)),
                'main_category_id'=>$main_category->id,
                'status'=>1,
                'image_class_css'=>'w3l_banner_nav_right_banner'.$image_class_css_id,
                'created_at'=>Carbon::now()
              ]);
            }

          }
          $image_class_css_id++;
        }
    }
}
