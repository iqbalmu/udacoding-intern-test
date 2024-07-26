@extends('layouts.main')

@section('content')
    <div class="row justify-content-center pb-5">
        <div class="col-md-8">
            <h3 class="mb-3">Tambah Siswa Baru</h3>
            <hr>
            <form method="POST" action="{{ route('siswa.store') }}">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn"
                            name="nisn" value="{{ old('nisn') }}" required>
                        @error('nisn')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-select @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin"
                            name="jenis_kelamin" required>
                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                            id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                        @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label for="nomor_hp" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror" id="nomor_hp"
                            name="nomor_hp" value="{{ old('nomor_hp') }}" required>
                        @error('nomor_hp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"
                        required>{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama_orang_tua" class="form-label">Nama Orang Tua</label>
                        <input type="text" class="form-control @error('nama_orang_tua') is-invalid @enderror"
                            id="nama_orang_tua" name="nama_orang_tua" value="{{ old('nama_orang_tua') }}" required>
                        @error('nama_orang_tua')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="nomor_hp_orang_tua" class="form-label">Nomor HP Orang Tua</label>
                        <input type="text" class="form-control @error('nomor_hp_orang_tua') is-invalid @enderror"
                            id="nomor_hp_orang_tua" name="nomor_hp_orang_tua" value="{{ old('nomor_hp_orang_tua') }}" required>
                        @error('nomor_hp_orang_tua')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('siswa.index') }}" class="btn btn-secondary ms-2">cancel</a>
                </div>

            </form>
        </div>
    </div>
@endsection
