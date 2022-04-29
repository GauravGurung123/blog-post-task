<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::factory(10)->create()->each(function ($tag) {
            $tag->blogs()->attach([rand(1,10), rand(1,10)]);
        });

        $this->command->info('Inserted 10 tag records.');
    }
}
