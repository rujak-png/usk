<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\Meja;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard', [
            'totalMenu' => Menu::count(),
            'totalPendapatan' => Transaksi::sum('total'),
            'totalTransaksi' => Transaksi::count(),
            'totalPelanggan' => Pelanggan::count(),
            'totalMeja' => Meja::count(),
            'totalUser' => User::count(),
    ]);
    }
}
