@extends('layout/index')

@section('konten')
    <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1>Data Admin</h1>
        <form action="{{'/admin/'.$data->id}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_depan" class="form-label">Nama Depan</label>
                <input type="text" value="{{ $data->nama_depan }}" class="form-control" name="nama_depan">
            </div>
            <div class="mb-3">
                <label for="nama_belakang" class="form-label">Nama Belakang</label>
                <input type="text" value="{{ $data->nama_belakang }}" class="form-control" name="nama_belakang">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="{{ $data->email }}" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" value="{{ $data->tanggal_lahir }}" class="form-control" name="tanggal_lahir">
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin" value="{{ $data->jenis_kelamin }}">
                    <option value="Laki Laki">Laki Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
                <a href="/admin" class="btn btn-danger ">Batal</a>
            </div>
        </form>
    </div>
@endsection