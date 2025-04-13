<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalSiaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('jadwal-siaran.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'judul.required' => 'Judul harus diisi.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'jam_mulai.required' => 'Jam mulai harus diisi.',
            'jam_selesai.required' => 'Jam selesai harus diisi.',
            'jam_selesai.after' => 'Jam selesai harus setelah jam mulai.',
            'gambar.required' => 'Gambar harus diunggah.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.',
            'gambar.mimes' => 'Format gambar yang diizinkan: jpeg, png, jpg, gif.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih besar dari 2MB.',
        ]);

        $gambar = $request->file('gambar');
        $gambarPath = $gambar->store('jadwal-siaran', 'public');

        Jadwal::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('jadwal-siaran.index')->with('success', 'Jadwal siaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $jadwal = Jadwal::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('jadwal-siaran', 'public');
            $jadwal->gambar = $gambarPath;
        }

        $jadwal->judul = $request->judul;
        $jadwal->deskripsi = $request->deskripsi;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_selesai = $request->jam_selesai;
        $jadwal->save();    

        return redirect()->route('jadwal-siaran.index')->with('success', 'Jadwal siaran berhasil diperbarui.');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('jadwal-siaran.index')->with('success', 'Jadwal siaran berhasil dihapus.');
    }
}
