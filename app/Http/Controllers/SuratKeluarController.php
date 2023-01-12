<?php

namespace App\Http\Controllers;
use App\Models\SuratKeluar;

use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $suratkeluar = SuratKeluar::all();
        $data = compact('suratkeluar');
        $data['title'] = 'Surat Keluar';
        return view('suratkeluar.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Surat Keluar';
        return view ('suratkeluar.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        $validasi = $request->validate([
            'nomor_surat' => 'required',
            'penerima' => 'required',
            'agenda' => 'required',
            'perihal' => 'required',
            'tgl_surat' => 'required',
            'dokumen' => 'required|mimes:pdf,jpg,png|max:10000'
        ]);
        // dd($data);
        $ext = $request->dokumen->getClientOriginalExtension();
        $file = "surat_keluar-".time().".".$ext;
        $request->dokumen->move(public_path('/dokumen/suratkeluar'),$file);

        $simpan = new SuratKeluar();
        $simpan -> nomor_surat = $validasi['nomor_surat'];
        $simpan -> penerima = $validasi['penerima'];
        $simpan -> agenda = $validasi['agenda'];
        $simpan -> perihal = $validasi['perihal'];
        $simpan -> tgl_surat = $validasi['tgl_surat'];
        $simpan -> dokumen = $file;
        $simpan -> save();
        return redirect('suratkeluar');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SuratKeluar $suratkeluar)
    {
        return view('suratkeluar.show')->with('suratkeluar', $suratkeluar);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Surat Keluar';
        $suratkeluar = SuratKeluar::find($id);
        return view('suratkeluar.edit', ['suratkeluar'=>$suratkeluar], $data);
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
        $data = $request->all();
        $suratKeluar = SuratKeluar::find($id);
        $data = $request->validate([
            'nomor_surat' => 'required',
            'penerima' => 'required',
            'agenda' => 'required',
            'perihal' => 'required',
            'tgl_surat' => 'required',
            'dokumen' => 'mimes:pdf,jpg,png|max:10000'
        ]);

        if ($request->has('dokumen')){
            $ext = $request->dokumen->getClientOriginalExtension();
            $editFile = "surat_keluar-".time().".".$ext;
            $request->dokumen->storeAs('public/dokumen', $editFile);

            $suratKeluar->update([
                'nomor_surat' => $data['nomor_surat'],
                'penerima' => $data['penerima'],
                'agenda' => $data['agenda'],
                'perihal' => $data['perihal'],
                'tgl_surat' => $data['tgl_surat'],
                'dokumen' => $editFile
            ]);
        } else {
            $suratKeluar->update([
                'nomor_surat' => $data['nomor_surat'],
                'penerima' => $data['penerima'],
                'agenda' => $data['agenda'],
                'perihal' => $data['perihal'],
                'tgl_surat' => $data['tgl_surat'],
            ]);
        }
        
        return redirect()->route('suratkeluar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suratkeluar = SuratKeluar::find($id);
        $suratkeluar->delete();
        return redirect()->route('suratkeluar');
    }

    public function download(Request $request, $file){
        return response()->download(public_path('dokumen/suratkeluar/'.$file));
    }
}
