<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;

class DataUserController extends Controller
{
    public function account()
    {
        $account = User::where('email', '!=', Auth::user()->email)->get();
        // $account = User::join('datausers', 'users.uuid', '=', 'datausers.id_datauser')
        //             ->get(['users.*', 'datausers.*']);
        return view('account.account', compact('account'));
    }

    public function accountAdd(Request $request)
    {

        if (User::where('email', $request->email)->first()) {
            Toastr::warning(
                'Email sudah digunakan!',
                'Warning',
                ["positionClass" => "toast-top-center"]
            );
            return back();
        } else {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                // 'password' => 'required|string|min:6'
            ]);

            $uuid = Uuid::uuid4();
            User::create([
                'uuid' => $uuid,
                'role' => $request->role,
                'name' => ucwords($request->name),
                'email' => $request->email,
                'password' => Hash::make(123456),
                'default'       => 123456
            ]);

            Toastr::success(
                'Data berhasil ditambahkan',
                'Success',
                ["positionClass" => "toast-top-center"]
            );
            return back();
        }
    }

    public function accountUpdate(Request $request, $id)
    {
        if (Auth::user()->uuid == $id) {
            User::where('uuid', $id)->update(array(
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ));
            Toastr::success(
                'Data berhasil diupdate',
                'Success',
                ["positionClass" => "toast-top-center"]
            );
            
            Auth::logout();
            return redirect('/');
        } else {
            User::where('uuid', $id)->update(array(
                'role' => $request->role,
                'name' => $request->name,
                'email' => $request->email,
            ));
            Toastr::success(
                'Data berhasil diupdate',
                'Success',
                ["positionClass" => "toast-top-center"]
            );
    
            return back();
        }
        

    }

    public function accountHapus($id)
    {
        $cek = User::where('uuid', $id)->get(['uuid']);
        if ($cek) {

            User::where('uuid', $id)->delete($id);

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
    public function keygen($id)
    {
        User::where('uuid', $id)->update(array(
            'password' => Hash::make('123456')
            
        ));

        Toastr::success(
            'Data berhasil diupdate',
            'Success',
            ["positionClass" => "toast-top-center"]
        );
      

        return back();
    }
    public function profile()
    {

        return view('auth.profile');
    }
}
