<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Angkatan;
use App\Models\Kordinator;
use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Ramsey\Uuid\Uuid;

class AlumniController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function alumni()
    {
        $angkatan = Angkatan::all();
        $kordinator = Kordinator::all();
        $alumni = Alumni::leftJoin('angkatans','angkatans.id_angkatan', '=', 'alumnis.id_angkatan')
                        ->leftJoin('kordinators','kordinators.id_kordinator', '=', 'alumnis.id_kordinator')
                        ->get();
        // $alumni = Alumni::with('kord')->get();
        // dd($alumni);
        return view('alumni.alumni', compact('alumni','angkatan', 'kordinator'));
    }

    public function alumniAdd(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|string|max:255',
        ]);

        if ($request->jk == '1') {
            $kode = 'HMD';
        } else {
            $kode = 'SWD';
        }
        
        if (empty(Alumni::max('urut'))) {
            $urut = 1;
        } else {
            $cek = Alumni::orderBy('urut', 'desc')->first();
            $urut = $cek->urut+1;
        }
        $date = strval(date('y'))*100000+$urut;
        
        $nia = $kode.$date;

        $uuid = Uuid::uuid4();
        Alumni::create([
            'id_alumni'     => $uuid,
            'nia'           => $nia,
            'urut'          => $urut,
            'nama'          => ucwords($request->nama),
            'jk'            => ucwords($request->jk),
            'prov'          => ucwords($request->prov),
            'kab'           => ucwords($request->kab),
            'kec'           => ucwords($request->kec),
            'desa'          => ucwords($request->desa),
            'hp'            => $request->hp,
            'id_kordinator' => $request->id_kordinator,
            'id_angkatan'   => $request->id_angkatan,
            ]);

            Toastr::success('Data berhasil ditambahkan','Success',
            ["positionClass" => "toast-top-center"]);
            return back();        
    }
    public function alumniEdit(Request $request, $id)
    {
        dd($request);
        $cek = Alumni::find($id)->first();
        if ($cek) {
            Alumni::where('id_alumni', $id)->update(array(
                'nama'          => ucwords($request->nama),
                'prov'          => ucwords($request->prov),
                'kab'           => ucwords($request->kab),
                'kec'           => ucwords($request->kec),
                'desa'          => ucwords($request->desa),
                'hp'            => $request->hp,
                'id_kordinator' => $request->input('id_kordinator'),
                'id_angkatan'   => $request->id_angkatan
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

    public function alumniHapus($id)
    {
        if ($id) {

            Alumni::where('id_alumni', $id)->delete($id);

                Toastr::success('Data berhasil diHapus','Success',
                ["positionClass" => "toast-top-center"]);
                return back();
        } else {
            Toastr::warning('Data gagal diHapus','Warning',
                ["positionClass" => "toast-top-center"]);
            return back();
        }        
    }
}
