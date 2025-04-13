<?php

namespace App\Http\Controllers;

use App\Models\Weekly;
use Illuminate\Http\Request;

class WeeklyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weeklySchedule = Weekly::all();
        return view('jadwal-siaran.weekly', compact('weeklySchedule'));
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
            'hari' => 'required',
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
            'hari.required' => 'Hari harus diisi.',
        ]);

        $gambar = $request->file('gambar');
        $gambarPath = $gambar->store('weekly', 'public');

        Weekly::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'gambar' => $gambarPath,
            'hari' => $request->hari
        ]);
        

        return redirect()->route('weekly.index')->with('success', 'Jadwal siaran weekly berhasil ditambahkan.');
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
            'hari' => 'required',
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
            'hari.required' => 'Hari harus diisi.',
        ]);
        $weekly = Weekly::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('weekly', 'public');
            $weekly->gambar = $gambarPath;
        }

        $weekly->judul = $request->judul;
        $weekly->deskripsi = $request->deskripsi;
        $weekly->jam_mulai = $request->jam_mulai;
        $weekly->jam_selesai = $request->jam_selesai;
        $weekly->hari = $request->hari;
        $weekly->save();

        return redirect()->route('weekly.index')->with('success', 'Jadwal siaran weekly berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $weekly = Weekly::findOrFail($id);
        $weekly->delete();
        return redirect()->route('jadwal-siaran.index')->with('success', 'Jadwal siaran weekly berhasil dihapus.');
    }
}
