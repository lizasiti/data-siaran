<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShiftPenyiaran;

class ShiftPenyiaranController extends Controller
{
    // Menampilkan daftar shift penyiaran dengan fitur pencarian
    public function index(Request $request)
    {
        $search = $request->input('search');

        $shifts = ShiftPenyiaran::when($search, function ($query, $search) {
            return $query->where('nama_penyiar', 'like', "%{$search}%");
        })->get();

        return view('shifts.shift_penyiaran', compact('shifts'));
    }

    // Menampilkan form tambah shift penyiaran
    public function create()
    {
        return view('shifts.tambah');
    }

    // Menyimpan shift baru ke database
    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'nama_penyiar' => 'required|string|max:255',
        'hari' => 'required|string|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
        'jam_mulai' => 'required|',
        'jam_selesai' => 'required|after:jam_mulai',
        'naskah_siaran' => 'required|string|max:5000',
    ]);

    // Simpan ke database
    ShiftPenyiaran::create([
        'nama_penyiar' => $request->nama_penyiar,
        'hari' => $request->hari,
        'jam_mulai' => $request->jam_mulai,
        'jam_selesai' => $request->jam_selesai,
        'naskah_siaran' => $request->naskah_siaran, // Sesuai dengan database
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('shift_penyiaran.index')->with('success', 'Shift berhasil ditambahkan.');
}


    // Menampilkan form edit shift
    public function edit($id)
    {
        $shift = ShiftPenyiaran::findOrFail($id);
        return view('shifts.edit', compact('shift'));
    }

    // Menyimpan perubahan shift
    public function update(Request $request, $id)
    {
        $shift = ShiftPenyiaran::findOrFail($id);

        // Validasi input
        $validated_data = $request->validate([
            'nama_penyiar' => 'required|string|max:255',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after_or_equal:jam_mulai',
            'naskah_siaran' => 'required|string', // Tambah validasi untuk isi berita
        ]);

        // Update data
        $shift->update($validated_data);

        return redirect()->route('shift_penyiaran.index')->with('success', 'Shift berhasil diperbarui.');
    }

    // Menghapus shift penyiaran
    public function destroy($id)
    {
        $shift = ShiftPenyiaran::findOrFail($id);
        $shift->delete();

        return redirect()->route('shift_penyiaran.index')->with('success', 'Shift berhasil dihapus.');
    }

    // Menampilkan rekap shift dengan filter pencarian hari
    public function rekap(Request $request)
    {
        $query = ShiftPenyiaran::query();

        if ($request->filled('hari')) {
            $query->where('hari', $request->hari);
        }

        $shifts = $query->get(); // ✅ Pastikan `get()` dipanggil agar menjadi koleksi

        return view('shifts.rekap', compact('shifts'));
    }

    // Menampilkan rekap shift berdasarkan hari Senin-Minggu
    public function rekapShift(Request $request)
{
    $query = ShiftPenyiaran::orderByRaw("FIELD(hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu')");

    if ($request->filled('hari')) {
        $query->where('hari', $request->hari);
    }

    $shifts = $query->get(); // ✅ Pastikan `get()` dipanggil agar menjadi koleksi

    return view('shifts.rekap', compact('shifts'));
}
}
