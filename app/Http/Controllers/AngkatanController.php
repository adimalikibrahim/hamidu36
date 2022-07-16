<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\anggota_ang;
use Illuminate\Http\Request;
use App\Models\Angkatan;
use Brian2694\Toastr\Facades\Toastr;
use Ramsey\Uuid\Uuid;

class AngkatanController extends Controller
{
    public function angkatan()
    {
        $alumni = Alumni::all();
        $angkatan = Angkatan::leftJoin('alumnis','angkatans.ketua_ang', '=', 'alumnis.id_alumni')
                                ->select('angkatans.*', 'alumnis.nama')
                                ->get();
        $angAng = anggota_ang::all();
        return view('angkatan.angkatan', compact('angkatan','alumni','angAng'));
    }

    public function angkatanAdd(Request $request)
    {

        if (Angkatan::where('angkatan', $request->angkatan)->first()) {
            Toastr::warning('angkatan '. $request->angkatan .' sudah ada!','Warning',
            ["positionClass" => "toast-top-center"]);
            return back();
        } else {
            $this->validate($request,[
                'angkatan' => 'required|string|max:255|unique:angkatans',
            ]);

            $uuid = Uuid::uuid4();
            Angkatan::create([
                'id_angkatan'   => $uuid,
                'nama_angkatan' => ucwords($request->nama_angkatan),
                'angkatan'      => ucwords($request->angkatan),
                'ketua_ang'           => $request->ketua_ang,
             ]);

             Toastr::success('Data berhasil ditambahkan','Success',
                ["positionClass" => "toast-top-center"]);
             return back();
        }
        
    }

    public function angkatanEdit(Request $request, $id)
    {
            $cek = Angkatan::where('id_angkatan', $id)->first();
        if ($cek) {

            Angkatan::where('id_angkatan', $id)->update(array(
                'angkatan'      => ucwords($request->angkatan),
                'nama_angkatan'      => ucwords($request->nama_angkatan),
                'ketua_ang'           => $request->ketua_ang,
            ));

                Toastr::success('Data berhasil ditambahkan','Success',
                ["positionClass" => "toast-top-center"]);
                return back();
        } else {
            Toastr::warning('Data gagal diUpdate','Warning',
                ["positionClass" => "toast-top-center"]);
            return back();
        }        
    }

    public function angkatanHapus($id)
    {
        $cek = anggota_ang::where('id_angkatan', $id)->count();
        // dd($id);

        if ($cek < 1) {
            Angkatan::where('id_angkatan', $id)->delete();
            Toastr::success('Data berhasil diHapus','Success',
                ["positionClass" => "toast-top-center"]);
                return back();
        } else {
            Toastr::warning('Angkatan masih mempunyai Anggota','Gagal',
                ["positionClass" => "toast-top-center"]);
                return back();
        }      
    }
}
