<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use \Illuminate\Foundation\Testing\DatabaseTransactions;

class SchoolTest extends TestCase
{
    
   use DatabaseTransactions;
    
    public function getToken()
    {
        $response = $this->json(
                'post',
                '/api/login',
                [
                    'email'=>'j.adrianoalves@hotmail.com',
                    'password' => '0123456'
                ]);

        return $response['data']['token'];
        
    }
    
    
    public function test_get_all_schools_success()
    {
        
     $token = $this->getToken();   
     $response = $this->withHeaders(['Authorization'=>'Bearer '.$token])->get('/api/user/get-all-schools'); 
     $response->assertStatus(200);
     $response->assertJson(['message' => 'All schools attached for user']);
        
        
    }
}
