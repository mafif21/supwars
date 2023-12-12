<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Weapon;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        try {
            $users = User::all();
            $weapons = Weapon::all();
            $peminjaman = Peminjaman::all();
            $history = Peminjaman::whereNotNull('tanggal_dikembalikan')->get();

            return view('admin.index', compact('users', 'weapons', 'peminjaman', 'history'));
        } catch (\Throwable $e) {
            return redirect()->back()->with('danger', 'Terjadi kesalahan saat mengambil data.');
        }
    }
}
