<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $buku = Buku::whereDoesntHave('peminjaman')->get(['judul']);

        $user = User::with('peminjaman.buku')->whereHas('peminjaman', function ($query) {
            $query->where('denda', '>', 0);
        })->with([
                    'peminjaman' => function ($query) {
                        $query->where('denda', '>', 0);
                    }
                ])->get();

        $users = User::with('peminjaman.buku')->get();

        return view('nomor2', ['buku' => $buku, 'user' => $user, 'users' => $users]);
    }
}
