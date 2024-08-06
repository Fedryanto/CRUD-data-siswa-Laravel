@extends('layout/index')

@section('konten')
    <div>
        <h3>
            {{ $data->nama_depan ." ". $data->nama_belakang }}
        </h3>
        <p>
            <b>ID : </b> {{ $data->id }}
        </p>
        <p>
            <b>Tanggal Lahir :</b> {{ $data->tanggal_lahir }}
        </p>
        <p>
            <b>Jenis Kelamin :</b> {{ $data->jenis_kelamin }}
        </p>
        <p>
            <b>email :</b> {{ $data->email }}
        </p>
    </div>
    <a href="/admin" class="btn btn-primary btn-sm">Kembali</a>
@endsection