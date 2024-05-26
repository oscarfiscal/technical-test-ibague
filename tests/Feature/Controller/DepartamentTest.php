<?php

namespace Tests\Feature\Controller;

use App\Models\Departament;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class DepartamentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_it_saves_a_new_employee()
    {
        $this->withoutMiddleware();
        $this->withoutExceptionHandling();

        Artisan::call('migrate');
        // Datos del empleado de prueba
        $departamentData = [
            'name' => 'development',
            'description' => 'Developer'
        ];

        $response = $this->post('/departament', $departamentData);

       
        $response->assertRedirect('departament'); 

        $this->assertDatabaseHas('departaments', [
            'name' => 'development',
            'description' => 'Developer'
        ]);

      
    }

    public function test_it_displays_all_employees()
    {
        $this->withoutMiddleware();
        $this->withoutExceptionHandling();

        //se crea usuario para luego loguearlo
        $user = User::factory()->create();
       
        Departament::factory()->count(3)->create();

        $response = $this->actingAs($user)->get('departament');

        $response->assertViewHas('departaments', function ($employees) {
            return $employees->count() === 3;
        });
    }

    public function test_it_deletes_an_employee()
    {
        $this->withoutMiddleware();
        $this->withoutExceptionHandling();
        $departament = Departament::factory()->create();

        $response = $this->delete('/departament/' . $departament->id);

        $response->assertStatus(302);
     
    }

    public function test_it_updates_an_employee()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware();
        $departament = Departament::factory()->create();

        $updatedData = [
            'name' => 'Updated Name',
            'description' => 'Updated description',
         
        ];

        $response = $this->put('/departament/' . $departament->id, $updatedData);

        $response->assertStatus(302);
       
    }

    public function test_it_displays_a_single_employee()
    {
        $this->withoutMiddleware();
        $this->withoutExceptionHandling();
         //se crea usuario para luego loguearlo
         $user = User::factory()->create();

        $departament = Departament::factory()->create();

        $response = $this->actingAs($user)->get('/departament/' . $departament->id);

        $response->assertStatus(200);
        $response->assertViewIs('departament.show');

      
    }

   
}
