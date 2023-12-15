<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Weapon;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $peminjaman = Peminjaman::query();

        if ($request->input('query')) {
            $queryValue = $request->input('query');
            $peminjaman->whereHas('users', function ($query) use ($queryValue) {
                $query->where('username', 'LIKE', "%$queryValue%");
            });
        }

        $peminjaman = $peminjaman->paginate(10);
        return view('admin.peminjaman.index', compact('peminjaman'));
    }

    public function update(Request $request, $id)
    {
        try {
            $peminjaman = Peminjaman::findOrFail($id);
            $pricePerDay = $peminjaman->weapons->price;
            $denda = 50000;

            // Calculate the duration in days
            if ($peminjaman->tanggal_peminjaman == now()->format('Y-m-d')) {
                $durasi = \Carbon\Carbon::parse($peminjaman->tanggal_peminjaman)->diffInDays(now()) + 1;
            } else {
                $durasi = \Carbon\Carbon::parse($peminjaman->tanggal_peminjaman)->diffInDays(now());
            }
            // dummy jika ingin melakukan pengetesan denda
            // $durasi = \Carbon\Carbon::parse($peminjaman->tanggal_peminjaman)->diffInDays(now()->addDays(5));

            if ($durasi > 5) {
                $totalPrice = ($pricePerDay * $durasi) + $denda;
            } else {
                $totalPrice = $pricePerDay * $durasi;
            }

            $peminjaman->update([
                "tanggal_dikembalikan" => now()->format('Y-m-d'),
                "total_price" => $totalPrice,
            ]);

            Weapon::where('id', $peminjaman->weapons->id)->update([
                "available" => true,
            ]);


            return redirect()->back()->with('success', 'Data berhasil diperbarui.');
        } catch (\Throwable $e) {
            return redirect()->back()->with('danger', 'Terjadi kesalahan saat memperbarui data.');
        }
    }


    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        if ($peminjaman->tanggal_dikembalikan !== null) {
            Peminjaman::destroy($peminjaman->id);
            return to_route('admin.pengajuan.index')->with('delete', 'Delete Category Success');
        }

        return to_route('admin.pengajuan.index')->with('delete', 'Pengembalian belum dilakukan');
    }
}
