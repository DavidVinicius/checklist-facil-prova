<?php

namespace Tests\Feature;

use App\Models\Cake;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CakeTest extends TestCase
{
    private $cake;
    use RefreshDatabase;

    protected function setUp() : void 
    {
        parent::setUp();
        $this->refreshInMemoryDatabase();
        $this->cake = Cake::factory()->create();
    }


    /**
     * get cakes
     *
     * @return void
     */
    public function test_get_cakes_route()
    {        
        $response = $this->get(route("cakes.list"));
        $response->assertStatus(200);
    }
    
    public function test_get_a_cake()
    {                
        $response = $this->get(route("cakes.get", $this->cake->id));
        
        $response        
        ->assertStatus(200)
        ->assertJson([
            "cake" => [
                "name" => $this->cake->name
            ]
        ]);
    }
    
    /**
     * Store a cake
     *
     * @return void
     */
    public function test_store_a_new_cake()
    {        
        $cake = Cake::factory()->make();

        $response = $this->postJson(route("cakes.store"), [
            "cake" => $cake->toArray()
        ]);

        $response->assertStatus(201)        
        ->assertJson([
            "cake" => [
                "name" => $cake->name
            ]
        ]);
    }
    
    /**
     * Store a cake
     *
     * @return void
     */
    public function test_update_a_cake()
    {        
        $cake = Cake::factory()->create();

        $response = $this        
        ->putJson(route("cakes.update", $cake->id), [
            "cake" => ["name" => "Teste"]
        ]);

        
        $response        
        ->assertStatus(200)
        ->assertJson([
            "cake" => [
                "name" => "Teste"
            ]
        ]);
            
        $cake_updated = Cake::find($cake->id);

        $this->assertEquals("Teste", $cake_updated->name);
    }
        

    public function test_destroy_cake()
    {
        $cake = Cake::factory()->create();

        $response = $this        
        ->deleteJson(route("cakes.destroy", $cake->id));

        $response
        ->assertStatus(200);
            
        $cake_destroyed = Cake::find($cake->id);

        $this->assertNull($cake_destroyed);
    }
}
