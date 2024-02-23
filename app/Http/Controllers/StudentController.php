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
    public function index(Request $request)
    {
        $query = Student::where('status', 'Aktif')
            ->whereDate('date_in', '<=', now())
            ->whereDate('date_out', '>=', now());

        if ($request->has('search')) {
            $query->whereHas('majors', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->input('search') . '%');
            });
        }

        $students = $query->with('majors')->get();
        $majors = Major::all();
        $uids = Uid::whereNull('id_siswa')->get();

        return view('siswa.index', compact('students', 'majors', 'uids'));
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
         $student = Student::with(['majors', 'Uid', 'school'])->findOrFail($id);
 
         return view('siswa.edit', compact('student'));
     }
 
     public function update(Request $request, $id)
     {
         $student = Student::findOrFail($id);
         
         if ($student->Uid) {
             // Siswa sudah memiliki UID, jalankan fungsi update
             $uid = Uid::where('id_siswa', $id)->first();
             $uid->id_siswa = $request->input('id_siswa');
             $uid->save();
         } else {
             // Siswa belum memiliki UID, jalankan fungsi create
             $existingUid = Uid::where('uid', $request->input('uid'))->first();
 
             if ($existingUid) {
                 $existingUid->id_siswa = $id;
                 $existingUid->save();
             } else {
                 $uid = new Uid();
                 $uid->uid = $request->input('uid');
                 $uid->id_siswa = $id;
                 $uid->save();
             }
         }
 
         return redirect()->route('siswa.index')->with('success', 'UID berhasil diperbarui');
     }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
