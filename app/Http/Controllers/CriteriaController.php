<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $criterias = Criteria::all();

        return view('criterias.index', compact('criterias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Criteria::create($request->all());

        return redirect()->route('kriteria.index')->with('success', 'Data kriteria berhasil ditambahkan!');
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
    public function edit(Criteria $criteria)
    {
        return view('criterias.edit', compact('criteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Criteria $criteria)
    {
        $criteria->update($request->all());

        return redirect()->route('kriteria.index')->with('success', 'Data kriteria berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Criteria $criteria)
    {
        $criteria->delete();

        return redirect()->route('kriteria.index')->with('success', 'Data kriteria berhasil dihapus!');
    }
}
