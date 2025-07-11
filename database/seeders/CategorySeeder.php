<?php
namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Fiction', 'Science', 'Programming', 'Biography'];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}

