<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\domain\Name;

class NameTest extends TestCase
{
    
    public function test_name_factory()
    {
        $names = ['maria dos santos', 'ana', 'PAULO DOS ANJOS', 'sEvErInO aLVES', 'DOS', 'DO', 'DA'];
        $namesResult = [];
        $namesExpected = ['Maria dos Santos', 'Ana', 'Paulo dos Anjos', 'Severino Alves', 'dos', 'do', 'da'];
        foreach($names as $name)
        {
            $result = new Name($name);
            array_push($namesResult, $result);
        }
        
        $index = 0;
        
        foreach($namesResult as $key=>$value)
        {
            $this->assertEquals($namesExpected[$key], $namesResult[$key]);
        }
        
        
        
    }
}
