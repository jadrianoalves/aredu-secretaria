<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\domain\EmailFactory;

class EmailFactoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_email_factory_with_lowercase_and_three_numbers()
    {
        
        $email1 = EmailFactory::create(541, 'adriano');
        $this->assertEquals('000541adriano@aredu.com.br', $email1);
        
        
    }
    
    public function test_email_factory_with_camelcase_and_accents_and_more_words_in_name()
    {
        
        
        $email5 = EmailFactory::create(105412, 'José Adriano Ribeiro Alves');
        $this->assertEquals('105412josealves@aredu.com.br', $email5);
        
    }
    
    public function test_email_factory_without_name()
    {
        
        
        $email5 = EmailFactory::create(105412, '');
        $this->assertEquals('105412@aredu.com.br', $email5);
        
    }
    
}
