<?php

namespace App\Http\Controllers;

use App\Models\Riasec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function report()
    {


        // ==================================================================================================

        $result = [];

        $r =  array(1, 7, 14, 22, 30, 32, 37);
        $i =  array(2, 11, 18, 21, 26, 33, 39);
        $a =  array(3, 8, 17, 23, 27, 31, 41);
        $s =  array(4, 12, 13, 20, 28, 34, 40);
        $e =  array(5, 10, 16, 19, 29, 36, 42);
        $c =  array(6, 9, 15, 24, 25, 35, 38);

        $data =  DB::table('riasec')
         ->orderBy('id', 'desc')
            ->get();

        for ($d = 0; $d < count($data); $d++) {
            $p = $data[$d];

            //dump($data[$d]);
            $rs =  0;
            $is =  0;
            $as =  0;
            $ss =  0;
            $es =  0;
            $cs =  0;
            $desk = " ";

            // dump(($data[$d]->$a_string));
            for ($x = 0; $x <= (count($r) - 1); $x++) {

                $r_string = 'jawab' . $r[$x];
                if (($data[$d]->$r_string) == 1) {
                    $rs = $rs + 1;
                }
            }
            // dump("rs : " . $rs);
            $p->rs = $rs;

            for ($x = 0; $x <= (count($i) - 1); $x++) {
                $i_string = 'jawab' . $i[$x];
                if (($data[$d]->$i_string) == "1") {
                    $is = $is + 1;
                }
            }
            $p->is = $is;

            for ($ax = 0; $ax <= (count($a) - 1); $ax++) {
                $a_string = 'jawab' . $a[$ax];
                if (($data[$d]->$a_string) == "1") {
                    $as = $as + 1;
                }
            }

            $p->as = $as;


            for ($x = 0; $x <= (count($s) - 1); $x++) {
                $s_string = 'jawab' . $s[$x];
                if (($data[$d]->$s_string) == "1") {
                    $ss = $ss + 1;
                }
            }

            $p->ss = $ss;


            for ($x = 0; $x <= (count($e) - 1); $x++) {
                $e_string = 'jawab' . $e[$x];
                if (($data[$d]->$e_string) == "1") {
                    $es = $es + 1;
                }
            }

            $p->es = $es;


            for ($x = 0; $x <= (count($c) - 1); $x++) {
                $c_string = 'jawab' . $c[$x];
                if (($data[$d]->$c_string) == "1") {
                    $cs = $cs + 1;
                }
            }

            $p->cs = $cs;


            $ares = array(
                'r' => $rs,
                'i' => $is,
                'a' => $as,
                's' => $ss,
                'e' => $es,
                'c' => $cs,
            );

            $max = max($ares);

            //dump($rs);
            if ($rs == $max) {
                $desk = $desk . "individu dengan minat ini biasanya memiliki keahlian atletik atau mekanik dan menyukai kegiatan luar ruangan dengan peralatan atau mesin. Ex: mekanik, ATC (air traffic controller), surveyor, ahli elektronik dan petani.<br>";
            }

            //dump($is);
            if ($is == $max) {
                $desk = $desk . " Individu dengan minat ini biasanya memiliki keahlian sains dan matematika, menyukai kesendirian dalam pekerjaan maupun memecahkan masalah. Ex : ahli biologi,kimia, fisika, geologi, laboratorium dan penelitian termasuk teknisi medis.<br>";
            }

            //dump($as);
            if ($as == $max) {
                $desk = $desk . " Individu dengan minat ini biasanya memiliki keahlian seni, menyenangi pekerjaan orisinal dan memiliki imajinasi tinggi. 
            Ex : composer, musisi, pengarah panggung, penari, decorator,  aktor atau aktris dan penulis.<br>";
            }

            //dump($ss);
            if ($ss == $max) {
                $desk = $desk . " Individu dengan minat ini biasanya menyenangi keberadaan diri dalam sosial, tertarik bagaimana bergaul dengan situasi sosial dan suka membantu permasalahan orang lain. Ex : guru, terapis, pekerja religius, konselor, psikolog, perawat.<br>";
            }

            //dump($es);
            if ($es == $max) {
                $desk = $desk . " Individu dengan minat ini biasanya memiliki jiwa kepemimpinan, kemampuan berbicara di depan umum, tertarik dengan uang dan politik dan senang untuk mempengaruhi orang lain.<br>";
            }

            //dump($cs);
            if ($cs == $max) {
                $desk = $desk . " Individu dengan minat ini biasanya memiliki keahlian klerikal dan matematika, menyukai pekerjaan dalam ruang dan mengelola sesuatu agar rapi (terorganisir). Ex: analis keuangan, pegawai perpustakaan, banking, ahli pajak, sekretaris, korespondensi, akunting.<br>";
            }

            // dump($desk);

            $p->desk = $desk;
            array_push($result, $p);
        }

        // dd($result);


        //use -> untuk memumculkan field (fielsd bersifat object)
        //dump($result[0]->no_pendaftaran);

        return view('riasec.report', ['data' => $result]);
        // return response()->json(['status' => 'success', 'data' => $result, 'code' => 200]);
    }
}
