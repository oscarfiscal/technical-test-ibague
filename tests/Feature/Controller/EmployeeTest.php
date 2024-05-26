<?php

namespace Tests\Feature\Controller;

use App\Models\Departament;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class EmployeeTest extends TestCase
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
        $employeeData = [
            'departament_id'=>Departament::factory()->create()->id,
            'first_name' => 'John Doe',
            'last_name' => 'test',
            'email' => 'john.doe@example.com',
            'phone' => '3112634332',
            'position' => 'Developer'
        ];

        $response = $this->post('/employee', $employeeData);

       
        $response->assertRedirect('employee'); 

        $this->assertDatabaseHas('employees', [
            'departament_id'=>1,
            'first_name' => 'John Doe',
            'last_name' => 'test',
            'email' => 'john.doe@example.com',
            'phone' => '3112634332',
            'position' => 'Developer'
        ]);

      
    }

    public function test_it_displays_all_employees()
    {
        $this->withoutMiddleware();
        $this->withoutExceptionHandling();

        //se crea usuario para luego loguearlo
        $user = User::factory()->create();
       
        Employee::factory()->count(3)->create();

        $response = $this->actingAs($user)->get('employee');

        $response->assertViewHas('employees', function ($employees) {
            return $employees->count() === 3;
        });
    }

    public function test_it_deletes_an_employee()
    {
        $this->withoutMiddleware();
        $this->withoutExceptionHandling();
        
        $employee = Employee::factory()->create();

        $response = $this->delete('/employee/' . $employee->id);

      
        $response->assertStatus(302);
     
    }

    public function test_it_displays_a_single_employee()
    {
        $this->withoutMiddleware();
        $this->withoutExceptionHandling();
         //se crea usuario para luego loguearlo
         $user = User::factory()->create();

        $employee = Employee::factory()->create();

        $response = $this->actingAs($user)->get('/employee/' . $employee->id);

        $response->assertStatus(200);
        $response->assertViewIs('employees.show');

      
    }

    public function test_it_updates_an_employee()
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware();
        $employee = Employee::factory()->create();

        $updatedData = [
            'first_name' => 'Updated First Name',
            'last_name' => 'Updated Last Name',
            'email' => 'update@example.com',
            'phone' => '34223',
            'position' => 'Developers'
        ];

        $response = $this->put('/employee/' . $employee->id, $updatedData);

        $response->assertStatus(302);
       
      
    }
}
