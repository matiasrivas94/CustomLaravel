<?php

namespace Modules\People\Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PeopleTest extends TestCase
{

    public function test_get_people_list()
    {
        $response = $this->get('api/getall');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            [
                'id' , 'nombre' , 'apellido' , 'dni' , 'cuil' , 'genero', 'direccion', 'celular', 'email', 'fecha_nacimiento',
                'lugar_nacimiento', 'estado_civil', 'observaciones', 'grupo_sanguineo','updated_by_user_id'
            ]
        ]);
        $response->assertJsonFragment(['nombre' => 'Alejandro']);
        $response->assertJsonCount(2);
    }

    public function test_get_people_detail()
    {
        $response = $this->get('api/getone');
        $response->assertStatus(200);
       
        $response->assertJsonStructure([
            [
                'id' , 'nombre' , 'apellido' , 'dni' , 'cuil' , 'genero', 'direccion', 'celular', 'email', 'fecha_nacimiento',
                'lugar_nacimiento', 'estado_civil', 'observaciones', 'grupo_sanguineo','updated_by_user_id'
            ]
        ]);
        $response->assertJsonFragment(['nombre' => 'Alejandro']);
    }

    public function test_get_non_existing_people_detail()
    {
        $response = $this->get('api/getone/599');
        $response->assertStatus(404);
    }
}
