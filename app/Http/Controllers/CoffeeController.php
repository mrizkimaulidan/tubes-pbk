<?php

namespace App\Http\Controllers;

use App\Imports\CoffeesImport;
use App\Models\Coffee;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coffees = Coffee::paginate(10);

        return view('coffees.index', compact('coffees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Coffee::create($request->all());

        return redirect()->route('kopi.index')->with('success', 'Data coffee berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coffee $coffee) //model & ?
    {
        return view('coffees.edit', compact('coffee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coffee $coffee)
    {
        $coffee->update($request->all());

        return redirect()->route('kopi.index')->with('success', 'Data kopi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coffee $coffee)
    {
        $coffee->delete();

        return redirect()->route('kopi.index')->with('success', 'Data kriteria berhasil dihapus!');
    }

    public function import(Request $request)
    {
        Excel::import(new CoffeesImport, $request->file('file'));

        return redirect()->route('kopi.index')->with('success', 'Data kopi berhasil diimpor!');
    }
}
