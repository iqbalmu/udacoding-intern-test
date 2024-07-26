<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.siswa.index', [
            'siswa' => Siswa::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nisn' => 'required|digits:10|unique:siswas',
            'nama' => 'required|string|min:3',
            'email' => 'required|email|unique:siswas',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'nomor_hp' => 'required|string|min:10|max:15',
            'nama_orang_tua' => 'required|string|min:3',
            'nomor_hp_orang_tua' => 'required|string|min:10|max:15',
        ]);

        $siswa = new Siswa($validatedData);
        $siswa->admin_id = Auth::id();
        $siswa->save();

        notyf()->position('y', 'top')->duration(1500)->addSuccess('Data siswa berhasil ditambahkan.');

        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('pages.siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.siswa.edit', [
            'siswa' => Siswa::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nisn' => 'required|string|max:255|unique:siswas,nisn,' . $id,
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:siswas,email,' . $id,
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'nomor_hp' => 'required|string',
            'nama_orang_tua' => 'required|string',
            'nomor_hp_orang_tua' => 'required|string',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($validatedData);

        notyf()->position('y', 'top')->duration(1500)->addSuccess('Data siswa berhasil diperbarui.');

        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function remove(string $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        notyf()->position('y', 'top')->duration(1500)->addSuccess('Data siswa berhasil dihapus.');

        return redirect()->route('siswa.index');
    }
}
