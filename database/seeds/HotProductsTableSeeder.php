<?php

use Illuminate\Database\Seeder;
use App\HotProduct;

class HotProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        HotProduct::truncate();
        $product_id=1;
        for ($i=1; $i <= 40; $i=$i+10) {
          HotProduct::create( [
            'product_id' => $i,
            'created_at' => \Carbon\Carbon::now(),
          ] );
        }

    }
}
