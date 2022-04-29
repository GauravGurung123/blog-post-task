<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        
        DB::table('users')->truncate();
        DB::table('blogs')->truncate();
        DB::table('tags')->truncate();
        DB::table('images')->truncate();
        DB::table('categories')->truncate();
        DB::table('blog_category')->truncate();
        DB::table('blog_tag')->truncate();
        
             
        $this->call(
            [
                UserSeeder::class,
                BlogSeeder::class,          
                CategorySeeder::class,          
                TagSeeder::class,          
                ImageSeeder::class,          
            ]
        );
    }
}
