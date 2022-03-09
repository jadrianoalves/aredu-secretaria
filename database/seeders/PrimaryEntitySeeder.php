<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PrimaryEntity;

class PrimaryEntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entity = new PrimaryEntity();
        $entity->name = 'Municipio';
        $entity->save();
    }
}
