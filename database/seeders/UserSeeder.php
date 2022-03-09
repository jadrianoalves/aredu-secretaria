<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Adriano Alves';
        $user->birthday = '1983-09-17';
        $user->gener = 'masculino';
        $user->cpf = '01245678900';
        $user->phone_number = '83987199685';
        $user->email = 'j.adrianoalves@hotmail.com';
        $user->password = bcrypt('0123456');
        $user->primary_entity_id = 1;
        $user->documents_folder = '4545454554afafa';
        $user->active = 1;
        $user->assignRole('mananger');
        $user->save();
                
    }
}
