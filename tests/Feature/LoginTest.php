<?php

namespace Tests\Feature;

use Tests\TestCase;
use \Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    use DatabaseTransactions;
    
    public function test_login_with_fields_success()
    {
        $response = $this->json('post','/api/login',[
                                                'email'=>'j.adrianoalves@hotmail.com',
                                                'password' => '0123456'
                                                 ]);

        $response->assertStatus(200);
        
    }
    
    public function test_login_without_fields_failure()
    {
        $response = $this->json('post','/api/login',[
                                                'email'=>'',
                                                'password' => '0123456'
                                                 ]);  
        $response->assertStatus(422);
         $response->assertJson([
	
	"message"=> "The given data was invalid.",
	
        ]);
    }
    
    public function test_login_with_incorrect_data_failure()
    {
        $response = $this->json('post','/api/login',[
                                                'email'=>'jxadrianoalves3@hotmail.com',
                                                'password' => '0123456'
                                                 ]);

        $response->assertStatus(400);
        $response->assertJson([
	
	"message"=> "Login credentials are invalid.",
	
        ]);
        
    }
    
   
    
  
}
