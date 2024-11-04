<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Papi;

class PapiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $papiItems = Papi::all();
        return view('papi.index', compact('papiItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('papi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_pendaftaran' => 'required|string',
            // Validasi tambahan sesuai kebutuhan
        ]);

        $papi = new Papi();
        $papi->no_pendaftaran = $request->no_pendaftaran;

        for ($i = 1; $i <= 90; $i++) {
            $field = 'jwb' . $i;
            $papi->$field = $request->input($field);
        }

        $papi->save();

        return redirect()->route('papi.index')->with('success', 'Data PAPI berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $papi = Papi::findOrFail($id);
        return view('papi.show', compact('papi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $papi = Papi::findOrFail($id);
        return view('papi.edit', compact('papi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_pendaftaran' => 'required|string',
            // Validasi tambahan sesuai kebutuhan
        ]);

        $papi = Papi::findOrFail($id);
        $papi->no_pendaftaran = $request->no_pendaftaran;

        for ($i = 1; $i <= 90; $i++) {
            $field = 'jwb' . $i;
            $papi->$field = $request->input($field);
        }

        $papi->save();

        return redirect()->route('papi.index')->with('success', 'Data PAPI berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $papi = Papi::findOrFail($id);
        $papi->delete();

        return redirect()->route('papi.index')->with('success', 'Data PAPI berhasil dihapus');
    }
}
