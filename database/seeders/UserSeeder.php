<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'mafif21',
                'email' => 'muhammadafifjpr@gmail.com',
                'age' => 21,
                'nickname' => "afif",
                'job' => 'TNI',
                'is_admin' => true,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
        ]);
    }
}
