<?php

namespace Tests\Feature;

use \Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class RegisterTest extends TestCase
{
   
    
    use DatabaseTransactions;
    
    public function test_registar_sussess()
    {
        $response = $this->json('post','/api/register',[
                                                'name' => 'Adriano Alves',
                                                'email'=>'j.adrianoalves0110@hotmail.com',
                                                'password' => '0123456',
                                                'primary_entity_id' => 1
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
