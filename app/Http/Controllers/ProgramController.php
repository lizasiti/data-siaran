<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProgramController extends Controller
{
    public function index() {
        $programsPro2Today = Program::all(); // Ambil semua data program
        return view('programs.index', compact('programsPro2Today'));
    }

    public function store(Request $request) {
        // Validasi input
        $request->validate([
            'nama_program' => 'required|string',
            'waktu' => 'required|string',
            'deskripsi' => 'required|string',
        ]);
    
        // Simpan data ke database
        $program = new Program();
        $program->nama_program = $request->nama_program;
        $program->waktu = $request->waktu;
        $program->deskripsi = $request->deskripsi;
        $program->save();
    
        return redirect()->back()->with('success', 'Program berhasil ditambahkan!');
    }
}
