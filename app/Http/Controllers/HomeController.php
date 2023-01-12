<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jabatan = Auth::user()->jabatan;

        if ($jabatan == 'KASIE LALA DAN USAHA KEPELABUHAN') {
            $suratmasuk = SuratMasuk::where('disposisi', 'LIKE', '%KASIE LALA DAN USAHA KEPELABUHAN%')->get();
            $countmasuk = $suratmasuk->count();
        } elseif ($jabatan == 'KASIE KESELAMATAN BERLAYAR PENJAGAAN DAN PATROLI') {
            $suratmasuk = SuratMasuk::where('disposisi', 'LIKE', '%KASIE KESELAMATAN BERLAYAR PENJAGAAN DAN PATROLI%')->get();
            $countmasuk = $suratmasuk->count();
        } elseif ($jabatan == 'KASIE STATUS HUKUM KAPAL DAN SERTIFIKASI KAPAL') {
            $suratmasuk = SuratMasuk::where('disposisi', 'Like', '%KASIE STATUS HUKUM KAPAL DAN SERTIFIKASI KAPAL%')->get();
            $countmasuk = $suratmasuk->count();
        } elseif ($jabatan == 'KEPALA KSOP') {
            $suratmasuk = SuratMasuk::where('status','=', 'Sedang Diproses')->orWhere('status','=', 'Disetujui')->get();
            $countmasuk = $suratmasuk->count();
        } else {
            $suratmasuk = SuratMasuk::all();
            $countuser = DB::table('users')->count();
            $countmasuk = DB::table('surat_masuk')->count();
            $countkeluar = DB::table('surat_keluar')->count();
        }
        $data = compact('suratmasuk');
        $data['title'] = 'Dashboard';
        if($jabatan == 'ARSIPARIS'){
            return view('index', $data, ['countuser' => $countuser, 'countmasuk' => $countmasuk, 'countkeluar' => $countkeluar]);
        }else{
            return view('index', $data, ['countmasuk' => $countmasuk]);
        }
    }
}
