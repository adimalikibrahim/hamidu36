<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\DataUser;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class DataUserController extends Controller
{
    public function account()
    {
        $account = User::join('datausers', 'users.uuid', '=', 'datausers.id_datauser')
        ->get(['users.*', 'datausers.*']);
        return view('account.account', compact('account'));
    }

    // public function accountAdd(Request $request)
    // {

    //     if (User::where('email',$request->email)->first()) {
    //         Toastr::warning('Email sudah digunakan!','Warning',
    //         ["positionClass" => "toast-top-center"]);
    //         return back();
    //     } else {
    //         $this->validate($request,[
    //             'name' => 'required|string|max:255',
    //             'email' => 'required|string|email|max:255|unique:users',
    //             // 'password' => 'required|string|min:6'
    //         ]);
            
    //         $pass = str::random(6);
    //         $uuid = Uuid::uuid4();
    //         $datauser = DataUser::create([
    //             'id_datauser'   => $uuid,
    //             'nama'          => ucwords($request->name),
    //             'default'       => $pass
    //          ]);
             
    //         $user = User::create([
    //             'uuid' => $uuid,
    //             'role' => $request->role,
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'password' => Hash::make($pass)
    //          ]);

    //         Toastr::success('Data berhasil ditambahkan','Success',
    //         ["positionClass" => "toast-top-center"]);
    //         return back();


    //     }
        
    // }

    // public function accountUpdate(Request $request, $id)
    // {
    //     DataUser::where('id_datauser', $id)->update(array(
    //         'nama'          => ucwords($request->name),
    //         'hp'            => $request->hp,
    //         'alamat'        => $request->alamat
    //      ));
         
    //     User::where('uuid', $id)->update(array(
    //         'role' => $request->role,
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password)
    //     ));

    //     Toastr::success('Data berhasil diupdate','Success',
    //     ["positionClass" => "toast-top-center"]);

    //     return back();
        
    // }

    // public function profile()
    // {
    //     return view('account_keheula.profile');
    // }

    // public function keygen($id)
    // {
    //     $pass = str::random(6);
    //     User::where('uuid', $id)->update([
    //         'password' => Hash::make($pass)
    //     ]);
    //     DataUser::where('id_datauser', $id)->update(array(
    //         'default' => $pass,
    //     ));

    //     Toastr::success('Data berhasil diresset','Success',
    //     ["positionClass" => "toast-top-center"]);

    //     return back();

    // }
}
