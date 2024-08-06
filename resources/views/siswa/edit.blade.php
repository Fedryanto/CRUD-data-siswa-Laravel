@extends('layout/index')

@section('konten')
<form method="post" action="{{'/siswa/'.$data->nomor_induk}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama_depan" class="form-label">Nama Depan</label>
        <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="{{ $data->nama_depan }}">
    </div>
    <div class="mb-3">
        <label for="nama_belakang" class="form-label">Nama Belakang</label>
        <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="{{ $data->nama_belakang }}">
    </div>
    <div class="mb-3">
        <label for="nomor_hp" class="form-label">Nomor Hp</label>
        <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="{{ $data->nomor_hp }}">
    </div>
    <div class="mb-3">
        <label for="nomor_induk" class="form-label">Nomor Induk</label>
        <input type="text" class="form-control" id="nomor_induk" name="nomor_induk" value="{{ $data->nomor_induk }}" disabled="disabled">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" name="alamat">{{ $data->alamat }}</textarea>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Jenis Kelamin</label>
        <select class="form-control" name="jenis_kelamin">
            <option value="Laki Laki">Laki Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>
    @if ($data->gambar)
        <div class="mb-3">
            <img src="{{ url('img').'/'.$data->gambar }}">
        </div>
    @endif
    <div class="mb-3">
        <label for="gambar" class="form-label">Foto</label>
        <input type="file" class="form-control" name="gambar">{{ Session::get('gambar') }}</input>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
@endsection