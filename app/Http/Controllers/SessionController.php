<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index(){
        return view('sesi/index');
    }
    function login(Request $request){
        Session::flash('eamil',$request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ], [
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi',
        ]);

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if (Auth::attempt($infologin)){
            return redirect('siswa')->with('success','berhasil login');
        } else{
            return redirect('sesi')->withErrors('Username dan Passwrod tidak valid');
        }
    }
    function logout(){
        Auth::logout();
        return redirect('sesi')->with('success', 'berhasil logout');
    }
    
    function register(){
        return view('sesi/register');
    }

    function create(Request $request){
        Session::flash('nama_depan',$request->nama_depan);
        Session::flash('nama_belakang',$request->nama_belakang);
        Session::flash('email',$request->email);
        Session::flash('tanggal_lahir',$request->tanggal_lahir);
        Session::flash('jenis_kelamin',$request->jenis_kelamin);
        $request->validate([
            'nama_depan'=>'required',
            'nama_belakang'=>'required',
            'tanggal_lahir'=>'required',
            'jenis_kelamin'=>'required',
            'email'=>'required | email | unique:users',
            'password'=>'required'
        ], [
            'email.required'=>'Email wajib diisi',
            'email.email'=>'Email tidak valid',
            'email.unique'=>'Email yang dimasukan sudah pernah digunakan',
            'password.required'=>'Password wajib diisi',
        ]);

        // Kode untuk memasukan data ke dalam database pada table user
        $data = [
            'nama_depan'=>$request->nama_depan,
            'nama_belakang'=>$request->nama_belakang,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ];
        User::create($data);

        // Redirect Login setelah register
        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password
        ];

        if (Auth::attempt($infologin)){
            return redirect('siswa')->with('success', Auth::user()->nama_depan . ' berhasil login');
        } else{
            return redirect('sesi')->withErrors('Username dan Passwrod tidak valid');
        }
    }
}
