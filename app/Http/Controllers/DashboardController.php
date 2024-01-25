<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Student;
use App\Models\Uid;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil data absen untuk siswa yang terlambat
        $terlambat = Absensi::whereDate('tanggal', Carbon::today())
            ->where('keterangan', 'Terlambat')
            ->with('students')
            ->get();

        // Ambil data absen untuk siswa yang tidak hadir
        $alfa = Absensi::whereDate('tanggal', Carbon::today())
            ->where('keterangan', 'Alfa')
            ->with('students')
            ->get();

        // Ambil data absen untuk siswa yang hadir
        $hadir = Absensi::whereDate('tanggal', Carbon::today())
            ->where('keterangan', 'Hadir')
            ->with('students')
            ->get();

        return view('dashboard', compact('terlambat', 'alfa', 'hadir'));
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
