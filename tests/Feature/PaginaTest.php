<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaginaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_contacto()
    {
        $response = $this->get('/contacto');

        $response->assertStatus(200);
    }
    
    /** @test */
    public function formulario_contacto()
    {
        $response = $this->post('/recibe-form-contacto',[
            'nombre' => '',
            'correo' => 'correoNoValido',
            'comentario' => '',
        ]);
        $response->assertSessionHasErrors([
            'nombre',
            'correo',
            'comentario',
        ]);
    }
    
    /** @test */
    public function prellenado_formulario_contacto()
    {
        $response = $this->get('/contacto/1234');
        $response->assertStatus(200);
        $this->assertEquals('Juan Lopez', $response['nombre']);
    }
}
