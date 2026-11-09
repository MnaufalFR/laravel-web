@extends('layouts.admin.app')

@section('content')
    <div class="py-4">
        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="#">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
            </ol>
        </nav>

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4">Data Pelanggan</h1>
                <p class="mb-0">List data seluruh pelanggan</p>
            </div>
            <div>
                <a href="{{ route('pelanggan.create') }}" class="btn btn-success text-white">
                    <i class="fas fa-plus me-1"></i> Tambah Pelanggan
                </a>
            </div>
        </div>
    </div>

    {{-- Pesan Sukses jika ada aksi --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Tabel Data --}}
    <div class="card card-body border-0 shadow table-wrapper table-responsive mb-4">
        <table class="table table-hover align-items-center">
            <thead>
                <tr>
                    <th class="border-0">Nama</th>
                    <th class="border-0">Email</th>
                    <th class="border-0">Password</th>
                    <th class="border-0 rounded-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dataPelanggan as $item)
                    <tr>
                        {{-- Cek fallback nama dari $item->nama, $item->nama_pelanggan, $item->name, atau relasi $item->user --}}
                        <td>{{ $item->nama ?? $item->nama_pelanggan ?? $item->name ?? $item->user->name ?? '-' }}</td>
                        <td>{{ $item->email ?? $item->user->email ?? '-' }}</td>
                        <td>
                            @if (!empty($item->password))
                                <span class="text-muted" title="{{ $item->password }}">{{ Str::limit($item->password, 20) }}</span>
                            @else
                                <span class="text-muted">••••••••</span>
                            @endif
                        </td>
                        <td>
                            {{-- Tombol Edit --}}
                            <a href="{{ route('pelanggan.edit', $item->pelanggan_id ?? $item->id) }}"
                                class="btn btn-info btn-sm text-white">Edit</a>

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('pelanggan.destroy', $item->pelanggan_id ?? $item->id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm text-white">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">Belum ada data pelanggan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
