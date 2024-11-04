<?php

namespace App\Http\Controllers;

use App\Models\Riasec;
use Illuminate\Http\Request;

class RiasecController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $riasecItems = Riasec::all();
        return view('riasec.index', compact('riasecItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('riasec.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_pendaftaran' => 'required|string|max:255',
        ]);

        $data = $request->only('no_pendaftaran');

        for ($i = 1; $i <= 42; $i++) {
            $data['jawab' . $i] = $request->input('jawab' . $i);
        }

        Riasec::create($data);

        return redirect()->route('riasec.index')->with('success', 'Data RIASEC berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Riasec $riasec)
    {
        return view('riasec.show', compact('riasec'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Riasec $riasec)
    {
        return view('riasec.edit', compact('riasec'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Riasec $riasec)
    {
        $request->validate([
            'no_pendaftaran' => 'required|string|max:255',
        ]);

        $data = $request->only('no_pendaftaran');

        for ($i = 1; $i <= 42; $i++) {
            $data['jawab' . $i] = $request->input('jawab' . $i);
        }

        $riasec->update($data);

        return redirect()->route('riasec.index')->with('success', 'Data RIASEC berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Riasec $riasec)
    {
        $riasec->delete();
        return redirect()->route('riasec.index')->with('success', 'Data RIASEC berhasil dihapus');
    }
}
