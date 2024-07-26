@extends('layouts.main')

@section('content')
    <div class="row justify-content-center pb-5">
        <div class="col-md-8">
            <h3 class="mb-3">Detail Siswa</h3>
            <hr>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nisn" class="form-label">NISN</label>
                    <input disabled type="text" class="form-control id="nisn" name="nisn" value="{{ $siswa->nisn }}"
                        required>
                </div>

                <div class="col-md-6">
                    <label for="nama" class="form-label">Nama</label>
                    <input disabled type="text" class="form-control id="nama" name="nama" value="{{ $siswa->nama }}"
                        required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input disabled type="text" class="form-control id="email" name="email" value="{{ $siswa->email }}"
                        required>
                </div>

                <div class="col-md-6">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select class="form-select id="jenis_kelamin" name="jenis_kelamin" required disabled>
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="L" {{ $siswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ $siswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input disabled type="date" class="form-control id="tanggal_lahir" name="tanggal_lahir"
                        value="{{ $siswa->tanggal_lahir }}" required>
                </div>

                <div class="col-md-6">
                    <label for="nomor_hp" class="form-label">Nomor HP</label>
                    <input disabled type="text" class="form-control id="nomor_hp" name="nomor_hp"
                        value="{{ $siswa->nomor_hp }}" required>
                </div>
            </div>


            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea disabled class="form-control id="alamat" name="alamat" rows="3" required>{{ $siswa->alamat }}</textarea>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nama_orang_tua" class="form-label">Nama Orang Tua</label>
                    <input disabled type="text" class="form-control id="nama_orang_tua" name="nama_orang_tua"
                        value="{{ $siswa->nama_orang_tua }}" required>
                </div>

                <div class="col-md-6">
                    <label for="nomor_hp_orang_tua" class="form-label">Nomor HP Orang Tua</label>
                    <input disabled type="text" class="form-control
                        id="nomor_hp_orang_tua"
                        name="nomor_hp_orang_tua" value="{{ $siswa->nomor_hp_orang_tua }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="nama_orang_tua" class="form-label">Admin</label>
                <input disabled type="text" class="form-control" value="{{ $siswa->admin->nama }}" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>

                <div class="d-flex">
                    <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-success me-2">Edit</a>
                    <form action="{{ route('siswa.remove', $siswa->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
