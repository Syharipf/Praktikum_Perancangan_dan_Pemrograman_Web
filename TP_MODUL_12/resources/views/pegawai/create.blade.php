@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0">Tambah Karyawan Baru</h5>
        </div>
        <div class="card-body">
            <form action="/pegawai/simpan" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label text-muted small">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" placeholder="Ex: Syarif" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted small">Posisi / Jabatan</label>
                    <select name="posisi" class="form-control" required>
                        <option value="">Pilih Posisi</option>
                        <option value="Staff">Staff</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Project Manager">Project Manager</option>
                        <option value="IT Support">IT Support</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted small">Gaji (IDR)</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" name="gaji" class="form-control" placeholder="Masukkan angka saja tanpa titik atau koma" required>
                    </div>
                </div>

                <div class="text-end">
                    <a href="/pegawai" class="btn btn-secondary me-1">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection