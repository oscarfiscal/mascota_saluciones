<?php

namespace Tests\Feature\Http\Controllers\api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MascotaControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_pets_create()
    {
        $this->withoutExceptionHandling();
       

     
        $response =$this->postJson('/api/mascota',[
          'nombre_mascota' => 'perro',
            'raza' => 'perro',
            'fechanacimiento' => '2020-05-05',
            'nombre_dueno' => 'oscar',
            'descripcion' => 'perro de raza perro',
            'fotomascota' => 'perro.jpg',

        ])->assertCreated();

        $mascota = Pet::first();

        $this->assertCount(1,Pet::all());

        $this->assertEquals('perro',$mascota->nombre_mascota);
        $this->assertEquals('perro',$mascota->raza);
        $this->assertEquals('2020-05-05',$mascota->fechanacimiento);
        $this->assertEquals('oscar',$mascota->nombre_dueno);
        $this->assertEquals('perro de raza perro',$mascota->descripcion);
        $this->assertEquals('perro.jpg',$mascota->fotomascota);
      

        $response ->assertJson([
            'data'=>[
                'type'=>'mascota',
                'mascota_id'=>$mascota->id,
                'attributes'=>[
                    'nombre_mascota'=>$mascota->nombre_mascota,
                    'raza'=>$mascota->raza,
                    'fechanacimiento'=>$mascota->fechanacimiento,
                    'nombre_dueno'=>$mascota->nombre_dueno,
                    'descripcion'=>$mascota->descripcion,
                    'fotomascota'=>$mascota->fotomascota,
                   
                ]


                    ],

]);
    }
}
