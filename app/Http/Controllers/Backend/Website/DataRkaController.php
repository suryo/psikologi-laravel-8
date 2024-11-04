<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataRkaRequest;
use ErrorException;
use App\Models\DataRka;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class DataRkaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (isset($_GET['jenis'])) {
           
            if (Auth::user()->role == 'Admin') {
                $datarka = DataRka::where('jenis', $_GET['jenis'])->orderBy('id', 'DESC')->get();
            } else {
                $datarka = DataRka::where('user_id', Auth::user()->id)->where('jenis','=', $_GET['jenis'])->orderBy('id', 'DESC')->get();
            }
        } else {
            if (Auth::user()->role == 'Admin') {
                $datarka = DataRka::orderBy('id', 'DESC')->get();
            } else {
                $datarka = DataRka::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
            }
        }




        return view('backend.website.content.datarka.index', compact('datarka'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataRkaRequest $request)
    {



        $request->validate([
            'document_rka' => 'required|mimes:pdf|max:2048', // maksimal ukuran 2MB
            'title' => 'required|string|max:255',
            'desc' => 'nullable|string'
        ]);

        try {
            $uploadFolder = public_path('public/file/document_rka');
            if (!is_dir($uploadFolder)) {
                mkdir($uploadFolder, 0775, true);
            }
            chmod($uploadFolder, 0775);
            $file = $request->file('document_rka');
            $filename = time() . "_" . $file->getClientOriginalName();
            $file->move('document_rka', $filename);




            // $document_rka = $request->file('document_rka');
            // $nama_document_rka = time()."_".$document_rka->getClientOriginalName();
            // // isi dengan nama folder tempat kemana file diupload
            // $tujuan_upload = 'public/file';
            // $document_rka->storeAs($tujuan_upload,$nama_document_rka);

            $DataRka = new DataRka;
            $DataRka->document_rka     = $filename;
            $DataRka->desc      = $request->desc;
            $DataRka->title     = $request->title;
            $DataRka->status = "Awaiting Processing";
            $DataRka->user_id = Auth::user()->id;
            $DataRka->urutan    = 1;
            $DataRka->save();

            Session::flash('success', 'Dokumen RKA Berhasil ditambah !');
            return redirect()->route('backend-datarka.index');
        } catch (ErrorException $e) {
            throw new ErrorException($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $datarka = DataRka::find($id);
        return view('backend.website.content.datarka.edit', compact('datarka'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {



        try {
            if ($request->file('document_rka')) {
                $request->validate([
                    'document_rka' => 'required|mimes:pdf|max:2048', // maksimal ukuran 2MB
                    'title' => 'required|string|max:255',
                    'desc' => 'nullable|string'
                ]);
            } else {
                $request->validate([
                    'title' => 'required|string|max:255',
                    'desc' => 'nullable|string'
                ]);
            }

            if ($request->file('document_rka')) {
                $uploadFolder = public_path('public/file/document_rka');
                if (!is_dir($uploadFolder)) {
                    mkdir($uploadFolder, 0775, true);
                }
                chmod($uploadFolder, 0775);
                $file = $request->file('document_rka');
                $filename = time() . "_" . $file->getClientOriginalName();
                $file->move('document_rka', $filename);
            }

            $DataRka = DataRka::find($id);
            if ($request->file('document_rka')) {
                $DataRka->document_rka     = $filename;
            }
            $DataRka->desc      = $request->desc;
            $DataRka->title     = $request->title;
            $DataRka->is_active     = $request->is_active;
            $DataRka->jenis     = $request->jenis;
            if (isset($request->status)) {
                $DataRka->status = $request->status;
            }
           
            $DataRka->urutan    = 1;
            $DataRka->save();

            Session::flash('success', 'Dokumen RKA Berhasil ditambah !');
            return redirect()->route('backend-datarka.index');
        } catch (ErrorException $e) {
            throw new ErrorException($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
