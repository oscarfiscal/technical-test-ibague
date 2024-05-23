<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartamentRequest;
use App\Models\Departament;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Symfony\Component\ErrorHandler\Debug;

class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('departament.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartamentRequest $request)
    {
        Departament::create($request->all());

        return redirect()->route('departament.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departament $departament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departament $departament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departament $departament)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departament $departament)
    {
        //
    }
}
