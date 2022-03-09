<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassRoom;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = array(
            [
              'description' => 'Sala 01',  
              'capacity' => 20,
              'school_id' => 1
            ],
            [
              'description' => 'Sala 01',  
              'capacity' => 20,
              'school_id' => 1
            ],
            [
              'description' => 'Sala 01',  
              'capacity' => 20,
              'school_id' => 1
            ],
            [
              'description' => 'Sala 02',  
              'capacity' => 25,
              'school_id' => 1
            ],
            [
              'description' => 'Sala 03',  
              'capacity' => 28,
              'school_id' => 1
            ],
            [
              'description' => 'Sala 04',  
              'capacity' => 30,
              'school_id' => 1
            ],
            [
              'description' => 'Sala 05',  
              'capacity' => 15,
              'school_id' => 1
            ],
            [
              'description' => 'Sala 06',  
              'capacity' => 22,
              'school_id' => 1
            ],
            [
              'description' => 'Sala 07',  
              'capacity' => 27,
              'school_id' => 1
            ],
            [
              'description' => 'Sala 08',  
              'capacity' => 18,
              'school_id' => 1
            ],
        );
        
        foreach ($rooms as $room)
        {
            $item = new ClassRoom();
            $item->description = $room['description'];
            $item->capacity = $room['capacity'];
            $item->school_id = $room['school_id'];
            $item->save();
        }
        
    }
}
