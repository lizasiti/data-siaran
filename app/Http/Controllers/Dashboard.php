<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Penyiar;
use App\Models\Weekly;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $currentTime = Carbon::now()->format('H:i:s');
        $currentDay = Carbon::now()->dayOfWeek; // 0 (Sunday) to 6 (Saturday)

        $penyiarCount = Penyiar::count();
        $jadwalCount = Jadwal::count();
        $siaran = Jadwal::all();
        $week = Weekly::all();
        // dd($currentTime);
        return view('dashboard', compact('siaran', 'week','penyiarCount', 'jadwalCount'));
    }
    public function getProgressPercentage($program)
    {
        if (!$program) return 0;

        $start = Carbon::createFromFormat('H:i:s', $program->jam_mulai);
        $end = Carbon::createFromFormat('H:i:s', $program->jam_selesai);
        $now = Carbon::now();

        // Handle overnight programs
        if ($start->gt($end)) {
            $end->addDay();
            if ($now->lt($start)) {
                $now->addDay();
            }
        }

        $totalDuration = $end->diffInSeconds($start);
        $elapsed = $now->diffInSeconds($start);

        return min(100, max(0, ($elapsed / $totalDuration) * 100));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
