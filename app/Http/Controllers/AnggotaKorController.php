<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\anggota_kor;
use App\Models\Kordinator;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Brian2694\Toastr\Facades\Toastr;

class AnggotaKorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function anggotaKor(Request $request, $id)
    {
        $alumni = Alumni::where('id_kordinator', null)->get();
        $anggota = Alumni::where('id_kordinator', $id)->get();
        $kordinator = Kordinator::where('id_kordinator', $id)->first();
        $id_kordi = $id;
        return view('kordinator.anggotaKordinator', compact('alumni','anggota','id_kordi','kordinator'));
    }

    public function anggotaKorAdd(Request $request, $id)
    {
       $uuid = Uuid::uuid4();
            anggota_kor::create([
            'id_anggota_kor' => $uuid,
            'id_alumni'     => $request->id_alumni,
            'id_kordinator' => $id
       ]);

       Alumni::where('id_alumni', $request->id_alumni)->update([
        'id_kordinator' => $id
       ]);
       Toastr::success('Data Berhasil diUpdate','success',
        ["positionClass" => "toast-top-center"]);
        return back();
    }

    public function anggotaKorDelete(Request $request, $id)
    {
        anggota_kor::where('id_alumni', $id)->delete();

        Alumni::where('id_alumni', $id)->update([
            'id_kordinator' => null
        ]);
        Toastr::success('Data Berhasil diHapus','success',
            ["positionClass" => "toast-top-center"]);
            return back();
    }
}
