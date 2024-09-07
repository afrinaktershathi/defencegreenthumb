<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = new Category();
        $categories->title = "one"; 
        $categories->slug = "one"; 
        $categories->save();

        
        $categories = new Category();
        $categories->title = "two"; 
        $categories->slug = "two"; 
        $categories->save();


    }
}
