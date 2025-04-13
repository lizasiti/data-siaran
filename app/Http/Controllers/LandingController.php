<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Weekly;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $siaran = Jadwal::all();
        $week = Weekly::all();
        // data siaran yang sedang berlangsung
        $now = Carbon::now()->format('H:i');
        // dd($now);
        
        $program = Jadwal::where('jam_mulai', '<=', $now)->where('jam_selesai', '>=', $now)->first() ?? Weekly::where('jam_mulai', '<=', $now)->where('jam_selesai', '>=', $now)->first();
        // dd($program);
        return view('frontend.index', compact('week', 'siaran', 'program'));
    }

    public function jadwal_siaran()
    {
        $siaran = Jadwal::all();
        $week = Weekly::all();
        // morning programs
        $morning = Jadwal::where('jam_mulai', '<', '12:00')->get();
        // afternoon programs
        $afternoon =  Jadwal::whereBetween('jam_mulai', ['12:00', '18:00'])->get();
        // evening programs
        $evening = Jadwal::where('jam_mulai', '>=', '18:00')->get();


        $now = Carbon::now()->format('H:i');
        // dd($now);
        $langsung = Jadwal::where('jam_mulai', '<=', $now)->where('jam_selesai', '>=', $now)->first() ?? Weekly::where('jam_mulai', '<=', $now)->where('jam_selesai', '>=', $now)->first();

        return view('frontend.jadwal-siaran', compact('siaran', 'week', 'morning', 'afternoon', 'evening',  'langsung'));
    }
}
