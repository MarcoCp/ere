<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    public function seeUrlClient()
    {
        $this->get('/clientes')
        	->assertStatus(200);
        $this->get('/clientes/crear')
        	->assertStatus(200);
        $this->post('/clientes')
        	->assertStatus(200);
        $this->get('/clientes/1')
        	->assertStatus(200);
        $this->get('/clientes/1/editar')
        	->assertStatus(200);
        $this->put('/clientes/1')
        	->assertStatus(200);
        $this->delete('/clientes/1')
        	->assertStatus(200);
    }
}
