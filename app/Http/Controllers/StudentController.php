<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Absensi;
use App\Models\Uid;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function index()
    {
        $Students = Student::with(['uid'])->where('status', 'Aktif')
        ->whereDate('date_in', '<=', Carbon::now())
        ->whereDate('date_out', '>=', Carbon::now())
        ->get();

        return view('siswa.index', compact('Students'));
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
            $students = Student::findOrFail($id);
            $uids = Uid::all();
    
            return view('siswa.edit', compact('students', 'uids'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'uid' => 'required',
            // tambahkan validasi lain sesuai kebutuhan
        ]);

        $students = Student::findOrFail($id);
        $students->update($request->all());

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
