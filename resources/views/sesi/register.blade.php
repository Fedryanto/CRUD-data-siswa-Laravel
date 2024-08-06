@extends('layout/index')

@section('konten')
    <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1>Register</h1>
        <form action="/sesi/create" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama_depan" class="form-label">Nama Depan</label>
                <input type="text" value="{{ Session::get('nama_depan') }}" class="form-control" name="nama_depan">
            </div>
            <div class="mb-3">
                <label for="nama_belakang" class="form-label">Nama Belakang</label>
                <input type="text" value="{{ Session::get('nama_belakang') }}" class="form-control" name="nama_belakang">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="{{ Session::get('email') }}" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" value="{{ Session::get('tanggal_lahir') }}" class="form-control" name="tanggal_lahir">
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin">
                    <option value="Laki Laki">Laki Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" for="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <button name="submit" type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
@endsection