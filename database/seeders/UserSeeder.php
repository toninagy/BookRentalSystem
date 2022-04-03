<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => "Joe Goldberg",
            'email' => "librarian@brs.com",
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'is_librarian' => true,
            'remember_token' => 'GUv5cc2r4I',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => "John Smith",
            'email' => "reader@brs.com",
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'is_librarian' => false,
            'remember_token' => 'GUv5cc2r4I',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        User::factory(10)->create();
    }
}
