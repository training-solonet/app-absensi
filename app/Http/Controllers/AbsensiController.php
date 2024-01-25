<?php

namespace App\Http\Controllers;
use App\Models\Absensi;
use App\Models\Student;
use App\Models\Uid;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $searchDate = $request->input('search_date', Carbon::now()->format('Y-m-d'));
        
        $absen = Absensi::whereDate('tanggal', $searchDate)->get();
        $uids = Uid::pluck('uid');
        $Students = Student::pluck('name');

        return view('absensi.index', compact('absen', 'searchDate', 'uids', 'Students'));
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
