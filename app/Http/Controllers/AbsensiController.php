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
        // Ambil tanggal dari request, atau gunakan tanggal hari ini jika tidak ada
        $searchStartDate = $request->input('start_date', Carbon::now()->toDateString());
        $searchEndDate = $request->input('end_date', Carbon::now()->toDateString());

        // Ambil jurusan dari request
        $selectedMajor = $request->input('majors');

        // Filter data absensi berdasarkan rentang tanggal
        $absen = Absensi::with(['students', 'majors'])
            ->whereBetween('tanggal', [$searchStartDate, $searchEndDate])
            ->when($selectedMajor, function ($query) use ($selectedMajor) {
                

                // Filter berdasarkan jurusan jika dipilih
                $query->whereHas('majors', function ($subquery) use ($selectedMajor) {
                    $subquery->where('name', $selectedMajor);
                });
            })->get();

        // Format tanggal untuk menampilkan pada keterangan di atas tabel
        $formattedStartDate = Carbon::parse($searchStartDate)->format('d-m-Y');
        $formattedEndDate = Carbon::parse($searchEndDate)->format('d-m-Y');

        // Ambil semua nama siswa untuk dropdown pencarian
        $students = Student::pluck('name');

        // Ambil semua nama jurusan untuk dropdown pencarian
        $majors = Major::pluck('name');


        // Contoh filter berdasarkan kolom 'name' dengan nilai $jurusan
        // $majors = Major::all();

        // $selectedMajors = $request->input('major');
        // $filteredMajors = Major::where('name', $selectedMajors)->get();

        // $absen = Absensi::whereHas('majors', function ($query) use ($selectedMajors) {
        // $query->where('name', $selectedMajors);
        // })->get();
        
        // if($request->tanggal)
        //     $absen = Absensi::with(['students'])
        //     ->where('tanggal' > $request->date)
        //     ->get();
        //     else{
        //         $absen = Absensi::with(['students'])
        //     // ->where('tanggal', >, $request->date)
        //     ->get();
        //     }
        //     // return $absen;



        return view('absensi.index', compact('absen', 'searchStartDate', 'searchEndDate', 'formattedStartDate', 'formattedEndDate', 'students', 'majors', 'selectedMajor'));
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
