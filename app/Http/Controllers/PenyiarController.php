<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyiar;
use Illuminate\Support\Facades\Storage;

class PenyiarController extends Controller
{
    // Menampilkan daftar penyiar
    public function index()
    {
        $penyiar = Penyiar::all();
        return view('penyiar.index', compact('penyiar'));
    }

    // Menyimpan penyiar baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        // Simpan foto ke storage/app/public/penyiar
        $path = $request->file('foto')->store('penyiar', 'public');

        Penyiar::create([
            'nama' => $request->nama,
            'foto' => $path, // Simpan path foto
        ]);

        return redirect()->route('penyiar.index')->with('success', 'Penyiar berhasil ditambahkan!');
    }

    // Update penyiar
    public function update(Request $request, Penyiar $penyiar)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Foto opsional
        ]);

        // Jika ada foto baru, hapus yang lama dan simpan yang baru
        if ($request->hasFile('foto')) {
            if ($penyiar->foto) {
                Storage::disk('public')->delete($penyiar->foto);
            }
            $path = $request->file('foto')->store('penyiar', 'public');
            $penyiar->foto = $path;
        }

        $penyiar->nama = $request->nama;
        $penyiar->save();

        return redirect()->route('penyiar.index')->with('success', 'Penyiar berhasil diperbarui!');
    }

    // Menghapus penyiar
    public function destroy(Penyiar $penyiar)
    {
        if ($penyiar->foto) {
            Storage::disk('public')->delete($penyiar->foto);
        }

        $penyiar->delete();

        return redirect()->route('penyiar.index')->with('success', 'Penyiar berhasil dihapus!');
    }
    public function edit($id)
{
    $penyiar = Penyiar::findOrFail($id);
    return view('penyiar.edit', compact('penyiar'));
}
public function create()
{
    return view('penyiar.create'); // Pastikan view ini ada!
}
}
