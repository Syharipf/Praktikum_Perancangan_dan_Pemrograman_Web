@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Daftar Karyawan</h5>
            <a href="/pegawai/tambah" class="btn btn-primary btn-sm">Tambah</a>
        </div>
        
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Posisi</th>
                        <th>Gaji</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($pegawai as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->posisi }}</td>
                        <td>Rp {{ number_format($p->gaji, 0, ',', '.') }}</td>
                        <td class="text-end">
                            <a class="btn btn-sm btn-warning" href="/pegawai/edit/{{ $p->id }}">Edit</a>
                            <a class="btn btn-sm btn-danger" href="/pegawai/hapus/{{ $p->id }}" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-3">No data available</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection