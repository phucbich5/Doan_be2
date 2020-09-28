<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
       //
       $data = [
           [
               'name_product'=>'iPhone',
           ],
           [
               'name_product'=>'Samsung',
           ],
           [
               'name_product'=>'HTC',
           ],
           [
               'name_product'=>'Huawei',
           ],
           [
               'name_product'=>'Oppo',
           ],
       ];
       DB::table('products')->insert($data);
   }
}
