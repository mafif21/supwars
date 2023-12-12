<?php

namespace App\Http\Controllers;

use App\Models\Weapon;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjamans = Peminjaman::where('user_id', '=', Auth::id())->where('tanggal_dikembalikan', '=', null)->get();
        // ddd($peminjamans);
        return view('user.peminjaman.index', compact('peminjamans'));
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
        try {
            // Validasi input
            $validator = Validator::make($request->all(), [
                'weapon_id' => 'required',
                'tanggal_peminjaman' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('danger', 'Data tidak valid');
            }

            // Periksa apakah pengguna sudah meminjam 2 senjata
            $userWeaponCount = Peminjaman::where('user_id', auth()->user()->id)
                ->count();

            if ($userWeaponCount >= 2) {
                return redirect()->back()->with('danger', 'Anda sudah mencapai batas maksimal peminjaman senjata.');
            }

            Peminjaman::create([
                'weapon_id' => $request->weapon_id,
                'tanggal_peminjaman' => $request->tanggal_peminjaman,
            ]);

            Weapon::where('id', $request->weapon_id)->update([
                'available' => false
            ]);

            return redirect()->back()->with('success', 'Data berhasil disimpan.');
        } catch (\Throwable $e) {
            return redirect()->back()->with('danger', 'Terjadi kesalahan saat menyimpan data.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
