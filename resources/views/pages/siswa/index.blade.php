@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data Siswa</h4>

        <a href="{{ route('siswa.create') }}" class="btn btn-sm btn-success">tambah data</a>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th style="width: 5%" class="text-center">NO</th>
                <th class="text-center">NISN</th>
                <th class="text-center">nama</th>
                <th class="text-center">email</th>
                <th class="text-center">alamat</th>
                <th class="text-center">admin</th>
                <th class="text-center">aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $data)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $data->nisn }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->admin ? $data->admin->nama : 'Tidak Diketahui' }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                --
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" style="padding-left: 30px" href="{{ route('siswa.show', $data->id) }}">detail</a>
                                </li>
                                <li><a class="dropdown-item" style="padding-left: 30px" href="{{ route('siswa.edit', $data->id) }}">edit</a></li>
                                <li>
                                    <form action="{{ route('siswa.remove', $data->id) }}" method="POST"
                                        class="dropdown-item">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn"
                                            onclick="return confirm('Are you sure?')">delete</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
