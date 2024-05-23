<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Departament;
use App\Models\Employee;
use App\Respository\EmployeeRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(
        private Employee $employee,
        private EmployeeRepository $repository
    ) {
    }

    public function index(): View
    {
        $employees = Employee::paginate(5);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $departaments = Departament::all();
        return view('employees.create',compact('departaments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request): RedirectResponse
    {
        Employee::create($request->all());

        return redirect()->route('employee.index')->with('success', 'Employee created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee): view
    {
        $departaments = Departament::all();
        return view('employees.edit', compact('employee','departaments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());
        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index');
    }

    public function searchEmployees(Request $request)
    {
        $search = $request->input('search');
        $employees = $this->repository->search($search);

        return view('employees.index', compact('employees', 'search'));
    }
}
