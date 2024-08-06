<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = siswa::orderBy('nomor_induk', 'asc')->get();
        return view('siswa/index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nama_depan', $request->nama_depan);
        Session::flash('nama_belakang', $request->nama_belakang);
        Session::flash('nomor_hp', $request->nomor_hp);
        Session::flash('nomor_induk', $request->nomor_induk);
        Session::flash('alamat', $request->alamat);
        Session::flash('jenis_kelamin', $request->jenis_kelamin);
        $request->validate([
            'nomor_induk'=>'required | numeric',
            'nama_depan'=>'required',
            'nama_belakang'=>'required',
            'nomor_hp'=>'required',
            'alamat'=>'required',
            'jenis_kelamin'=>'required',
            'gambar'=>'required | mimes:jpeg,jpg,png,gif'
        ], [
            'nomor_induk.required'=>'Nomor Induk Wajib Diisi',
            'nomor_induk.numeric'=>'Nomor Induk Wajib Diisi Dengan Angka',
            'nama_depan.required'=>'Nama Depan Wajib Diisi',
            'nama_belakang.required'=>'Nama Belakang Wajib Diisi',
            'alamat.required'=>'Alamat Induk Wajib Diisi',
            'nomor_hp.required'=>'Nomor HP Wajib Diisi',
            'gambar.required'=>'Foto Wajib Diisi',
            'gambar.mimes'=>'Foto Harus Berekstensi Tertentu',
        ]);
        $foto_file = $request->file('gambar');
        $foto_ext = $foto_file->extension();
        $foto_name = date('ymdhis').".".$foto_ext;
        $foto_file->move(public_path('img'), $foto_name);

        $data =[
            'nama_depan'=>$request->input('nama_depan'),
            'nama_belakang'=>$request->input('nama_belakang'),
            'nomor_hp'=>$request->input('nomor_hp'),
            'nomor_induk'=>$request->input('nomor_induk'),
            'alamat'=>$request->input('alamat'),
            'jenis_kelamin'=>$request->input('jenis_kelamin'),
            'gambar'=> $foto_name
        ];
        siswa::create($data);
        return redirect('siswa')->with('success','Berhasil Memasukan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = siswa::where('nomor_induk', $id)->first();
        return view('siswa/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = siswa::where('nomor_induk', $id)->first();
        return view('siswa/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_depan'=>'required',
            'nama_belakang'=>'required',
            'nomor_hp'=>'required',
            'alamat'=>'required',
            'jenis_kelamin'=>'required'
        ], [
            'nama_depan.required'=>'Nama Depan Wajib Diisi',
            'nama_belakang.required'=>'Nama Belakang Wajib Diisi',
            'alamat.required'=>'Alamat Induk Wajib Diisi',
            'nomor_hp.required'=>'Nomor HP Wajib Diisi',
            'jenis_kelamin.required'=>'Jenis Kelamin Wajib Diisi',
        ]);
        $data = [
            'nama_depan' => $request->input('nama_depan'),
            'nama_belakang' => $request->input('nama_belakang'),
            'alamat' => $request->input('alamat'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'nomor_hp' => $request->input('nomor_hp'),
        ];

        if ($request->hasFile('gambar')){
            $request->validate([
                'gambar' => 'mimes:jpeg,jpg,png,gif'
            ], [
                'gambar.mimes' => 'Foto Harus Berekstensi Khusus'
            ]);
            
            $foto_file = $request->file('gambar');
            $foto_ext = $foto_file->extension();
            $foto_name = date('ymdhis').".".$foto_ext;
            $foto_file->move(public_path('img'), $foto_name);
            }
            $data_gambar = siswa::where('nomor_induk', $id)->first();
            File::delete(public_path('img'). '/' . $data_gambar->gambar);

            $data =[
                'gambar'=> $foto_name
            ];


        siswa::where('nomor_induk', $id)->update($data);
        return redirect('/siswa')->with('success','Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = siswa::where('nomor_induk', $id)->first();
        File::delete(public_path('img').'/'.$data->gambar);
        siswa::where('nomor_induk', $id)->delete();
        return redirect('/siswa')->with('success','Berhasil menghapus data');
    }
}
