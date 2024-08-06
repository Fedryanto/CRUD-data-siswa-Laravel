@extends('layout/index')

@include('komponen/menu')
@section('konten')
<a href="/siswa/create" class="btn btn-primary mb-3">Tambah Data Siswa</a>
<table class="table">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nama Depan</th>
            <th>Nama Belakang</th>
            <th>Nomor Hp</th>
            <th>Nomor Induk Siswa</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>
                    @if ($item->gambar)
                        <img class="rounded float-left" width="100" height="100" src="{{ url('img').'/'. $item->gambar }}">
                    @endif
                </td>
                <td>{{$item->nama_depan}}</td>
                <td>{{$item->nama_belakang}}</td>
                <td>{{$item->nomor_hp}}</td>
                <td>{{$item->nomor_induk}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->jenis_kelamin}}</td>
                <td>
                    <a class="btn btn-secondary btn-sm" href="{{ url('/siswa/'.$item->nomor_induk) }}">Detail</a>
                    <a class="btn btn-warning btn-sm" href="{{ url('/siswa/'.$item->nomor_induk.'/edit') }}">Edit</a>
                    <form onsubmit="return confirm('Yakin Mau Menghapus Data ?')" class="d-inline" action="{{ '/siswa/'.$item->nomor_induk }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection