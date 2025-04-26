<?php

namespace App\Http\Controllers;

use App\Models\Siaran;
use Illuminate\Http\Request;
use App\Models\Penyiar;

class DataSiaran extends Controller
{
    /**
     * Menampilkan daftar siaran.
     */
    public function index()
    {
        $siaran = Siaran::all();
        $penyiars = Penyiar::all();
        return view('data_siaran', compact('siaran', 'penyiars'));
    }

    /**
     * Menyimpan data siaran baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'daypart' => 'required',
            'tanggal' => 'required|date',
            'penyiar_id' => 'required|exists:penyiars,id',
            'interaksi_pendengar' => 'required|string',
        ]);

        Siaran::create([
            'daypart' => $request->daypart,
            'tanggal' => $request->tanggal,
            'penyiar_id' => $request->penyiar_id,
            'interaksi_pendengar' => $request->interaksi_pendengar,
        ]);

        return redirect()->route('data_siaran.index')->with('success', 'Data Siaran Berhasil Ditambahkan!');
    }

    /**
     * Menampilkan data siaran yang akan diedit.
     */
    public function edit($id)
    {
        $siaran = Siaran::findOrFail($id);
        return response()->json($siaran);
    }

    /**
     * Memperbarui data siaran yang ada.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'daypart' => 'required',
            'tanggal' => 'required|date',
            'penyiar_id' => 'required|exists:penyiars,id',
            'interaksi_pendengar' => 'required|string',
        ]);

        $siaran = Siaran::findOrFail($id);
        $siaran->update([
            'daypart' => $request->daypart,
            'tanggal' => $request->tanggal,
            'penyiar_id' => $request->penyiar_id,
            'interaksi_pendengar' => $request->interaksi_pendengar,
        ]);

        return redirect()->route('data_siaran.index')->with('success', 'Data Siaran Berhasil Diperbarui!');
    }

    /**
     * Menghapus data siaran.
     */
    public function destroy($id)
    {
        $siaran = Siaran::findOrFail($id);
        $siaran->delete();

        return redirect()->route('data_siaran.index')->with('success', 'Data Siaran Berhasil Dihapus!');
    }
}
