<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('profile', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi field name & email
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:6', // password boleh kosong
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        // Jika password tidak kosong, baru hash dan update
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}
