<?php

namespace App\Http\Controllers;

use App\Models\Tiu;
use Illuminate\Http\Request;

class TiuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiuItems = Tiu::all();
        return view('tiu.index', compact('tiuItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tiu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_pendaftaran' => 'required|integer',
            // Tambahkan validasi untuk field lain jika diperlukan
        ]);

        Tiu::create($request->all());

        return redirect()->route('tiu.index')
                         ->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tiu = Tiu::findOrFail($id);
        return view('tiu.show', compact('tiu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tiu = Tiu::findOrFail($id);
        return view('tiu.edit', compact('tiu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_pendaftaran' => 'required|integer',
            // Tambahkan validasi untuk field lain jika diperlukan
        ]);

        $tiu = Tiu::findOrFail($id);
        $tiu->update($request->all());

        return redirect()->route('tiu.index')
                         ->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tiu = Tiu::findOrFail($id);
        $tiu->delete();

        return redirect()->route('tiu.index')
                         ->with('success', 'Data berhasil dihapus.');
    }

    public function showTestPage()
    {
        return view('tiu.test');
    }
}
