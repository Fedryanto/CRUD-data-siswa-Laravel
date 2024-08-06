@extends('layout/index')

@section('konten')
    <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1>Login</h1>
        <form action="/sesi/login" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input for="email" value="{{ Session::get('email') }}" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" for="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <button name="submit" type="submit" class="btn btn-primary">Login</button>
                <a href="/sesi/register" class="btn btn-success d-inline ">Register</a>
            </div>
        </form>
    </div>
@endsection