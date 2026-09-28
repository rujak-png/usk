<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mejas = Meja::latest()->paginate(10);
        return view('meja.index', compact('mejas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('meja.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nomormeja' => 'required|string|max:255|unique:mejas,nomormeja',
            'kapasitas' => 'required|integer|min:1',
            'status' => 'required|in:kosong,terisi',
        ]);

        Meja::create($data);
        return redirect()->route('meja.index')->with('success', 'Meja berhasil ditambahkan');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meja $meja)
    {
        return view('meja.edit', compact('meja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meja $meja)
    {
        $data = $request->validate([
            'nomormeja' => ['required', 'string', 'max:255', Rule::unique('mejas')->ignore($meja->idmeja, 'idmeja')],
            'kapasitas' => 'required|integer|min:1',
            'status' => 'required|in:kosong,terisi',
        ]);

        $meja->update($data);
        return redirect()->route('meja.index')->with('success', 'Meja berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meja $meja)
    {
        $meja->delete();
        return redirect()->route('meja.index')->with('success', 'Meja berhasil dihapus');
    }
}
