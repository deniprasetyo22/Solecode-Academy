<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Buku;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DendaController extends Controller
{
    public function index()
    {
        $users = User::whereHas('peminjaman')->with('peminjaman.buku', 'peminjaman.anggota')->get();
        // Menghitung total denda untuk setiap user
        $users->each(function ($users) {
            $users->total_denda = $users->peminjaman->sum('denda');
        });
        return view('nomor3', ['users' => $users]);
    }
    public function create()
    {
        $users = User::all();
        $buku = Buku::all();
        $kategori = Kategori::all();
        return view('tambah', ['users' => $users, 'buku' => $buku, 'kategori' => $kategori]);
    }

    public function store(Request $request)
    {
        Peminjaman::create([
            'anggota_id' => $request->nama,
            'buku_id' => $request->judul,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_batas_kembali' => $request->tanggal_batas_kembali,
        ]);
        Alert::success('Success', 'Data Berhasil Ditambah.');
        return redirect('nomor3');
    }
    public function show_bayar(Request $request, $id)
    {
        $peminjaman = Peminjaman::with('buku', 'anggota')->findOrFail($id);
        return view('bayar', ['peminjaman' => $peminjaman]);
    }
    public function bayar(Request $request, $id)
    {
        $bayar = Peminjaman::findOrFail($id);
        $bayar->update([
            'denda' => 0
        ]);
        Alert::success('Success', 'Denda Berhasil Dibayar.');
        return redirect('nomor3');
    }
    public function show_kembalikan(Request $request, $id)
    {
        $peminjaman = Peminjaman::with('buku', 'anggota')->findOrFail($id);
        return view('kembalikan', ['peminjaman' => $peminjaman]);
    }
    public function kembalikan(Request $request, $id)
    {
        $kembalikan = Peminjaman::findOrFail($id);

        $tanggalBatas = Carbon::parse($kembalikan->tanggal_batas_kembali);
        $tanggalKembali = Carbon::parse($request->input('tanggal_kembali'));

        // Hitung selisih hari antara tanggal kembali dan tanggal batas kembali
        $selisihHari = $tanggalKembali->diffInDays($tanggalBatas);

        // Hitung denda
        $denda = $selisihHari * 1000;

        $kembalikan->update([
            'tanggal_kembali' => $request->tanggal_kembali,
            'denda' => $denda
        ]);
        Alert::success('Success', 'Buku Berhasil Dikembalikan.');
        return redirect('nomor3');
    }
}