<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Assault Rifles',
            'Submachine Guns',
            'Shotguns',
            'Sniper Rifles',
            'Pistols',
            'Machine Guns',
            'Melee Weapons',
            'Explosives',
            'Special Weapons',
            'Handguns',
            'Revolvers',
            'Grenades',
            'Rocket Launchers',
            'Crossbows',
            'Daggers',
            'Throwing Knives',
            'Bows',
            'Tasers',
            'Flamethrowers',
            'Swords',
            'Grenade Launchers',
            'Brass Knuckles',
            'Silenced Weapons',
            'Martial Arts',
            'Throwable Explosives',
            'Bolt-Action Rifles',
            'Combat Knives',
            'Semi-Automatic Pistols',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category,
            ]);
        }
    }
}
