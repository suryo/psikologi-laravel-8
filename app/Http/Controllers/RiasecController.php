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

    public function showTestPage()
    {
        $questions = [
            ['label' => 'Saya Menyukai Hal Hal Yang Berkaitan Dengan Otomotif', 'value' => 1],
            ['label' => 'Saya menyukai teka - teki', 'value' => 1],
            ['label' => 'Saya bisa bekerja secara mandiri', 'value' => 1],
            ['label' => 'Saya suka bekerja dalam tim', 'value' => 1],
            ['label' => 'Saya orang yang ambisius. Saya menetapkan tujuan untuk diri saya sendiri', 'value' => 1],
            ['label' => 'Saya suka mengatur tugas-tugas saya (seperti mengefile, mengatur meja dan kantor)', 'value' => 1],
            ['label' => 'Saya suka merancang sesuatu', 'value' => 1],
            ['label' => 'Saya suka membaca hal-hal yang berkaitan dengan seni dan musik', 'value' => 1],
            ['label' => 'Saya suka mengikuti instruksi yang jelas', 'value' => 1],
            ['label' => 'Saya suka membujuk atau mempengaruhi orang lain', 'value' => 1],
            ['label' => 'Saya suka melakukan eksperimen', 'value' => 1],
            ['label' => 'Saya suka mengajar atau memberikan training kepada orang lain', 'value' => 1],
            ['label' => 'Saya suka membantu orang lain untuk memecahkan masalah mereka', 'value' => 1],
            ['label' => 'Saya suka merawat binatang', 'value' => 1],
            ['label' => 'Saya tidak keberatan untuk bekerja selama 8 jam setiap hari dikantor', 'value' => 1],
            ['label' => 'Saya suka menjual barang', 'value' => 1],
            ['label' => 'Saya suka menulis kreatif', 'value' => 1],
            ['label' => 'Saya menyukai hal-hal yang berhubungan dengan ilmu pengetahuan', 'value' => 1],
            ['label' => 'Saya cepat dalam mengambil tanggung jawab baru', 'value' => 1],
            ['label' => 'Saya menyukai hal-hal yang berkaitan dengan penyembuhan orang', 'value' => 1],
            ['label' => 'Saya tertarik untuk mencari tahu bagaimana cara kerja sesuatu', 'value' => 1],
            ['label' => 'Saya suka merakit dan merangkai sesuatu', 'value' => 1],
            ['label' => 'Saya orang yang kreatif', 'value' => 1],
            ['label' => 'Saya suka memperhatikan hal-hal detail', 'value' => 1],
            ['label' => 'Saya suka melakukan mengefile dokumen atau mengetik', 'value' => 1],
            ['label' => 'Saya suka menganalisis sesuatu (masalah / situasi)', 'value' => 1],
            ['label' => 'Saya suka memainkan alat musik atau bernyanyi', 'value' => 1],
            ['label' => 'Saya suka mempelajari budaya lain', 'value' => 1],
            ['label' => 'Saya ingin memulai bisnis (membuka usaha sendiri)', 'value' => 1],
            ['label' => 'Saya suka memasak', 'value' => 1],
            ['label' => 'Saya suka bermain akting dalam suatu drama', 'value' => 1],
            ['label' => 'Saya orang yang praktis', 'value' => 1],
            ['label' => 'Saya suka bekerja dengan angka atau grafik', 'value' => 1],
            ['label' => 'Saya suka mendiskusikan isu-isu', 'value' => 1],
            ['label' => 'Saya pandai menyimpan catatan yang berhubungan dengan pekerjaan saya', 'value' => 1],
            ['label' => 'Saya suka memimpin', 'value' => 1],
            ['label' => 'Saya suka bekerja di luar ruangan', 'value' => 1],
            ['label' => 'Saya suka bekerja di dalam ruangan', 'value' => 1],
            ['label' => 'Saya pandai matematika', 'value' => 1],
            ['label' => 'Saya suka menolong orang', 'value' => 1],
            ['label' => 'Saya suka menggambar', 'value' => 1],
            ['label' => 'Saya suka berpidato', 'value' => 1],
        ];
        return view('riasec.test', compact('questions'));
    }
}
