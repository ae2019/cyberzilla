<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
*/
    public function test_counter_downloads()
    {
		// prg counter
        $response = $this->get('https://softwr.ru/restapi/counter/download/X');

        $response->assertStatus(404);	

        $response = $this->put('https://softwr.ru/restapi/counter/download/1');

        $response->assertStatus(200);			
    }
	
}
