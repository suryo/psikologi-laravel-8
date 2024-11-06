<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Papi;
use Illuminate\Support\Facades\DB;

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

    public function showTestPage()
    {
        $questions = [
            [
                ['value' => 0, 'label' => 'Saya seorang pekerja keras'],
                ['value' => 1, 'label' => 'saya bukan seorang pemurung'],
            ],
            [
                ['value' => 0, 'label' => 'Saya suka bekerja lebih baik dari yang lain'],
                ['value' => 1, 'label' => 'Saya suka menekuni pekerjaan yang saya lakukan sampai selesai'],
            ],
            [
                ['value' => 0, 'label' => 'saya suka memberi petunjuk kepada orang bagaimana melakukan sesuatu'],
                ['value' => 1, 'label' => 'Saya ingin berbuat semaksimal mungkin'],
            ],

            [
                ['value' => 0, 'label' => 'saya suka melakukan hal-hal yang lucu'],
                ['value' => 1, 'label' => 'Saya suka memberitahukan orang apa yang harus dikerjakan'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya suka bergabung dalam kelompok'],
                ['value' => 1, 'label' => 'saya suka Jika diperhatikan oleh kelompok'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya suka membuat teman pribadi yang dekat'],
                ['value' => 1, 'label' => 'saya suka Jika diperhatikan oleh kelompok'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya cepat berubah jika saya diperlukan'],
                ['value' => 1, 'label' => 'Saya berusaha membuat teman-teman pribadi yang dekat'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya suka membalas jika saya disakiti'],
                ['value' => 1, 'label' => 'Saya suka melakukan hal-hal yang baru dan berbeda'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya ingin agar atasan menyukai saya'],
                ['value' => 1, 'label' => 'saya suka memberitahu orang jika mereka salah'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya suka mengikuti petunjuk-petunjuk yang diberikan kepada saya'],
                ['value' => 1, 'label' => 'Saya suka mendukung pendapat atasan saya'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya berusaha sangat keras'],
                ['value' => 1, 'label' => 'Saya seorang yang teratur titik Saya menaruh semua barang pada tempatnya'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya dapat membuat orang melakukan apa yang saya inginkan'],
                ['value' => 1, 'label' => 'saya tidak mudah marah'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya suka memberitahukan kepada kelompok apa yang harus mereka kerjakan'],
                ['value' => 1, 'label' => 'saya selalu menekuni suatu pekerjaan sampai selesai'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya ingin tampil menarik dan mendebarkan'],
                ['value' => 1, 'label' => 'saya ingin menjadi orang yang sangat berhasil'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya ingin sesuai dan diterima dalam kelompok'],
                ['value' => 1, 'label' => 'Saya suka membantu orang dalam mengambil keputusan'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya cemas bila seseorang tidak menyukai saya'],
                ['value' => 1, 'label' => 'Saya suka orang memperhatikan saya'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya suka mencoba hal-hal baru'],
                ['value' => 1, 'label' => 'saya lebih suka bekerja bersama orang lain daripada sendirian'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya kadang-kadang menyalahkan orang lain jika terjadi kesalahan'],
                ['value' => 1, 'label' => 'saya merasa terganggu Jika ada yang tidak menyukai saya'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya suka mendukung pendapat atasan saya'],
                ['value' => 1, 'label' => 'saya Suka mencoba pekerjaan-pekerjaan yang baru dan berbeda'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya menyukai petunjuk-petunjuk terperinci dalam menyelesaikan pekerjaan'],
                ['value' => 1, 'label' => 'bila saya terganggu oleh siapapun, saya akan memberitahukannya'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya suka melaksanakan tugas setiap langkah dengan hati-hati'],
                ['value' => 1, 'label' => 'saya selalu berusaha keras'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya benar-benar pemimpin yang baik'],
                ['value' => 1, 'label' => 'saya dapat mengorganisir suatu pekerjaan dengan baik'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya mudah tersinggung'],
                ['value' => 1, 'label' => 'saya lamban mengambil keputusan'],
              ],
              
              [
                ['value' => 0, 'label' => 'bila saya berada dalam satu kelompok saya suka berdiam diri'],
                ['value' => 1, 'label' => 'saya suka mengerjakan beberapa pekerjaan sekaligus'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya sangat suka bila saya diundang'],
                ['value' => 1, 'label' => 'Saya ingin lebih baik dari yang lain dalam mengerjakan sesuatu'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya suka membuat teman-teman pribadi yang dekat'],
                ['value' => 1, 'label' => 'saya suka  menasehati orang lain'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya suka melakukan hal-hal baru dan berbeda'],
                ['value' => 1, 'label' => 'Saya suka menceritakan bagaimana saya berhasil dalam melakukan sesuatu'],
              ],
              
              [
                ['value' => 0, 'label' => 'bila saya betul, saya suka mempertahankannya.'],
                ['value' => 1, 'label' => 'saya suka ingin diterima dan diakui dalam suatu kelompok'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya menghindar menjadi orang yang berbeda'],
                ['value' => 1, 'label' => 'Saya berusaha menjadi sangat dekat dengan orang'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya senang memberitahukan bagaimana melakukan sesuatu pekerjaan'],
                ['value' => 1, 'label' => 'saya mudah bosan'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya bekerja keras'],
                ['value' => 1, 'label' => 'saya banyak berpikir dan merencana '],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya memimpin kelompok'],
                ['value' => 1, 'label' => 'detail (hal-hal kecil) menarik bagi saya'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya dapat mengambil keputusan secara mudah dan tepat'],
                ['value' => 1, 'label' => 'saya menyimpan barang-barang saya secara rapi dan teratur'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya cepat dalam melaksanakan suatu pekerjaan'],
                ['value' => 1, 'label' => 'saya tidak sering marah atau sedih'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya ingin menjadi bagian dari kelompok'],
                ['value' => 1, 'label' => 'saya hanya ingin melakukan satu pekerjaan pada satu saat'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya berusaha membuat teman dekat'],
                ['value' => 1, 'label' => 'Saya berusaha keras menjadi yang terbaik'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya suka mode terbaru untuk pakaian atau mobil'],
                ['value' => 1, 'label' => 'saya suka bertanggung jawab untuk kepentingan orang lain'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya  menyukai perdebatan'],
                ['value' => 1, 'label' => 'Saya suka mendapatkan perhatian'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya suka mendukung orang-orang yang menjadi atasan saya'],
                ['value' => 1, 'label' => 'Saya tertarik menjadi bagian dari kelompok'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya suka mengikuti peraturan dengan hati-hati'],
                ['value' => 1, 'label' => 'saya suka orang mengenal saya dengan baik'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya benar-benar bekerja keras'],
                ['value' => 1, 'label' => 'Saya mempunyai sifat bersahabat'],
              ],
              
              [
                ['value' => 0, 'label' => 'orang berpendapat bahwa saya benar-benar seorang pemimpin yang baik'],
                ['value' => 1, 'label' => 'saya berpikir panjang dan berhati-hati'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya sering mengambil kesempatan'],
                ['value' => 1, 'label' => 'saya senang mengurus hal-hal kecil'],
              ],
              
              [
                ['value' => 0, 'label' => 'orang berpendapat bahwa saya bekerja cepat'],
                ['value' => 1, 'label' => 'orang berpendapat bahwa saya rapi dan teratur'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya senang berolahraga'],
                ['value' => 1, 'label' => 'Saya mempunyai pribadi yang menyenangkan'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya senang jika orang dekat dan bersahabat dengan saya'],
                ['value' => 1, 'label' => 'Saya selalu berusaha untuk menyelesaikan sesuatu yang telah saya mulai'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya senang bereksperimen dan mencoba hal-hal baru'],
                ['value' => 1, 'label' => 'saya suka melaksanakan suatu pekerjaan sulit dengan baik'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya suka diperlakukan secara adil'],
                ['value' => 1, 'label' => 'Saya suka memberitahu orang lain bagaimana melaksanakan sesuatu'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya suka melakukan apa yang diharapkan dari saya'],
                ['value' => 1, 'label' => 'saya suka memperoleh perhatian'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya suka petunjuk-petunjuk terperinci dalam melaksanakan suatu pekerjaan'],
                ['value' => 1, 'label' => 'saya suka berada diantara orang-orang banyak'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya selalu Berusaha menyelesaikan pekerjaan secara sempurna'],
                ['value' => 1, 'label' => 'orang Mengatakan bahwa saya tidak mengenal lelah'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya tipe pemimpin'],
                ['value' => 1, 'label' => 'saya mudah berteman'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya selalu berspekulasi'],
                ['value' => 1, 'label' => 'saya banyak sekali berpikir'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya bekerja dengan kecepatan yang teratur'],
                ['value' => 1, 'label' => 'Saya senang bekerja dengan hal-hal kecil atau terperinci'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya mempunyai banyak tenaga untuk berolahraga'],
                ['value' => 1, 'label' => 'saya menyimpan barang-barang saya secara rapi dan teratur'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya dapat bergaul dengan baik terhadap semua orang'],
                ['value' => 1, 'label' => 'saya seorang yang mempunyai pembawaan yang tenang (even tempered)'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya ingin bertemu dengan orang-orang baru dan melakukan hal yang baru'],
                ['value' => 1, 'label' => 'saya selalu ingin menyelesaikan pekerjaan yang telah saya mulai'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya biasanya mempertahankan pendapat yang saya yakini'],
                ['value' => 1, 'label' => 'Saya biasanya suka bekerja keras'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya suka saran-saran dari orang-orang yang saya kagumi'],
                ['value' => 1, 'label' => 'Saya suka melayani orang-orang yang berwenang terhadap saya'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya biarkan diri saya banyak dipengaruhi oleh orang lain'],
                ['value' => 1, 'label' => 'Saya suka jika mendapat banyak perhatian'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya berusaha bekerja keras'],
                ['value' => 1, 'label' => 'Saya mengerjakan sesuatu dengan cepat'],
              ],
              
              [
                ['value' => 0, 'label' => 'apabila saya bicara, kelompok mendengarkan'],
                ['value' => 1, 'label' => 'saya terampil dengan perkakas (alat-alat)'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya lambat dalam mendapatkan teman'],
                ['value' => 1, 'label' => 'saya lambat dalam mengambil keputusan'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya biasanya makan secara cepat'],
                ['value' => 1, 'label' => 'Saya suka membaca'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya suka pekerjaan dimana saya banyak bergerak'],
                ['value' => 1, 'label' => 'Saya suka pekerjaan yang harus dilaksanakan secara hati-hati'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya membuat sebanyak mungkin teman'],
                ['value' => 1, 'label' => 'apa yang telah saya simpan, akan mudah saya temukan kembali'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya merencanakan jauh-jauh sebelumnya'],
                ['value' => 1, 'label' => 'saya selalu menyenangkan'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya mempertahan Dengan bangga nama baik saya'],
                ['value' => 1, 'label' => 'saya terus menekuni suatu masalah sampai selesai'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya suka mendukung orang-orang yang saya kagumi'],
                ['value' => 1, 'label' => 'Saya ingin sukses'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya suka orang lain yang membuat keputusan-keputusan untuk kelompok'],
                ['value' => 1, 'label' => 'saya suka membuat keputusan-keputusan untuk kelompok'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya selaku berusaha bekerja keras'],
                ['value' => 1, 'label' => 'saya mengambil keputusan secara cepat dan mudah'],
              ],
              
              [
                ['value' => 0, 'label' => 'kelompok biasanya melakukan apa yang saya inginkan'],
                ['value' => 1, 'label' => 'saya biasanya terburu-buru'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya sering merasa lelah'],
                ['value' => 1, 'label' => 'Saya lambat menentukan sikap'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya bekerja cepat'],
                ['value' => 1, 'label' => 'saya mudah berteman'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya biasanya mempunyai Gairah dan tenaga'],
                ['value' => 1, 'label' => 'saya banyak menghabiskan waktu dengan berpikir'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya sangat ramah terhadap orang'],
                ['value' => 1, 'label' => 'Saya suka dengan pekerjaan yang memerlukan ketelitian'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya banyak berpikir dan merencana'],
                ['value' => 1, 'label' => 'saya menyimpan segala sesuatu pada tempatnya'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya suka pekerjaan yang menuntut hal-hal terperinci'],
                ['value' => 1, 'label' => 'Saya tidak mudah marah'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya suka mengikuti orang yang saya kagumi'],
                ['value' => 1, 'label' => 'saya selalu menyelesaikan pekerjaan yang telah saya mulai'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya suka petunjuk yang jelas'],
                ['value' => 1, 'label' => 'Saya suka bekerja keras'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya mengejar apa yang saya inginkan'],
                ['value' => 1, 'label' => 'saya seorang pemimpin yang baik'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya dapat membuat orang lain bekerja sesuai dengan yang saya inginkan'],
                ['value' => 1, 'label' => 'saya seorang yang bertipe santai tapi beruntung'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya mengambil keputusan secara tepat'],
                ['value' => 1, 'label' => 'Saya ingin berbuat semaksimal mungkin'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya biasanya bekerja cepat'],
                ['value' => 1, 'label' => 'Saya suka berolahraga secara teratur'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya tidak suka bertemu orang'],
                ['value' => 1, 'label' => 'saya cepat merasa lelah'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya membuat banyak sekali teman'],
                ['value' => 1, 'label' => 'saya banyak menghabiskan waktu dengan berpikir'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya suka bekerja dengan teori'],
                ['value' => 1, 'label' => 'Saya suka bekerja dengan hal-hal terperinci'],
              ],
              
              [
                ['value' => 0, 'label' => 'saya dapat menikmati hal-hal atau pekerjaan yang terperinci'],
                ['value' => 1, 'label' => 'Saya suka mengorganisir pekerjaan saya'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya menaruh barang pada tempatnya'],
                ['value' => 1, 'label' => 'Saya selalu menyenangkan'],
              ],
              
              [
                ['value' => 0, 'label' => 'Saya suka diberitahu tentang apa yang saya perlu lakukan'],
                ['value' => 1, 'label' => 'saya harus menyelesaikan apa yang saya mulai'],
              ],

            ];


        
        return view('papi.test', compact('questions'));
    }

    public function report()
    {
        $result = [];
      
        $data =  DB::table('papi')
         ->orderBy('id', 'desc')
            ->get();
        // dd($data);
        for ($d = 0; $d < count($data); $d++) {
            $p = $data[$d];
            //dump($p);
            // dump(gettype($p));
            $p->gresult = 0;
            $p->lresult = 0;
            $p->iresult = 0;
            $p->tresult = 0;
            $p->vresult = 0;
            $p->sresult = 0;
            $p->rresult = 0;
            $p->dresult = 0;
            $p->cresult = 0;
            $p->eresult = 0;
            $p->wresult = 0;
            $p->fresult = 0;
            $p->kresult = 0;
            $p->zresult = 0;
            $p->oresult = 0;
            $p->bresult = 0;
            $p->xresult = 0;
            $p->presult = 0;
            $p->aresult = 0;
            $p->nresult = 0;

            $p->ganalisis = '';
            $p->lanalisis = '';
            $p->ianalisis = '';
            $p->tanalisis = '';
            $p->vanalisis = '';
            $p->sanalisis = '';
            $p->ranalisis = '';
            $p->danalisis = '';
            $p->canalisis = '';
            $p->eanalisis = '';
            $p->wanalisis = '';
            $p->fanalisis = '';
            $p->kanalisis = '';
            $p->zanalisis = '';
            $p->oanalisis = '';
            $p->banalisis = '';
            $p->xanalisis = '';
            $p->panalisis = '';
            $p->aanalisis = '';
            $p->nanalisis = '';

            if ($p->jwb1 == 0) {
                $p->gresult = $p->gresult + 1;
            } else {
                $p->gresult = $p->gresult + 0;
            }
            if ($p->jwb11 == 0) {
                $p->gresult = $p->gresult + 1;
            } else {
                $p->gresult = $p->gresult + 0;
            }
            if ($p->jwb21 == 0) {
                $p->gresult = $p->gresult + 1;
            } else {
                $p->gresult = $p->gresult + 0;
            }
            if ($p->jwb31 == 0) {
                $p->gresult = $p->gresult + 1;
            } else {
                $p->gresult = $p->gresult + 0;
            }
            if ($p->jwb41 == 0) {
                $p->gresult = $p->gresult + 1;
            } else {
                $p->gresult = $p->gresult + 0;
            }
            if ($p->jwb51 == 0) {
                $p->gresult = $p->gresult + 1;
            } else {
                $p->gresult = $p->gresult + 0;
            }
            if ($p->jwb61 == 0) {
                $p->gresult = $p->gresult + 1;
            } else {
                $p->gresult = $p->gresult + 0;
            }
            if ($p->jwb71 == 0) {
                $p->gresult = $p->gresult + 1;
            } else {
                $p->gresult = $p->gresult + 0;
            }
            if ($p->jwb81 == 0) {
                $p->gresult = $p->gresult + 1;
            } else {
                $p->gresult = $p->gresult + 0;
            }

            if ($p->jwb12 == 0) {
                $p->lresult = $p->lresult + 1;
            } else {
                $p->lresult = $p->lresult + 0;
            }
            if ($p->jwb22 == 0) {
                $p->lresult = $p->lresult + 1;
            } else {
                $p->lresult = $p->lresult + 0;
            }
            if ($p->jwb32 == 0) {
                $p->lresult = $p->lresult + 1;
            } else {
                $p->lresult = $p->lresult + 0;
            }
            if ($p->jwb42 == 0) {
                $p->lresult = $p->lresult + 1;
            } else {
                $p->lresult = $p->lresult + 0;
            }
            if ($p->jwb52 == 0) {
                $p->lresult = $p->lresult + 1;
            } else {
                $p->lresult = $p->lresult + 0;
            }
            if ($p->jwb62 == 0) {
                $p->lresult = $p->lresult + 1;
            } else {
                $p->lresult = $p->lresult + 0;
            }
            if ($p->jwb72 == 0) {
                $p->lresult = $p->lresult + 1;
            } else {
                $p->lresult = $p->lresult + 0;
            }
            if ($p->jwb82 == 0) {
                $p->lresult = $p->lresult + 1;
            } else {
                $p->lresult = $p->lresult + 0;
            }
            if ($p->jwb81 == 1) {
                $p->lresult = $p->lresult + 1;
            } else {
                $p->lresult = $p->lresult + 0;
            }

            if ($p->jwb23 == 0) {
                $p->iresult = $p->iresult + 1;
            } else {
                $p->iresult = $p->iresult + 0;
            }
            if ($p->jwb33 == 0) {
                $p->iresult = $p->iresult + 1;
            } else {
                $p->iresult = $p->iresult + 0;
            }
            if ($p->jwb43 == 0) {
                $p->iresult = $p->iresult + 1;
            } else {
                $p->iresult = $p->iresult + 0;
            }
            if ($p->jwb53 == 0) {
                $p->iresult = $p->iresult + 1;
            } else {
                $p->iresult = $p->iresult + 0;
            }
            if ($p->jwb63 == 0) {
                $p->iresult = $p->iresult + 1;
            } else {
                $p->iresult = $p->iresult + 0;
            }
            if ($p->jwb73 == 0) {
                $p->iresult = $p->iresult + 1;
            } else {
                $p->iresult = $p->iresult + 0;
            }
            if ($p->jwb83 == 0) {
                $p->iresult = $p->iresult + 1;
            } else {
                $p->iresult = $p->iresult + 0;
            }
            if ($p->jwb82 == 1) {
                $p->iresult = $p->iresult + 1;
            } else {
                $p->iresult = $p->iresult + 0;
            }
            if ($p->jwb71 == 1) {
                $p->iresult = $p->iresult + 1;
            } else {
                $p->iresult = $p->iresult + 0;
            }

            if ($p->jwb34 == 0) {
                $p->tresult = $p->tresult + 1;
            } else {
                $p->tresult = $p->tresult + 0;
            }
            if ($p->jwb44 == 0) {
                $p->tresult = $p->tresult + 1;
            } else {
                $p->tresult = $p->tresult + 0;
            }
            if ($p->jwb54 == 0) {
                $p->tresult = $p->tresult + 1;
            } else {
                $p->tresult = $p->tresult + 0;
            }
            if ($p->jwb64 == 0) {
                $p->tresult = $p->tresult + 1;
            } else {
                $p->tresult = $p->tresult + 0;
            }
            if ($p->jwb74 == 0) {
                $p->tresult = $p->tresult + 1;
            } else {
                $p->tresult = $p->tresult + 0;
            }
            if ($p->jwb84 == 0) {
                $p->tresult = $p->tresult + 1;
            } else {
                $p->tresult = $p->tresult + 0;
            }
            if ($p->jwb83 == 1) {
                $p->tresult = $p->tresult + 1;
            } else {
                $p->tresult = $p->tresult + 0;
            }
            if ($p->jwb72 == 1) {
                $p->tresult = $p->tresult + 1;
            } else {
                $p->tresult = $p->tresult + 0;
            }
            if ($p->jwb61 == 1) {
                $p->tresult = $p->tresult + 1;
            } else {
                $p->tresult = $p->tresult + 0;
            }

            if ($p->jwb45 == 0) {
                $p->vresult = $p->vresult + 1;
            } else {
                $p->vresult = $p->vresult + 0;
            }
            if ($p->jwb55 == 0) {
                $p->vresult = $p->vresult + 1;
            } else {
                $p->vresult = $p->vresult + 0;
            }
            if ($p->jwb65 == 0) {
                $p->vresult = $p->vresult + 1;
            } else {
                $p->vresult = $p->vresult + 0;
            }
            if ($p->jwb75 == 0) {
                $p->vresult = $p->vresult + 1;
            } else {
                $p->vresult = $p->vresult + 0;
            }
            if ($p->jwb85 == 0) {
                $p->vresult = $p->vresult + 1;
            } else {
                $p->vresult = $p->vresult + 0;
            }
            if ($p->jwb84 == 1) {
                $p->vresult = $p->vresult + 1;
            } else {
                $p->vresult = $p->vresult + 0;
            }
            if ($p->jwb73 == 1) {
                $p->vresult = $p->vresult + 1;
            } else {
                $p->vresult = $p->vresult + 0;
            }
            if ($p->jwb62 == 1) {
                $p->vresult = $p->vresult + 1;
            } else {
                $p->vresult = $p->vresult + 0;
            }
            if ($p->jwb51 == 1) {
                $p->vresult = $p->vresult + 1;
            } else {
                $p->vresult = $p->vresult + 0;
            }


            if ($p->jwb56 == 0) {
                $p->sresult = $p->sresult + 1;
            } else {
                $p->sresult = $p->sresult + 0;
            }
            if ($p->jwb66 == 0) {
                $p->sresult = $p->sresult + 1;
            } else {
                $p->sresult = $p->sresult + 0;
            }
            if ($p->jwb76 == 0) {
                $p->sresult = $p->sresult + 1;
            } else {
                $p->sresult = $p->sresult + 0;
            }
            if ($p->jwb86 == 0) {
                $p->sresult = $p->sresult + 1;
            } else {
                $p->sresult = $p->sresult + 0;
            }
            if ($p->jwb85 == 1) {
                $p->sresult = $p->sresult + 1;
            } else {
                $p->sresult = $p->sresult + 0;
            }
            if ($p->jwb74 == 1) {
                $p->sresult = $p->sresult + 1;
            } else {
                $p->sresult = $p->sresult + 0;
            }
            if ($p->jwb63 == 1) {
                $p->sresult = $p->sresult + 1;
            } else {
                $p->sresult = $p->sresult + 0;
            }
            if ($p->jwb52 == 1) {
                $p->sresult = $p->sresult + 1;
            } else {
                $p->sresult = $p->sresult + 0;
            }
            if ($p->jwb41 == 1) {
                $p->sresult = $p->sresult + 1;
            } else {
                $p->sresult = $p->sresult + 0;
            }


            if ($p->jwb67 == 0) {
                $p->rresult = $p->rresult + 1;
            } else {
                $p->rresult = $p->rresult + 0;
            }
            if ($p->jwb77 == 0) {
                $p->rresult = $p->rresult + 1;
            } else {
                $p->rresult = $p->rresult + 0;
            }
            if ($p->jwb87 == 0) {
                $p->rresult = $p->rresult + 1;
            } else {
                $p->rresult = $p->rresult + 0;
            }
            if ($p->jwb86 == 1) {
                $p->rresult = $p->rresult + 1;
            } else {
                $p->rresult = $p->rresult + 0;
            }
            if ($p->jwb75 == 1) {
                $p->rresult = $p->rresult + 1;
            } else {
                $p->rresult = $p->rresult + 0;
            }
            if ($p->jwb64 == 1) {
                $p->rresult = $p->rresult + 1;
            } else {
                $p->rresult = $p->rresult + 0;
            }
            if ($p->jwb53 == 1) {
                $p->rresult = $p->rresult + 1;
            } else {
                $p->rresult = $p->rresult + 0;
            }
            if ($p->jwb42 == 1) {
                $p->rresult = $p->rresult + 1;
            } else {
                $p->rresult = $p->rresult + 0;
            }
            if ($p->jwb31 == 1) {
                $p->rresult = $p->rresult + 1;
            } else {
                $p->rresult = $p->rresult + 0;
            }

            if ($p->jwb78 == 0) {
                $p->dresult = $p->dresult + 1;
            } else {
                $p->dresult = $p->dresult + 0;
            }
            if ($p->jwb88 == 0) {
                $p->dresult = $p->dresult + 1;
            } else {
                $p->dresult = $p->dresult + 0;
            }
            if ($p->jwb87 == 1) {
                $p->dresult = $p->dresult + 1;
            } else {
                $p->dresult = $p->dresult + 0;
            }
            if ($p->jwb76 == 1) {
                $p->dresult = $p->dresult + 1;
            } else {
                $p->dresult = $p->dresult + 0;
            }
            if ($p->jwb65 == 1) {
                $p->dresult = $p->dresult + 1;
            } else {
                $p->dresult = $p->dresult + 0;
            }
            if ($p->jwb54 == 1) {
                $p->dresult = $p->dresult + 1;
            } else {
                $p->dresult = $p->dresult + 0;
            }
            if ($p->jwb43 == 1) {
                $p->dresult = $p->dresult + 1;
            } else {
                $p->dresult = $p->dresult + 0;
            }
            if ($p->jwb32 == 1) {
                $p->dresult = $p->dresult + 1;
            } else {
                $p->dresult = $p->dresult + 0;
            }
            if ($p->jwb21 == 1) {
                $p->dresult = $p->dresult + 1;
            } else {
                $p->dresult = $p->dresult + 0;
            }

            if ($p->jwb89 == 0) {
                $p->cresult = $p->cresult + 1;
            } else {
                $p->cresult = $p->cresult + 0;
            }
            if ($p->jwb88 == 1) {
                $p->cresult = $p->cresult + 1;
            } else {
                $p->cresult = $p->cresult + 0;
            }
            if ($p->jwb77 == 1) {
                $p->cresult = $p->cresult + 1;
            } else {
                $p->cresult = $p->cresult + 0;
            }
            if ($p->jwb66 == 1) {
                $p->cresult = $p->cresult + 1;
            } else {
                $p->cresult = $p->cresult + 0;
            }
            if ($p->jwb55 == 1) {
                $p->cresult = $p->cresult + 1;
            } else {
                $p->cresult = $p->cresult + 0;
            }
            if ($p->jwb44 == 1) {
                $p->cresult = $p->cresult + 1;
            } else {
                $p->cresult = $p->cresult + 0;
            }
            if ($p->jwb33 == 1) {
                $p->cresult = $p->cresult + 1;
            } else {
                $p->cresult = $p->cresult + 0;
            }
            if ($p->jwb22 == 1) {
                $p->cresult = $p->cresult + 1;
            } else {
                $p->cresult = $p->cresult + 0;
            }
            if ($p->jwb11 == 1) {
                $p->cresult = $p->cresult + 1;
            } else {
                $p->cresult = $p->cresult + 0;
            }

            if ($p->jwb1 == 1) {
                $p->eresult = $p->eresult + 1;
            } else {
                $p->eresult = $p->eresult + 0;
            }
            if ($p->jwb12 == 1) {
                $p->eresult = $p->eresult + 1;
            } else {
                $p->eresult = $p->eresult + 0;
            }
            if ($p->jwb23 == 1) {
                $p->eresult = $p->eresult + 1;
            } else {
                $p->eresult = $p->eresult + 0;
            }
            if ($p->jwb34 == 1) {
                $p->eresult = $p->eresult + 1;
            } else {
                $p->eresult = $p->eresult + 0;
            }
            if ($p->jwb45 == 1) {
                $p->eresult = $p->eresult + 1;
            } else {
                $p->eresult = $p->eresult + 0;
            }
            if ($p->jwb56 == 1) {
                $p->eresult = $p->eresult + 1;
            } else {
                $p->eresult = $p->eresult + 0;
            }
            if ($p->jwb67 == 1) {
                $p->eresult = $p->eresult + 1;
            } else {
                $p->eresult = $p->eresult + 0;
            }
            if ($p->jwb78 == 1) {
                $p->eresult = $p->eresult + 1;
            } else {
                $p->eresult = $p->eresult + 0;
            }
            if ($p->jwb89 == 1) {
                $p->eresult = $p->eresult + 1;
            } else {
                $p->eresult = $p->eresult + 0;
            }

            // =======================================================================================

            if ($p->jwb90 == 0) {
                $p->wresult = $p->wresult + 1;
            } else {
                $p->wresult = $p->wresult + 0;
            }
            if ($p->jwb80 == 0) {
                $p->wresult = $p->wresult + 1;
            } else {
                $p->wresult = $p->wresult + 0;
            }
            if ($p->jwb70 == 0) {
                $p->wresult = $p->wresult + 1;
            } else {
                $p->wresult = $p->wresult + 0;
            }
            if ($p->jwb60 == 0) {
                $p->wresult = $p->wresult + 1;
            } else {
                $p->wresult = $p->wresult + 0;
            }
            if ($p->jwb50 == 0) {
                $p->wresult = $p->wresult + 1;
            } else {
                $p->wresult = $p->wresult + 0;
            }
            if ($p->jwb40 == 0) {
                $p->wresult = $p->wresult + 1;
            } else {
                $p->wresult = $p->wresult + 0;
            }
            if ($p->jwb30 == 0) {
                $p->wresult = $p->wresult + 1;
            } else {
                $p->wresult = $p->wresult + 0;
            }
            if ($p->jwb20 == 0) {
                $p->wresult = $p->wresult + 1;
            } else {
                $p->wresult = $p->wresult + 0;
            }
            if ($p->jwb10 == 0) {
                $p->wresult = $p->wresult + 1;
            } else {
                $p->wresult = $p->wresult + 0;
            }

            if ($p->jwb79 == 0) {
                $p->fresult = $p->fresult + 1;
            } else {
                $p->fresult = $p->fresult + 0;
            }
            if ($p->jwb69 == 0) {
                $p->fresult = $p->fresult + 1;
            } else {
                $p->fresult = $p->fresult + 0;
            }
            if ($p->jwb59 == 0) {
                $p->fresult = $p->fresult + 1;
            } else {
                $p->fresult = $p->fresult + 0;
            }
            if ($p->jwb49 == 0) {
                $p->fresult = $p->fresult + 1;
            } else {
                $p->fresult = $p->fresult + 0;
            }
            if ($p->jwb39 == 0) {
                $p->fresult = $p->fresult + 1;
            } else {
                $p->fresult = $p->fresult + 0;
            }
            if ($p->jwb29 == 0) {
                $p->fresult = $p->fresult + 1;
            } else {
                $p->fresult = $p->fresult + 0;
            }
            if ($p->jwb19 == 0) {
                $p->fresult = $p->fresult + 1;
            } else {
                $p->fresult = $p->fresult + 0;
            }
            if ($p->jwb9 == 0) {
                $p->fresult = $p->fresult + 1;
            } else {
                $p->fresult = $p->fresult + 0;
            }
            if ($p->jwb10 == 1) {
                $p->fresult = $p->fresult + 1;
            } else {
                $p->fresult = $p->fresult + 0;
            }

            if ($p->jwb68 == 0) {
                $p->kresult = $p->kresult + 1;
            } else {
                $p->kresult = $p->kresult + 0;
            }
            if ($p->jwb58 == 0) {
                $p->kresult = $p->kresult + 1;
            } else {
                $p->kresult = $p->kresult + 0;
            }
            if ($p->jwb48 == 0) {
                $p->kresult = $p->kresult + 1;
            } else {
                $p->kresult = $p->kresult + 0;
            }
            if ($p->jwb38 == 0) {
                $p->kresult = $p->kresult + 1;
            } else {
                $p->kresult = $p->kresult + 0;
            }
            if ($p->jwb28 == 0) {
                $p->kresult = $p->kresult + 1;
            } else {
                $p->kresult = $p->kresult + 0;
            }
            if ($p->jwb18 == 0) {
                $p->kresult = $p->kresult + 1;
            } else {
                $p->kresult = $p->kresult + 0;
            }
            if ($p->jwb8 == 0) {
                $p->kresult = $p->kresult + 1;
            } else {
                $p->kresult = $p->kresult + 0;
            }
            if ($p->jwb9 == 1) {
                $p->kresult = $p->kresult + 1;
            } else {
                $p->kresult = $p->kresult + 0;
            }
            if ($p->jwb20 == 1) {
                $p->kresult = $p->kresult + 1;
            } else {
                $p->kresult = $p->kresult + 0;
            }

            if ($p->jwb57 == 0) {
                $p->zresult = $p->zresult + 1;
            } else {
                $p->zresult = $p->zresult + 0;
            }
            if ($p->jwb47 == 0) {
                $p->zresult = $p->zresult + 1;
            } else {
                $p->zresult = $p->zresult + 0;
            }
            if ($p->jwb37 == 0) {
                $p->zresult = $p->zresult + 1;
            } else {
                $p->zresult = $p->zresult + 0;
            }
            if ($p->jwb27 == 0) {
                $p->zresult = $p->zresult + 1;
            } else {
                $p->zresult = $p->zresult + 0;
            }
            if ($p->jwb17 == 0) {
                $p->zresult = $p->zresult + 1;
            } else {
                $p->zresult = $p->zresult + 0;
            }
            if ($p->jwb7 == 0) {
                $p->zresult = $p->zresult + 1;
            } else {
                $p->zresult = $p->zresult + 0;
            }
            if ($p->jwb8 == 1) {
                $p->zresult = $p->zresult + 1;
            } else {
                $p->zresult = $p->zresult + 0;
            }
            if ($p->jwb19 == 1) {
                $p->zresult = $p->zresult + 1;
            } else {
                $p->zresult = $p->zresult + 0;
            }
            if ($p->jwb30 == 1) {
                $p->zresult = $p->zresult + 1;
            } else {
                $p->zresult = $p->zresult + 0;
            }

            if ($p->jwb46 == 0) {
                $p->oresult = $p->oresult + 1;
            } else {
                $p->oresult = $p->oresult + 0;
            }
            if ($p->jwb36 == 0) {
                $p->oresult = $p->oresult + 1;
            } else {
                $p->oresult = $p->oresult + 0;
            }
            if ($p->jwb26 == 0) {
                $p->oresult = $p->oresult + 1;
            } else {
                $p->oresult = $p->oresult + 0;
            }
            if ($p->jwb16 == 0) {
                $p->oresult = $p->oresult + 1;
            } else {
                $p->oresult = $p->oresult + 0;
            }
            if ($p->jwb6 == 0) {
                $p->oresult = $p->oresult + 1;
            } else {
                $p->oresult = $p->oresult + 0;
            }
            if ($p->jwb7 == 1) {
                $p->oresult = $p->oresult + 1;
            } else {
                $p->oresult = $p->oresult + 0;
            }
            if ($p->jwb18 == 1) {
                $p->oresult = $p->oresult + 1;
            } else {
                $p->oresult = $p->oresult + 0;
            }
            if ($p->jwb29 == 1) {
                $p->oresult = $p->oresult + 1;
            } else {
                $p->oresult = $p->oresult + 0;
            }
            if ($p->jwb40 == 1) {
                $p->oresult = $p->oresult + 1;
            } else {
                $p->oresult = $p->oresult + 0;
            }

            if ($p->jwb35 == 0) {
                $p->bresult = $p->bresult + 1;
            } else {
                $p->bresult = $p->bresult + 0;
            }
            if ($p->jwb25 == 0) {
                $p->bresult = $p->bresult + 1;
            } else {
                $p->bresult = $p->bresult + 0;
            }
            if ($p->jwb15 == 0) {
                $p->bresult = $p->bresult + 1;
            } else {
                $p->bresult = $p->bresult + 0;
            }
            if ($p->jwb5 == 0) {
                $p->bresult = $p->bresult + 1;
            } else {
                $p->bresult = $p->bresult + 0;
            }
            if ($p->jwb6 == 1) {
                $p->bresult = $p->bresult + 1;
            } else {
                $p->bresult = $p->bresult + 0;
            }
            if ($p->jwb17 == 1) {
                $p->bresult = $p->bresult + 1;
            } else {
                $p->bresult = $p->bresult + 0;
            }
            if ($p->jwb28 == 1) {
                $p->bresult = $p->bresult + 1;
            } else {
                $p->bresult = $p->bresult + 0;
            }
            if ($p->jwb39 == 1) {
                $p->bresult = $p->bresult + 1;
            } else {
                $p->bresult = $p->bresult + 0;
            }
            if ($p->jwb50 == 1) {
                $p->bresult = $p->bresult + 1;
            } else {
                $p->bresult = $p->bresult + 0;
            }

            if ($p->jwb24 == 0) {
                $p->xresult = $p->xresult + 1;
            } else {
                $p->xresult = $p->xresult + 0;
            }
            if ($p->jwb14 == 0) {
                $p->xresult = $p->xresult + 1;
            } else {
                $p->xresult = $p->xresult + 0;
            }
            if ($p->jwb4 == 0) {
                $p->xresult = $p->xresult + 1;
            } else {
                $p->xresult = $p->xresult + 0;
            }
            if ($p->jwb5 == 1) {
                $p->xresult = $p->xresult + 1;
            } else {
                $p->xresult = $p->xresult + 0;
            }
            if ($p->jwb16 == 1) {
                $p->xresult = $p->xresult + 1;
            } else {
                $p->xresult = $p->xresult + 0;
            }
            if ($p->jwb27 == 1) {
                $p->xresult = $p->xresult + 1;
            } else {
                $p->xresult = $p->xresult + 0;
            }
            if ($p->jwb38 == 1) {
                $p->xresult = $p->xresult + 1;
            } else {
                $p->xresult = $p->xresult + 0;
            }
            if ($p->jwb49 == 1) {
                $p->xresult = $p->xresult + 1;
            } else {
                $p->xresult = $p->xresult + 0;
            }
            if ($p->jwb60 == 1) {
                $p->xresult = $p->xresult + 1;
            } else {
                $p->xresult = $p->xresult + 0;
            }

            if ($p->jwb13 == 0) {
                $p->presult = $p->presult + 1;
            } else {
                $p->presult = $p->presult + 0;
            }
            if ($p->jwb3 == 0) {
                $p->presult = $p->presult + 1;
            } else {
                $p->presult = $p->presult + 0;
            }
            if ($p->jwb4 == 1) {
                $p->presult = $p->presult + 1;
            } else {
                $p->presult = $p->presult + 0;
            }
            if ($p->jwb15 == 1) {
                $p->presult = $p->presult + 1;
            } else {
                $p->presult = $p->presult + 0;
            }
            if ($p->jwb25 == 1) {
                $p->presult = $p->presult + 1;
            } else {
                $p->presult = $p->presult + 0;
            }
            if ($p->jwb37 == 1) {
                $p->presult = $p->presult + 1;
            } else {
                $p->presult = $p->presult + 0;
            }
            if ($p->jwb48 == 1) {
                $p->presult = $p->presult + 1;
            } else {
                $p->presult = $p->presult + 0;
            }
            if ($p->jwb59 == 1) {
                $p->presult = $p->presult + 1;
            } else {
                $p->presult = $p->presult + 0;
            }
            if ($p->jwb70 == 1) {
                $p->presult = $p->presult + 1;
            } else {
                $p->presult = $p->presult + 0;
            }

            if ($p->jwb2 == 0) {
                $p->aresult = $p->aresult + 1;
            } else {
                $p->aresult = $p->aresult + 0;
            }
            if ($p->jwb3 == 1) {
                $p->aresult = $p->aresult + 1;
            } else {
                $p->aresult = $p->aresult + 0;
            }
            if ($p->jwb14 == 1) {
                $p->aresult = $p->aresult + 1;
            } else {
                $p->aresult = $p->aresult + 0;
            }
            if ($p->jwb25 == 1) {
                $p->aresult = $p->aresult + 1;
            } else {
                $p->aresult = $p->aresult + 0;
            }
            if ($p->jwb36 == 1) {
                $p->aresult = $p->aresult + 1;
            } else {
                $p->aresult = $p->aresult + 0;
            }
            if ($p->jwb47 == 1) {
                $p->aresult = $p->aresult + 1;
            } else {
                $p->aresult = $p->aresult + 0;
            }
            if ($p->jwb58 == 1) {
                $p->aresult = $p->aresult + 1;
            } else {
                $p->aresult = $p->aresult + 0;
            }
            if ($p->jwb69 == 1) {
                $p->aresult = $p->aresult + 1;
            } else {
                $p->aresult = $p->aresult + 0;
            }
            if ($p->jwb80 == 1) {
                $p->aresult = $p->aresult + 1;
            } else {
                $p->aresult = $p->aresult + 0;
            }

            if ($p->jwb2 == 1) {
                $p->nresult = $p->nresult + 1;
            } else {
                $p->nresult = $p->nresult + 0;
            }
            if ($p->jwb13 == 1) {
                $p->nresult = $p->nresult + 1;
            } else {
                $p->nresult = $p->nresult + 0;
            }
            if ($p->jwb24 == 1) {
                $p->nresult = $p->nresult + 1;
            } else {
                $p->nresult = $p->nresult + 0;
            }
            if ($p->jwb35 == 1) {
                $p->nresult = $p->nresult + 1;
            } else {
                $p->nresult = $p->nresult + 0;
            }
            if ($p->jwb46 == 1) {
                $p->nresult = $p->nresult + 1;
            } else {
                $p->nresult = $p->nresult + 0;
            }
            if ($p->jwb57 == 1) {
                $p->nresult = $p->nresult + 1;
            } else {
                $p->nresult = $p->nresult + 0;
            }
            if ($p->jwb68 == 1) {
                $p->nresult = $p->nresult + 1;
            } else {
                $p->nresult = $p->nresult + 0;
            }
            if ($p->jwb79 == 1) {
                $p->nresult = $p->nresult + 1;
            } else {
                $p->nresult = $p->nresult + 0;
            }
            if ($p->jwb90 == 1) {
                $p->nresult = $p->nresult + 1;
            } else {
                $p->nresult = $p->nresult + 0;
            }
            // ================================================================== G ==========================
            if (($p->gresult >= 0) && ($p->gresult <= 4)) {
                $p->ganalisis = 'Bekerja untuk kesenangan saja, bukan hasil optimal';
            } else
             if (($p->gresult >= 5) && ($p->gresult <= 9)) {
                $p->ganalisis = 'Kemauan bekerja keras tinggi';
            }
            // ================================================================== L ==========================
            if (($p->lresult >= 0) && ($p->lresult <= 4)) {
                $p->lanalisis = 'Cenderung tidak aktif menggunakan orang lain dalam bekerja. ';
            } else
             if (($p->lresult >= 5) && ($p->lresult <= 9)) {
                $p->lanalisis = 'Memproyeksikan diri sebagai pemimpin.';
            }
            // ================================================================== i ==========================
            if (($p->iresult >= 0) && ($p->iresult <= 4)) {
                $p->ianalisis = 'Berhati-hati dalam mengambil keputusan.';
            } else
             if (($p->iresult >= 5) && ($p->iresult <= 7)) {
                $p->ianalisis = 'Berhati-hati dan lancar dalam mengambil keputusan.';
            } else
             if (($p->iresult >= 8) && ($p->iresult <= 9)) {
                $p->ianalisis = 'Tidak ragu dalam mengambil keputusan';
            }
            // ================================================================== t ==========================
            if (($p->tresult >= 0) && ($p->tresult <= 3)) {
                $p->tanalisis = 'Melakukan sesuatu menurut kemauannya sendiri';
            } else
if (($p->tresult >= 4) && ($p->tresult <= 9)) {
                $p->tanalisis = 'Aktif secara internal dan mental';
            }
            // ================================================================== v ==========================
            if (($p->vresult >= 0) && ($p->vresult <= 4)) {
                $p->vanalisis = 'Cenderung pasif';
            } else
if (($p->vresult >= 5) && ($p->vresult <= 9)) {
                $p->vanalisis = 'Aktif secara fisik, cenderung sportif';
            }

            // ================================================================== S ==========================
            if (($p->sresult >= 0) && ($p->sresult <= 5)) {
                $p->sanalisis = 'Perhatian rendah terhadap hubungan sosial';
            } else
            if (($p->sresult >= 6) && ($p->sresult <= 9)) {
                $p->sanalisis = 'Kepercayaan tinggi dalam hubungan sosial, suka interaksi sosial';
            }
            // ================================================================== R ==========================
            if (($p->rresult >= 0) && ($p->rresult <= 4)) {
                $p->ranalisis = 'Kurang perhatian, bersifat praktis';
            } else
            if (($p->rresult >= 5) && ($p->rresult <= 9)) {
                $p->ranalisis = 'Nilai penalaran tergolong tinggi';
            }

            // ================================================================== D ==========================
            if (($p->dresult >= 0) && ($p->dresult <= 3)) {
                $p->danalisis = 'Tidak berminat bekerja detail';
            } else
              if (($p->dresult >= 4) && ($p->dresult <= 9)) {
                $p->danalisis = 'Minat tinggi unbtuk bekerja detail';
            }
            // ================================================================== C ==========================
            if (($p->cresult >= 0) && ($p->cresult <= 5)) {
                $p->canalisis = 'Teratur tetapi tidak tergolong flexibel';
            } else
            if (($p->cresult >= 6) && ($p->cresult <= 9)) {
                $p->canalisis = 'Keteraturan tinggi, cenderung kaku';
            }
            // ================================================================== E ==========================
            if (($p->eresult >= 0) && ($p->eresult <= 3)) {
                $p->eanalisis = 'Terbuka';
            } else
             if (($p->eresult >= 4) && ($p->eresult <= 6)) {
                $p->eanalisis = 'Punya pendekatan emosional yang seimbang';
            } else
             if (($p->eresult >= 7) && ($p->eresult <= 9)) {
                $p->eanalisis = 'Sangat normative, kebutuhan pengendalian diri yang berlebihan';
            }
            // ================================================================== W ==========================
            if (($p->wresult >= 0) && ($p->wresult <= 3)) {
                $p->wanalisis = 'Berorientasi pada tujuan, mandiri';
            } else
             if (($p->wresult >= 4) && ($p->wresult <= 5)) {
                $p->wanalisis = 'Kebutuhan akan pengarahan dan harapan yang dirumuskan untuknya';
            } else
             if (($p->wresult >= 6) && ($p->wresult <= 9)) {
                $p->wanalisis = 'Meningkatnya orientasi terhadap tugas dan membutuhkan instruksi yang jelas';
            }
            // ================================================================== F ==========================
            if (($p->fresult >= 0) && ($p->fresult <= 3)) {
                $p->fanalisis = 'Mengurus kepentingannya sendiri';
            } else
             if (($p->fresult >= 4) && ($p->fresult <= 5)) {
                $p->fanalisis = 'Setia terhadap perusahaan';
            } else
             if (($p->fresult >= 6) && ($p->fresult <= 9)) {
                $p->fanalisis = 'Bersikap setia dan membantu';
            }
            // ================================================================== K ========================== 
            if (($p->kresult >= 0) && ($p->kresult <= 2)) {
                $p->kanalisis = 'Menghindari masalah';
            } else
             if (($p->kresult >= 3) && ($p->kresult <= 4)) {
                $p->kanalisis = 'Suka lingkungan tenang, menghindari konflik';
            } else
             if (($p->kresult == 5)) {
                $p->kanalisis = 'Keras kepala';
            } else
             if (($p->kresult >= 6) && ($p->kresult <= 9)) {
                $p->kanalisis = 'Agresif, cenderung defensive';
            }
            // ================================================================== Z ==========================
            if (($p->zresult >= 0) && ($p->zresult <= 4)) {
                $p->zanalisis = 'Tidak suka perubahan jika dipaksakan';
            } else
             if (($p->zresult >= 5) && ($p->zresult <= 9)) {
                $p->zanalisis = 'Mudah menyesuaikan diri';
            }
            // ================================================================== O ==========================
            if (($p->oresult >= 0) && ($p->oresult <= 4)) {
                $p->oanalisis = 'Sadar akan hubungan perorangan, tapi tidak terlalu tergantung';
            } else
             if (($p->oresult >= 5) && ($p->oresult <= 9)) {
                $p->oanalisis = 'Sangat tergantung, butuh penerimaan diri';
            }
            // ================================================================== B ==========================
            if (($p->bresult >= 0) && ($p->bresult <= 3)) {
                $p->banalisis = 'Selektif';
            } else
             if (($p->bresult >= 4) && ($p->bresult <= 5)) {
                $p->banalisis = 'Butuh diterima, tapi tidak mudah dipengaruhi kelompok';
            } else
             if (($p->bresult >= 6) && ($p->bresult <= 9)) {
                $p->banalisis = 'Butuh disukai dan diakui, mudah dipengaruhi';
            }
            // ================================================================== X ==========================
            if (($p->xresult >= 0) && ($p->xresult <= 3)) {
                $p->xanalisis = 'Rendah kati, tulus';
            } else
             if (($p->xresult >= 4) && ($p->xresult <= 5)) {
                $p->xanalisis = 'Memiliki pola prilaku unik';
            } else
             if (($p->xresult >= 6) && ($p->xresult <= 9)) {
                $p->xanalisis = 'Membutuhkan perhatian nyata';
            }
            // ================================================================== P ==========================
            if (($p->presult >= 0) && ($p->presult <= 4)) {
                $p->panalisis = 'Menurunnya keinginan untuk bertanggung jawab pada pekerjaan orang lain';
            } else
            if (($p->presult >= 5) && ($p->presult <= 9)) {
                $p->panalisis = 'Kebutuhan untuk menerima tanggung jawab dari pekerjaan orang lain.';
            }
            // ================================================================== A ==========================
            if (($p->aresult >= 0) && ($p->aresult <= 5)) {
                $p->aanalisis = 'Tidak ada usaha lebih';
            } else
             if (($p->aresult >= 6) && ($p->aresult <= 9)) {
                $p->aanalisis = 'Tujuan jelas, kebutuhan sukses dan ambisi tinggi';
            }
            // ================================================================== N ==========================
            if (($p->nresult >= 0) && ($p->nresult <= 4)) {
                $p->nanalisis = 'Menunda/menghindari pekerjaan';
            } else
            if (($p->nresult >= 5) && ($p->nresult <= 6)) {
                $p->nanalisis = 'Cukup bertanggung jawab pada pekerjaan';
            } else
            if (($p->nresult >= 7) && ($p->nresult <= 9)) {
                $p->nanalisis = 'Memiliki tanggung jawab tinggi.';
            }

            array_push($result, $p);
            //dd($result);
        }




        //use -> untuk memumculkan field (fielsd bersifat object)
        //dump($result[0]->no_pendaftaran);

        return view('papi.report', ['data' => $result]);
        // return response()->json(['status' => 'success', 'data' => $result, 'code' => 200]);
    }
}
