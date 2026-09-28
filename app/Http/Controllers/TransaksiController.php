<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = Transaksi::latest()->paginate(10);
        return view('transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaksi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'idpesanan' => 'required|exists:pesanans,idpesanan',
            'tanggal' => 'required|date',
            'bayar' => 'required|integer|min:0'
        ]);

        $total = DB::table('detail_pesanans')
        ->where('idpesanan', $request->idpesanan)
        ->sum(DB::raw('jumlah * harga_satuan'));

        if ($request->bayar < $total) {
            return back()->withErrors(['bayar' => 'Uang pembayaran kurang!'])->withInput();
        }

        $data['iduser'] = auth()->id;
        $data['kembalian'] = $data['bayar'] - $data['total'];

        Transaksi::create($data);
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        return view('transaksi.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $data = $request->validate([
            'idpesanan' => 'required|exists:pesanans,idpesanan',
            'tanggal' => 'required|date',
            'bayar' => 'required|integer|min:0'
        ]);

        $total = DB::table('detail_pesanans')
        ->where('idpesanan', $request->idpesanan)
        ->sum(DB::raw('jumlah * harga_satuan'));

        if ($request->bayar < $total) {
            return back()->withErrors(['bayar' => 'Uang pembayaran kurang!'])->withInput();
        }

        $data['iduser'] = auth()->id;
        $data['kembalian'] = $data['bayar'] - $data['total'];

        $transaksi->update($data);
        return redirect()->route('transaksi.index')->with('success','Transaksi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success','Transaksi berhasil dihapus');
    }
}
