<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'name'=>'oppo mobile',
                'price'=>'20000',
                'description'=>'a smart phone with 8gb and more feature',
                'category'=>'mobile',
                "gallery"=>"https://www.gsmarena.com/oppo_f17_pro_hands_on-review-2159.php",

            ],
            [
                'name'=>'samsung tv',
                'price'=>'40000',
                'description'=>'a smart tv with and more feature',
                'category'=>'tv',
                "gallery"=>"https://www.samsung.com/pk/tvs/uhd-4k-tv/tu8500-65-inch-crystal-uhd-smart-tv-ua65tu8500uxmm/",

            ],
            [
                'name'=>'lg tv',
                'price'=>'50000',
                'description'=>'a smart tv with  and more feature',
                'category'=>'mobile',
                "gallery"=>"https://www.lg.com/us/tvs",

            ],
            [
                'name'=>'penasonic fridge',
                'price'=>'80000',
                'description'=>'a smart fridge with and more feature',
                'category'=>'fridge',
                "gallery"=>"https://priceoye.pk/fridge/panasonic",

            ]
        ]);
    }
}
