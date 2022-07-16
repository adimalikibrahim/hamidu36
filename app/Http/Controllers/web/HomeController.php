<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\anggota_ang;
use App\Models\anggota_kor;
use App\Models\Angkatan;
use App\Models\Kordinator;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function webIndex()
    {
        $jmlKor = Kordinator::count();
        $jmlAng = Angkatan::count();
        $jmlAlm = Alumni::count();
        $sawahud = Alumni::where('jk', 2)->count();
        $hamidu = Alumni::where('jk', 1)->count();
        return view('welcome', compact('jmlKor', 'jmlAng','jmlAlm', 'sawahud','hamidu'));
    }

    public function webKor()
    {
        $kor = Kordinator::orderBy('kordinator', 'asc')->get();
        $angKor = anggota_kor::all();
        $alumni = Alumni::all();
        return view('web.kordinator', compact('kor','angKor','alumni'));
    }

    public function webAng()
    {
        $ang = Angkatan::orderBy('angkatan', 'asc')->get();
        $angAng = anggota_ang::all();
        $alumni = Alumni::all();
        return view('web.angkatan', compact('ang', 'angAng','alumni'));
    }

    public function webAlumni()
    {
        $alumni = Alumni::all('nama','nia','id_kordinator','id_angkatan');
        $kor = Kordinator::all();
        $ang = anggota_kor::all();
        // $alumni = Alumni::leftJoin('kordinators', 'kordinators.id_kordinator', '=', 'alumnis.id_kordinator')
        // ->leftJoin('angkatans', 'angkatans.id_angkatan', '=', 'alumnis.id_angkatan')
        // ->get(['nama','nia','kordinator','angkatan']);
        // return view('web.alumni', compact('alumni'));
        return view('web.alumni', compact('alumni','kor','ang'));
    }

    public function angKor($id)
    {
        $alumni = Alumni::leftJoin('angkatans', 'angkatans.id_angkatan', '=', 'alumnis.id_angkatan')
                            ->where('id_kordinator', $id)
                            ->get(['nama','nia','angkatan','kec']);
        $kor = Kordinator::where('id_kordinator', $id)->first('kordinator');
        return view('web.anggotaKor', compact('alumni','kor'));
    }

    public function angAng($id)
    {
        $alumni = Alumni::leftJoin('kordinators', 'kordinators.id_kordinator', '=', 'alumnis.id_kordinator')
                            ->where('id_angkatan', $id)
                            ->get(['nama','nia','kordinator','kec']);
        $ang = Angkatan::where('id_angkatan', $id)->first('angkatan');
        return view('web.anggotaAng', compact('alumni','ang'));
    }
}
