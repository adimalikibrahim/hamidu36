<?php

namespace App\Http\Controllers;

use App\Models\anggota_ang;
use Illuminate\Http\Request;
use App\Models\Alumni;
use App\Models\Angkatan;
use Brian2694\Toastr\Facades\Toastr;
use Laravel\Ui\Presets\React;
use Ramsey\Uuid\Uuid;

class AnggotaAngController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function anggotaAng(Request $request, $id)
    {
        $alumni = Alumni::where('id_angkatan', null)->get();
        $anggota = Alumni::where('id_angkatan', $id)->get();
        $angkatan = Angkatan::where('id_angkatan', $id)->first();
        $id_ang= $id;
        return view('angkatan.anggotaAngkatan', compact('alumni','anggota','id_ang','angkatan'));
    }

    public function anggotaAngAdd(Request $request, $id)
    {
       $uuid = Uuid::uuid4();
            anggota_ang::create([
            'id_anggota_ang' => $uuid,
            'id_alumni'     => $request->id_alumni,
            'id_angkatan' => $id
       ]);

       Alumni::where('id_alumni', $request->id_alumni)->update([
        'id_angkatan' => $id
       ]);
       Toastr::success('Data Berhasil diUpdate','success',
        ["positionClass" => "toast-top-center"]);
        return back();
    }
    public function anggotaAngDelete(Request $request, $id)
    {
        anggota_ang::where('id_alumni', $id)->delete();

        Alumni::where('id_alumni', $id)->update([
            'id_angkatan' => null
        ]);
        Toastr::success('Data Berhasil diHapus','success',
            ["positionClass" => "toast-top-center"]);
            return back();
    }
}
