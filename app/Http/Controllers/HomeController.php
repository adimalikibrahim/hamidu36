<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\anggota_kor;
use App\Models\Angkatan;
use App\Models\Kordinator;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kordinator = Kordinator::all();
        $angkatan = Angkatan::orderBy('angkatan', 'asc')->get();
        $alumni = Alumni::all();

        return view('home', compact('kordinator', 'alumni', 'angkatan'));
    }

    public function KordinatorChart()
    {

        $kordi = Kordinator::orderBy('kordinator', 'asc')->get();
        foreach ($kordi as $kordi) {
            $jumlah = Alumni::where('id_kordinator', $kordi->id_kordinator);
            $kor[] = [
                'x' => $kordi->kordinator,
                'y' => $jumlah->count('id_alumni'),
            ];
        }

        return response()->json($kor);
    }
}
