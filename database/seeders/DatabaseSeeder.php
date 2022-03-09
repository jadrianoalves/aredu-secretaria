<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
                PrimaryEntitySeeder::class,
                RolesSeeder::class,
                SchoolSeeder::class,
                SchoolYearSeeder::class,
                UserSeeder::class,
                BrazilianCitiesSeeder::class,
                ProfessionsSeeder::class,
               
    ]);
    }
}
