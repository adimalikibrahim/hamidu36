<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\anggota_kor;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Ramsey\Uuid\Uuid;
use App\Models\Kordinator;

class KordinatorController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function kordinator(){
        $alumni = Alumni::all();
        $kordinator = Kordinator::leftJoin('alumnis','kordinators.ketua_kor', '=', 'alumnis.id_alumni')
                                ->select('kordinators.*', 'alumnis.nama')
                                ->get();
        $angKor = anggota_kor::all();
        return view('kordinator.kordinator', compact('kordinator','alumni', 'angKor'));
    }

    public function kordinatorHapus($id){
        
        $cek = anggota_kor::where('id_kordinator', $id)->count();
        
        if ($cek < 1) {
            Kordinator::where('id_kordinator', $id)->delete();
            Toastr::success('Data berhasil diHapus','Success',
                ["positionClass" => "toast-top-center"]);
                return back();
        } else {
            Toastr::warning('Kordinator masih mempunyai Anggota','Gagal',
                ["positionClass" => "toast-top-center"]);
                return back();
        }
    }

    public function kordinatorEdit(Request $request, $id){
            
        if ($id) {

            Kordinator::where('id_kordinator', $id)->update(array(
                'kordinator'      => ucwords($request->kordinator),
                'ketua_kor'           => $request->ketua_kor
            ));

            Toastr::success('Data berhasil diUpdate','Success',
            ["positionClass" => "toast-top-center"]);
            return back();
        } else {
            Toastr::warning('Data gagal diUpdate','Warning',
                ["positionClass" => "toast-top-center"]);
            return back();
        }        
    }

    public function kordinatorAdd(Request $request)
    {

        if (Kordinator::where('kordinator', $request->kordinator)->first()) {
            Toastr::warning('kordinator '. $request->kordinator .' sudah ada!','Warning',
            ["positionClass" => "toast-top-center"]);
            return back();
        } else {
            $this->validate($request,[
                'kordinator' => 'required|string|max:255|unique:kordinators',
            ]);

            $uuid = Uuid::uuid4();
            Kordinator::create([
                'id_kordinator'   => $uuid,
                'kordinator'      => ucwords($request->kordinator),
                'ketua_kor'           => $request->ketua_kor
             ]);

             Toastr::success('Data berhasil ditambahkan','Success',
                ["positionClass" => "toast-top-center"]);
             return back();
        }
        
    }
}
