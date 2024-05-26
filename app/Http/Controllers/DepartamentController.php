<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartamentRequest;
use App\Http\Requests\UpdateDepartamentRequest;
use App\Models\Departament;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class DepartamentController extends Controller
{

    public function __construct(
        private Departament $departament
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index():view
    {
        $departaments = Departament::paginate(5);
        return view('departament.index', compact('departaments'));
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

        return redirect()->route('departament.index')->with('success', 'departament created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departament $departament): view
    {
        return view('departament.edit', compact('departament'));
    }

    public function show(Departament $departament): view
    {
        return view('departament.show', compact('departament'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDepartamentRequest $request, Departament $departament)
    {
        $departament->update($request->all());
        return redirect()->route('departament.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departament $departament)
    {
        $departament->delete();
        return redirect()->route('departament.index');
    }
}
