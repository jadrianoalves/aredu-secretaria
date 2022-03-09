<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data = ['primary_entity_id' => 1,
          'name' => 'Luzia',
          'address_place' => 'Rua tal',
          'address_number' => '500',
          'address_zipcode' => '4545-000',
          'address_city'=> 1054,
          'number_of_rooms' =>15,];
         
      \App\Models\School::create($data);
    }
}
