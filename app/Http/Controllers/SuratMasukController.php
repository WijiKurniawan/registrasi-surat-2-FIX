<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Auth::user()->jabatan;
        if ($jabatan == 'KASIE LALA DAN USAHA KEPELABUHAN') {
            $suratmasuk = SuratMasuk::where('disposisi', 'LIKE', '%KASIE LALA DAN USAHA KEPELABUHAN%')->get();
        } elseif ($jabatan == 'KASIE KESELAMATAN BERLAYAR PENJAGAAN DAN PATROLI') {
            $suratmasuk = SuratMasuk::where('disposisi', 'LIKE', '%KASIE KESELAMATAN BERLAYAR PENJAGAAN DAN PATROLI%')->get();
        } elseif ($jabatan == 'KASIE STATUS HUKUM KAPAL DAN SERTIFIKASI KAPAL') {
            $suratmasuk = SuratMasuk::where('disposisi', 'Like', '%KASIE STATUS HUKUM KAPAL DAN SERTIFIKASI KAPAL%')->get();
        } elseif ($jabatan == 'KEPALA KSOP') {
            $suratmasuk = SuratMasuk::where('status','=', 'Sedang Diproses')->orWhere('status','=', 'Disetujui')->get();
        } else {
            $suratmasuk = SuratMasuk::all();
        }

        $data = compact('suratmasuk');
        $data['title'] = 'Surat Masuk';
        return view('suratmasuk.index', $data);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Surat Masuk';
        return view('suratmasuk.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nomor_surat_masuk' => 'required',
            'pengirim_masuk' => 'required',
            'agenda_masuk' => 'required',
            'perihal_masuk' => 'required',
            'tgl_surat_masuk' => 'required',
            'status' => 'required',
            'dokumen_masuk' => 'required|mimes:pdf,jpg,png|max:10000'
        ]);

        // dd($request);
        $ext = $request->dokumen_masuk->getClientOriginalExtension();
        $file = "surat_masuk-" . time() . "." . $ext;
        $request->dokumen_masuk->move(public_path('/dokumen/suratmasuk'), $file);

        $simpan = new SuratMasuk();
        $simpan->nomor_surat_masuk = $validasi['nomor_surat_masuk'];
        $simpan->agenda_masuk = $validasi['agenda_masuk'];
        $simpan->pengirim_masuk = $validasi['pengirim_masuk'];
        $simpan->perihal_masuk = $validasi['perihal_masuk'];
        $simpan->tgl_surat_masuk = $validasi['tgl_surat_masuk'];
        $simpan->disposisi = "";
        $simpan->perintah = "";
        $simpan->catatan = "";
        $simpan->catatan_KSOP = "";
        $simpan->status = $validasi['status'];
        $simpan->dokumen_masuk = $file;
        $simpan->save();
        return redirect('suratmasuk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SuratMasuk $suratmasuk)
    {
        return view('suratmasuk.show')->with('suratmasuk', $suratmasuk);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['title'] = 'Surat Masuk';
        $suratmasuk = SuratMasuk::find($id);
        return view('suratmasuk.edit', ['suratmasuk' => $suratmasuk], $data);
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
        $jabatan = Auth::user()->jabatan;
        $data = $request->all();
        $suratmasuk = SuratMasuk::find($id);

        if ($jabatan == 'KEPALA KSOP') {
            $data = $request->validate([
                'nomor_surat_masuk' => 'required',
                'pengirim_masuk' => 'required',
                'agenda_masuk' => 'required',
                'perihal_masuk' => 'required',
                'tgl_surat_masuk' => 'required',
                'catatan_KSOP' => 'required',
                'perintah' => 'required',
                'disposisi' => 'required',
                'status' => 'required',
            ]);

            $perintah = implode(",", $request->perintah);
            $disposisi = implode(",", $request->disposisi);
            $suratmasuk->update([
                'perintah' => $perintah,
                'disposisi' => $disposisi,
                'catatan_KSOP' => $data['catatan_KSOP'],
                'status' => $data['status']
            ]);
        }elseif($jabatan == 'KASUB BAG. TATA USAHA'){
            $data = $request->validate([
                'status' => 'required',
            ]);

            $suratmasuk->update([
                'status' => $data['status']
            ]);
        } else {
            $data = $request->validate([
                'nomor_surat_masuk' => 'required',
                'pengirim_masuk' => 'required',
                'agenda_masuk' => 'required',
                'perihal_masuk' => 'required',
                'tgl_surat_masuk' => 'required',
                'catatan' => 'required',
            ]);

            $suratmasuk->update([
                'catatan' => $data['catatan']
            ]);
        }





        return redirect()->route('suratmasuk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suratmasuk = SuratMasuk::find($id);
        $suratmasuk->delete();
        return redirect()->route('suratmasuk');
    }

    public function download(Request $request, $file)
    {
        return response()->download(public_path('dokumen/suratmasuk/' . $file));
    }
}
