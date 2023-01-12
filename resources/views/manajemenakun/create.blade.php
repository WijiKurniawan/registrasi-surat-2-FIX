@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        <b>Tambah Akun</b>
    </div>
    <div class="card-body">
        <form action="{{ route('tambahakun.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label for="exampleInputEmail1">NIK</label>
                <input type="text" class="form-control" placeholder="" name="nik" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Lengkap</label>
                <input type="text" class="form-control"  placeholder="" required name="nama">
            </div>
            <div class="form-group">
                <label for="exampleInputtext1">Email</label>
                <input type="email" class="form-control" placeholder="" required name="email">
            </div>
            <div class="form-group">
                <label for="exampleInputtext1">jabatan</label>
                <select class="custom-select rounded-2" id="exampleSelectRounded0" aria-placeholder="jabatan" name="jabatan">
                    <option value="KEPALA KSOP">Kepala KSOP</option>
                    <option value="ARSIPARIS">Arsiparis</option>
                    <option value="KASUB BAG. TATA USAHA">Kasub. Bag. Tata Usaha</option>
                    <option value="KASIE LALA DAN USAHA KEPELABUHAN">Kasie Lala dan Usaha Kepelabuhan</option>
                    <option value="KASIE KESELAMATAN BERLAYAR PENJAGAAN DAN PATROLI">Kasie Keselamatan Berlayar Penjagaan dan Patroli</option>
                    <option value="KASIE STATUS HUKUM KAPAL DAN SERTIFIKASI KAPAL">Kasie Status Hukum Kapal dan Sertifikasi Kapal</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputtext1">Kata Sandi</label>
                <input type="password" class="form-control"  placeholder="" required name="password">
            </div>
            <div class="form-group">
                <label for="exampleInputtext1">Konfirmasi Kata Sandi</label>
                <input type="password" class="form-control"  placeholder="" required name="password_confirm">
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary" style="width: 150px"><i class="fas fa-plus"></i> Tambah Akun</button>
            </div>
        </form>
    </div>
</div>

@endsection
