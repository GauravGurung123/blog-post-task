<?php

namespace Database\Seeders;

use App\Models\Category;
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
        Category::factory(10)->create()->each(function ($category) {
            $category->blogs()->attach([rand(1,10), rand(1,10)]);
        });

        $this->command->info('Inserted 10 category records.');
    }
}
