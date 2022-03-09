<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['root', 'administrator', 'headmaster', 'mananger', 'secretary', 'teacher', 'pedagogic_cordinator', 'accountable', 'student'];
        
        foreach ($roles as $role){
            $r = Role::create(['name' => $role]);
           
        }
        
       
    }
}
