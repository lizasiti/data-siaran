<?php

namespace App\Http\Controllers;

use App\Models\Penyiar;
use Illuminate\Http\Request;
use App\Models\ShiftPenyiaran;
use App\Models\Siaran;
use Carbon\Carbon;
use PDF;

class ShiftPenyiaranController extends Controller
{
    // Menampilkan daftar shift penyiaran dengan fitur pencarian
    public function index(Request $request)
    {
        $search = $request->input('search');

        $shifts = ShiftPenyiaran::with('penyiar') // pastikan relasi dimuat
        ->when($search, function ($query, $search) {
            $query->whereHas('penyiar', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%");
            })->orWhere('hari', 'like', "%{$search}%")
                ->orWhere('jam_mulai', 'like', "%{$search}%")
                ->orWhere('jam_selesai', 'like', "%{$search}%")
                ->orWhere('naskah_siaran', 'like', "%{$search}%");
        })
            ->get();

// ambil semua data penyiar (bukan dari ShiftPenyiaran)
        $penyiars = Penyiar::all();
        return view('shifts.shift_penyiaran', compact('shifts', 'penyiars'));
    }

    // Menampilkan form tambah shift penyiaran
    public function create()
    {
        $penyiars = Penyiar::all();
        $siaran = Siaran::all();
//        dd($penyiars);
        return view('shifts.tambah', compact('penyiars', 'siaran'));
    }

    // Menyimpan shift baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'penyiar_id' => 'required|exists:penyiars,id',
            'hari' => 'required|string|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'naskah_siaran' => 'required|string|max:5000',
        ]);

        // Simpan ke database
        ShiftPenyiaran::create([
            'penyiar_id' => $request->penyiar_id,
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
        $penyiars = Penyiar::all();
        return view('shifts.edit', compact('shift', 'penyiars'));
    }

    // Menyimpan perubahan shift
    public function update(Request $request, $id)
    {
        $shift = ShiftPenyiaran::findOrFail($id);

        // Validasi input
        $validated_data = $request->validate([
            'penyiar_id' => 'required|exists:penyiars,id',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after_or_equal:jam_mulai',
            'naskah_siaran' => 'required|string',
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


    // export pdf
    public function exportPdf(Request $request)
    {
        // Ambil query dasar dan relasi penyiar
        $shifts = ShiftPenyiaran::with('penyiar');

        // Filter pencarian
        if ($request->has('search') && !empty($request->search)) {
            $shifts->where(function ($query) use ($request) {
                $query->whereHas('penyiar', function ($q) use ($request) {
                    $q->where('nama', 'like', '%' . $request->search . '%');
                })->orWhere('hari', 'like', '%' . $request->search . '%')
                    ->orWhere('naskah_siaran', 'like', '%' . $request->search . '%');
            });
        }

        // Filter berdasarkan hari (jika ada)
        if ($request->has('hari') && !empty($request->hari)) {
            $shifts->where('hari', $request->hari);
        }

        // Ambil hasil akhir
        $shifts = $shifts->orderBy('hari')->orderBy('jam_mulai')->get();

        $data = [
            'title' => 'Laporan Shift Penyiaran',
            'date' => date('d/m/Y'),
            'shifts' => $shifts,
            'filter' => [
                'search' => $request->search,
                'hari' => $request->hari
            ]
        ];

        $pdf = PDF::loadView('shifts.export_pdf', $data);
        return $pdf->download('shift_penyiaran_' . date('YmdHis') . '.pdf');
    }

}
