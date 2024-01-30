<?php

namespace App\Http\Controllers;

use App\Models\Uid;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class UidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uids = Uid::all();
        return view('uid.index', compact('uids'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('uid.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'uid' => 'required',
        ]);

        Uid::create($request->all());

        return redirect()->route('uid.index')->with('success', 'Uid created successfully.');
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
    public function edit(Uid $uid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Uid $uid)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($uid)
    {
        $uidData = Uid::where('uid', $uid)->firstOrFail();
        $uidData->delete();

        return redirect()->route('uid.index')->with('success', 'UID berhasil dihapus');
    }
}
