<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['Name'=>'Electrónica']);
        Category::create(['Name'=>'Ropa']);
        Category::create(['Name'=>'Hogar']);
        Category::create(['Name'=>'Papelería']);
        Category::create(['Name'=>'Alimentos']);
        Category::create(['Name'=>'Bebidas']);

    }
}
