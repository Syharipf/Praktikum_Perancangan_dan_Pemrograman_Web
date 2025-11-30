@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">Edit Data Karyawan</h5>
        </div>
        <div class="card-body">
            <form action="/pegawai/update/{{ $pegawai->id }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label text-muted small">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="{{ $pegawai->nama }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted small">Posisi / Jabatan</label>
                    <input type="text" name="posisi" class="form-control" value="{{ $pegawai->posisi }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted small">Gaji (IDR)</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" name="gaji" class="form-control" value="{{ $pegawai->gaji }}" required>
                    </div>
                </div>

                <div class="text-end">
                    <a href="/pegawai" class="btn btn-secondary me-1">Batal</a>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection