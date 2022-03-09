<?php 
namespace Tests\Feature;



use Tests\TestCase;
use App\Repositories\SchoolRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\School;


class SchoolRepositoryTest extends TestCase
{
    
    use DatabaseTransactions;
    
    public function create_school_success()
    {
        
        
        $data = ['primary_entity_id' => 1,
          'name' => 'Luzia',
          'address_place' => 'Rua tal',
          'address_number' => '500',
          'address_zipcode' => '4545-000',
          'address_city'=> 1054,
          'number_of_rooms' =>15,];
        
        School::create($data);
        
        $repository = new SchoolRepository();
        $repository->all();
        
        $this->assertDatabaseHas('schools', ['name' => 'Luzia']);

        
    }
}
