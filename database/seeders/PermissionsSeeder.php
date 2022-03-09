<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    
    public function run()
    {
       
        $permissions = [
                        'school_add',
                       ];
        
        foreach($permissions as $permission)
        {
            Permission::create(['name' => $permission]);
        }
        
    }
}
