<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'username' => 'mafif21',
            'email' => 'muhammadafifjpr@gmail.com',
            'image' => "afif.jpg",
            'age' => 21,
            'nickname' => "afif",
            'job' => "TNI",
            'is_admin' => true,
            'password' => 'password'
        ]);
    }
}
