@extends('layout.app')

@section('title', 'Edit Surat Keluar')

@section('content')
    <div class="card">
        <div class="card-header">
            <b>Edit Akun</b>
        </div>
        <div class="card-body">
            <?php $jabatan = Auth::user()->jabatan; ?>
            {{-- @php
        dd($user);
    @endphp --}}
            <form action="{{ url('manajemenakun/update/' . $user->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
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
                    <input type="text" class="form-control" id="nomor-keluar" value="{{ $user->nik }}" placeholder=""
                        name="nik" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" class="form-control" id="penerima-keluar" value="{{ $user->nama }}"
                        placeholder="" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputtext1">Email</label>
                    <input type="email" class="form-control" id="agenda-keluar" value="{{ $user->email }}" placeholder=""
                        required name="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputtext1">Jabatan</label>
                    <select class="custom-select rounded-2" id="exampleSelectRounded0" aria-placeholder="jabatan"
                        name="jabatan">
                        <option value="KEPALA KSOP" @if ($user->jabatan == 'KEPALA KSOP') selected @endif>Kepala KSOP</option>
                        <option value="ARSIPARIS" @if ($user->jabatan == 'ARSIPARIS') selected @endif>Arsiparis</option>
                        <option value="KASUB. BAG. TATA USAHA" @if ($user->jabatan == 'KASUB. BAG. TATA USAHA') selected @endif>Kasub. Bag.
                            Tata Usaha</option>
                        <option value="KASIE LALA DAN USAHA KEPELABUHAN" @if ($user->jabatan == 'KASIE LALA DAN USAHA KEPELABUHAN') selected @endif>
                            Kasie Lala dan Usaha Kepelabuhan</option>
                        <option value="KASIE KESELAMATAN BERLAYAR PENJAGAAN DAN PATROLI"
                            @if ($user->jabatan == 'KASIE KESELAMATAN BERLAYAR PENJAGAAN DAN PATROLI') selected @endif>Kasie Keselamatan Berlayar Penjagaan dan
                            Patroli</option>
                        <option value="KASIE STATUS HUKUM KAPAL DAN SERTIFIKASI KAPAL"
                            @if ($user->jabatan == 'KASIE STATUS HUKUM KAPAL DAN SERTIFIKASI KAPAL') selected @endif>Kasie Status Hukum Kapal dan Sertifikasi Kapal
                        </option>
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary" style="width: 150px"><i class="fas fa-edit"></i> Edit
                        Akun</button>
                </div>
            </form>
        </div>
    </div>
@endsection
