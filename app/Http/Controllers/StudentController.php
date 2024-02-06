<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Absensi;
use App\Models\Major;
use App\Models\School;
use App\Models\Uid;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function index(Request $request, $id)
    {
        $query = Student::where('status', 'Aktif')
            ->whereDate('date_in', '<=', now())
            ->whereDate('date_out', '>=', now());

        if ($request->has('search')) {
            $query->whereHas('majors', function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
            });
        }

        $Students = $query->with('majors')->get();
        $student = Student::with(['majors', 'Uid', 'school'])->findOrFail($id);
        $majors = Major::all();

        return view('siswa.index', compact('Students', 'majors', 'student'));
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
    public function show($id)
    {
        $student = Student::with(['majors', 'Uid', 'school'])->findOrFail($id);

        return view('siswa.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $students = Student::findOrFail($id);
        $uids = Uid::whereNull('id_siswa')->pluck('uid');

        return view('siswa.edit', compact('students', 'uids'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'uid' => 'required|unique:uids,uid,' . $id,
        ]);

        $students = Student::findOrFail($id);
        $students->update($request->all());

        return redirect()->route('siswa.show')->with('success', 'Data siswa berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
