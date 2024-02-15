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

        // Tanggal yang ingin ditampilkan absennya
        $targetDate = Carbon::parse('2023-12-15')->toDateString();

        // $targetDate = Carbon::today();

        // Ambil data absen siswa yang terlambat dan alfa pada tanggal tertentu
        $terlambat = Absensi::with(['students'])
            ->where('tanggal', $targetDate)
            ->where('keterangan', 'Terlambat')
            ->get();

        $alfa = Absensi::with(['students'])
            ->where('tanggal', $targetDate)
            ->where('keterangan', 'Alfa')
            ->get();

        $hadir = Absensi::with(['students'])
            ->where('tanggal', $targetDate)
            ->where('keterangan', 'Hadir')
            ->get();

        $student = Student::all();

        return view('dashboard', compact('targetDate','terlambat', 'alfa', 'hadir' ,'student'));

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
