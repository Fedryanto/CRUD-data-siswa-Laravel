<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::orderBy('id', 'asc')->get();
        return view('admin/data')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::where('id', $id)->first();
        return view('admin/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::where('id', $id)->first();
        return view('admin/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_depan'=>'required',
            'nama_belakang'=>'required',
            'tanggal_lahir'=>'required',
            'jenis_kelamin'=>'required',
            'email'=>'required | email ',
        ], [
            'email.required'=>'Email wajib diisi',
            'email.email'=>'Email tidak valid',
        ]);
        $data = [
            'nama_depan'=>$request->nama_depan,
            'nama_belakang'=>$request->nama_belakang,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'email'=>$request->email,
        ];
        User::where('id', $id)->update($data);
        return redirect('/admin')->with('success','Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::where('id', $id)->first();
        User::where('id', $id)->delete();
        return redirect('/admin')->with('success','Berhasil menghapus data');
    }
}
