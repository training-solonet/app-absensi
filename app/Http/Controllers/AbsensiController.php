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

    $jurusan       = $request->input('search');

    $absen = Absensi::with(['students', 'students.majors'])
                ->whereBetween('tanggal', [$searchStartDate, $searchEndDate])
                ->get();

    $formattedStartDate = Carbon::parse($searchStartDate)->format('d-m-Y');
    $formattedEndDate = Carbon::parse($searchEndDate)->format('d-m-Y');

    $majors = Major::all();

    return view('absensi.index', compact('absen', 'searchStartDate', 'searchEndDate', 'formattedStartDate', 'formattedEndDate', 'majors','jurusan'));
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
    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);

        // Pastikan hanya absensi dengan keterangan 'Alfa' atau 'Terlambat' yang dapat diedit
        if ($absensi->keterangan !== 'Alfa' && $absensi->keterangan !== 'Terlambat') {
            return redirect()->back()->with('error', 'Keterangan tidak dapat diubah.');
        }

        return view('absensi.edit', compact('absensi'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'keterangan' => 'required|in:Sakit,Ijin,Teknisi,Hadir,Terlambat',
        ]);

        // Temukan absensi berdasarkan ID
        $absensi = Absensi::findOrFail($id);

        // Simpan perubahan keterangan absensi
        $absensi->keterangan = $request->keterangan;
        $absensi->save();

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back()->with('success', 'Keterangan berhasil diubah');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
