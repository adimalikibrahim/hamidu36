<?php
namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\anggota_ang;
use App\Models\anggota_kor;
use App\Models\Angkatan;
use App\Models\Kordinator;
use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Laravel\Ui\Presets\React;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Yajra\DataTables\Facades\DataTables;

class AlumniController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function alumnijson()
    {
        $alumni = Alumni::leftJoin('kordinators', 'kordinators.id_kordinator', '=', 'alumnis.id_kordinator')
            ->leftJoin('angkatans', 'angkatans.id_angkatan', '=', 'alumnis.id_angkatan')
            ->get();
        return response()->json($alumni);
    }

    public function alumni(Request $request)
    {
        // $angkatan = Angkatan::orderBy('angkatan', 'asc')->get();
        // $kordinator = Kordinator::orderBy('kordinator', 'asc')->get();
        // $alumni = Alumni::leftJoin('kordinators', 'kordinators.id_kordinator', '=', 'alumnis.id_kordinator')
        //     ->leftJoin('angkatans', 'angkatans.id_angkatan', '=', 'alumnis.id_angkatan')
        //     ->get();
        // return view('alumni.alumni', compact('alumni', 'angkatan', 'kordinator'));

        // ========================serverside datatable yajra=============================

        if ($request->ajax()) {
            $alumni = Alumni::leftJoin('kordinators', 'kordinators.id_kordinator', '=', 'alumnis.id_kordinator')
                ->leftJoin('angkatans', 'angkatans.id_angkatan', '=', 'alumnis.id_angkatan')
                ->get();

            return DataTables::of($alumni)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="#" class="btn btn-sm btn-info-soft mb-0" data-bs-toggle="modal"
                           data-bs-target="#modalEdit{{ $alm->id_alumni }}">
                           <i class="tf-icons bx bx-edit"></i>Edit</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('alumni.alumni');
    }

    public function alumniAdd(Request $request)
    {
        $this->validate($request, [
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
            $urut = $cek->urut + 1;
        }
        $date = strval(date('y')) * 100000 + $urut;

        $nia = $kode . $date;

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

        Toastr::success(
            'Data berhasil ditambahkan',
            'Success',
            ["positionClass" => "toast-top-center"]
        );
        return back();
    }
    public function alumniEdit(Request $request, $id)
    {
        $cek = Alumni::where('id_alumni', $id)->first();
        if ($cek) {
            Alumni::where('id_alumni', $cek->id_alumni)->update([
                'nama'          => ucwords($request->nama),
                'prov'          => ucwords($request->prov),
                'kab'           => ucwords($request->kab),
                'kec'           => ucwords($request->kec),
                'desa'          => ucwords($request->desa),
                'hp'            => $request->hp,
                'id_kordinator' => $request->id_kordinator,
                'id_angkatan'   => $request->id_angkatan,
            ]);
            $cek1 = anggota_ang::where('id_alumni', $cek->id_alumni)->first();
            if ($cek1) {
                anggota_ang::where('id_alumni', $cek->id_alumni)->update([
                    'id_angkatan'   => $request->id_angkatan,
                ]);
            } else {
                anggota_ang::create([
                    'id_anggota_ang'    => Uuid::uuid4(),
                    'id_alumni'         => $cek->id_alumni,
                    'id_angkatan'       => $request->id_angkatan,
                ]);
            }

            $cek2 = anggota_kor::where('id_alumni', $cek->id_alumni)->first();
            if ($cek2) {
                anggota_kor::where('id_alumni', $cek->id_alumni)->update([
                    'id_kordinator'   => $request->id_kordinator,
                ]);
            } else {
                anggota_kor::create([
                    'id_alumni'   => $cek->id_alumni,
                    'id_anggota_kor'    => Uuid::uuid4(),
                    'id_kordinator'   => $request->id_kordinator,
                ]);
            }

            Toastr::success(
                'Data berhasil diUpdate',
                'Success',
                ["positionClass" => "toast-top-center"]
            );
            return back();
        } else {
            Toastr::warning(
                'Data gagal diUpdate',
                'Warning',
                ["positionClass" => "toast-top-center"]
            );
            return back();
        }
    }

    public function alumniHapus($id)
    {
        if ($id) {

            Alumni::where('id_alumni', $id)->delete($id);

            Toastr::success(
                'Data berhasil diHapus',
                'Success',
                ["positionClass" => "toast-top-center"]
            );
            return back();
        } else {
            Toastr::warning(
                'Data gagal diHapus',
                'Warning',
                ["positionClass" => "toast-top-center"]
            );
            return back();
        }
    }
}
