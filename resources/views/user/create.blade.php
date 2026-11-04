@extends('layouts.admin.app')

@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tambah User</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Tambah User Baru</h1>
                <p class="mb-0">Masukkan data user pada form di bawah ini.</p>
            </div>
        </div>
    </div>

    <div class="card card-body border-0 shadow mb-4">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="birthday">Birthday</label>
                    <input type="date" name="birthday" id="birthday" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-select">
                        <option value="">-- Pilih Gender --</option>
                        <option value="Male">Laki-laki</option>
                        <option value="Female">Perempuan</option>
                        <option value="Other">Lainnya</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
                <a href="{{ route('user.index') }}" class="btn btn-gray-300 ms-2">Batal</a>
            </div>
        </form>
    </div>
@endsection