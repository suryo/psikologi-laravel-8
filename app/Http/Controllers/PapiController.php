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
}
