<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\CardSeeder;
use Database\Seeders\BannerSeeder;
use Database\Seeders\BannerToEntirySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PostSeeder::class,
            CardSeeder::class,
            BannerSeeder::class,
            BannerToEntirySeeder::class
        ]);
    }
}
