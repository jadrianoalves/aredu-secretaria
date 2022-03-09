<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $series = Array([
                        'name'=>'6º Ano EF',
                        'primary_entity_id' => 1
                        ],
                        [
                        'name'=>'7º Ano EF',
                        'primary_entity_id' => 1
                        ],
                        [
                        'name'=>'8º Ano EF',
                        'primary_entity_id' => 1
                        ],
                        [
                        'name'=>'9º Ano EF',
                        'primary_entity_id' => 1
                        ],
                        
                        );
        
        foreach($series as $serie)
        {
            $item = new \App\Models\Serie();
            $item->name = $serie['name'];
            $item->primary_entity_id = $serie['primary_entity_id'];
            $item->save();
        }
        
    }
}
