<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanans = Pesanan::latest()->paginate(10);
        return view('pesanan.index', compact('pesanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pesanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'idpelanggan' => 'required|exists:pelanggans,idpelanggan',
            'idmeja' => ['required', Rule::exists('mejas','idmeja')->where('status','kosong')],
            'tanggal' => 'required|date',
            'total' => 'required|integer|min:0',
            'bayar' => 'required|integer|min:0',
            'kembalian' => 'required|integer|min:0'
        ]);

        Pesanan::create($data);
        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        return view('pesanan.edit', compact('pesanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        $data = $request->validate([
            'idpelanggan' => 'required|exists:pelanggans,idpelanggan',
            'idmeja' => 'required|exists:mejas,idmeja',
            'tanggal' => 'required|date',
            'total' => 'required|integer|min:0',
            'bayar' => 'required|integer|min:0',
            'kembalian' => 'required|integer|min:0'
        ]);

        $pesanan->update($data);
        return redirect()->route('pesanan.index')->with('success','Pesanan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        $pesanan->delete();
        return redirect()->route('pesanan.index')->with('success','Pesanan berhasil dihapus');
    }
}
