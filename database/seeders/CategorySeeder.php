<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =[
            'Mobile',
            'Dress',
            'Technolgy',
            'Coding',
            'Kitchen'
        ];
        foreach ($categories as $category) {
            Category::factory(1)->create([
                'category_name'=>$category
            ]);
        }
       
    }
}
