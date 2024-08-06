@extends('layout/index')

@section('konten')
    <div>
        <a href="/siswa" class="btn btn-secondary btn-sm">Kembali</a>
        <h3>
            {{ $data->nama_depan ." ". $data->nama_belakang }}
        </h3>
        <p>
            <b>Nomor Hp :</b> {{ $data->nomor_hp }}
        </p>
        <p>
            <b>Nomor Induk :</b> {{ $data->nomor_induk }}
        </p>
        <p>
            <b>Alamat :</b> {{ $data->alamat }}
        </p>
        <p>
            <b>Jenis Kelamin :</b> {{ $data->jenis_kelamin }}
        </p>
    </div>
@endsection