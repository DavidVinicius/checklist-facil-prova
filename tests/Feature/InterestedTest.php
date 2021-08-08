<?php

namespace Tests\Feature;

use App\Models\Cake;
use App\Models\Interested;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InterestedTest extends TestCase
{
    use RefreshDatabase;

    private $cake;

    protected function setUp() : void 
    {
        parent::setUp();
        $this->refreshInMemoryDatabase();
        $this->cake = Cake::factory()->create();
    }
    
    
    public function test_subscription_interested()
    {
        $response = $this->postJson(route("cakes.subcribe", $this->cake->id), [
            "email" => "teste@teste.com"
        ]);

        $response          
        ->assertStatus(201);
    }
    
    public function test_subscription_fake_cake()
    {
        $response = $this->postJson(route("cakes.subcribe", 100), [
            "email" => "teste@teste.com"
        ]);

        $response
        ->assertStatus(404);
    }
    
    public function test_unsubscription_interested()
    {
        $interested = Interested::factory()->create();
        
        $response = $this->deleteJson(route("cakes.unsubcribe", $interested->cake_id), [
            "email" => $interested->email
        ]);

        $response
        ->assertStatus(200);


        $this->assertNull(Interested::find($interested->id));
    }
}
