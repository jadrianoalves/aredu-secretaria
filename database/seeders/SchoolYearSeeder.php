<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SchoolYear;

class SchoolYearSeeder extends Seeder
{
   
    public function run()
    {
        $schoolYear = New SchoolYear();
        $schoolYear->school_year = 2022;
        $schoolYear->start = '2022-02-20';
        $schoolYear->end = '2022-12-20';
        $schoolYear->primary_entity_id = 1;
        $schoolYear->save();
                
        
    }
}
