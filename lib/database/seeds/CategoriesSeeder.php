<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['name'=>'Iphone', 'slug'=>str_slug('Iphone')],
        	['name'=>'Samsung', 'slug'=>str_slug('Samsung')],
        ];
        DB::table('categories')->insert($data);
    }
}
