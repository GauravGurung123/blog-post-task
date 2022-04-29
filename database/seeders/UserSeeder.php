<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create admin
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                // 'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'type' => 'Admin',
            ],
        ]);

        User::factory(10)->create();

        $this->command->info('Inserted 1 admin and 10 other random user records.');
    }
}
