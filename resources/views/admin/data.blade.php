@extends('layout/index')
@include('komponen/menu')
@section('konten')
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nama_depan}}</td>
                    <td>{{$item->nama_belakang}}</td>
                    <td>{{$item->tanggal_lahir}}</td>
                    <td>{{$item->jenis_kelamin}}</td>
                    <td>{{$item->email}}</td>
                    <td>
                        <a class="btn btn-secondary btn-sm" href="{{ url('/admin/'.$item->id) }}">Detail</a>
                        <a class="btn btn-warning btn-sm" href="{{ url('/admin/'.$item->id.'/edit') }}">Edit</a>
                        <form onsubmit="return confirm('Yakin Mau Menghapus Data ?')" class="d-inline" action="{{ '/admin/'.$item->id }}" method="POST">
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