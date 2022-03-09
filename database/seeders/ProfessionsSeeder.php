<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use  \App\Models\Profession;



class ProfessionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $professions = ProfessionsList::professions;
        //$professions = ['Agricultor', 'Pescador', 'Caminhoneiro', 'Pedreiro', 'Marceneiro', 'Pintor', 'Moto Taxi'];
        
        foreach ($professions as $profession)
        {
                    $p = new Profession();
                    $p->name = $profession;
                    $p->save();
        }
        
    }
}
