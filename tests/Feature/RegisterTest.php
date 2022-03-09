<?php

namespace Tests\Feature;

use \Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\User;


class RegisterTest extends TestCase
{
   
    
    use DatabaseTransactions;
    
    public function test_registar_sussess()
    {
        
        $user = User::find(1);
        
       
        
        $response = $this->actingAs($user)->json('post','/api/register-admin',[
                                                'name' => 'Adriano Alves',
                                                'birthday' => '1983-09-17',
                                                'gener' => 'masculino',
                                                'cpf' => '01245678900',
                                                'phone_number' => '83987199685',
                                                'email'=>'j.adrianoalves0110@hotmail.com',
                                                'password' => '0123456',
                                                 ]);     
        $response->assertStatus(200);
        $response->assertJson([
	
	'message'=> 'User Created success',
	
        ]);
    }
    
    
        
        
    public function test_registar_with_exists_user_sussess()
    {
        $response = $this->json('post','/api/register',[
                                                'name' => 'Adriano Alves',
                                                'email'=>'j.adrianoalves@hotmail.com',
                                                'password' => '0123456',
                                                'primary_entity_id' => 1
                                                 ]);
        
        $response->assertStatus(400);
        $response->assertJson([
                            	'message'=> 'user alrealy existis',
                              ]);
    }
    
    public function test_registar_without_fildes_user_sussess()
    {
        $response = $this->json('post','/api/register',[
                                                'name' => '',
                                                'email'=>'j.adrianoalves@hotmail.com',
                                                'password' => '0123456',
                                                'primary_entity_id' => 1
                                                 ]);
        
        $response->assertStatus(422);
        $response->assertJson([
                                'message'=> 'The given data was invalid.',
                               ]);
    }
    
    
    
}
