<?php

namespace App\Http\Controllers;
use App\Models\Absensi;
use App\Models\Student;
use App\Models\Uid;
use App\Models\Major;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        
    $searchStartDate = $request->input('start_date', Carbon::now()->toDateString());
    $searchEndDate = $request->input('end_date', Carbon::now()->toDateString());

    $query = Absensi::whereBetween('tanggal', [$searchStartDate, $searchEndDate]);

    if ($request->has('search')) {
        $query->whereHas('students', function ($query) use ($request) {
            $query->whereHas('majors', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->input('search') . '%');
            });
        });
    }

    $absen = $query->with(['students', 'majors'])->get();

    $formattedStartDate = Carbon::parse($searchStartDate)->format('d-m-Y');
    $formattedEndDate = Carbon::parse($searchEndDate)->format('d-m-Y');

    $majors = Major::all();

    return view('absensi.index', compact('absen', 'searchStartDate', 'searchEndDate', 'formattedStartDate', 'formattedEndDate', 'majors'));
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
