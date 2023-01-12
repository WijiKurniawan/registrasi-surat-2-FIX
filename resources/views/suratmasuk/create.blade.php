@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-header">

    </div>
    <div class="card-body px-5 py-3">
        <form action="{{ route('suratmasuk.store') }}" method="POST" enctype="multipart/form-data">
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
                <label for="exampleInputEmail1">Nomor surat</label>
                <input type="text" class="form-control" id="nomor-keluar" placeholder="" name="nomor_surat_masuk" required >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Pengirim</label>
                <input type="text" class="form-control" id="penerima-keluar" placeholder="" required name="pengirim_masuk">
            </div>
            <div class="form-group">
                <label for="exampleInputtext1">Agenda</label>
                <input type="text" class="form-control" id="agenda-keluar" placeholder="" required name="agenda_masuk">
            </div>
            <div class="form-group">
                <label for="exampleInputtext1">Perihal</label>
                <input type="text" class="form-control" id="perihal-keluar" placeholder="" required name="perihal_masuk">
            </div>
            <div class="form-group">
                <label for="exampleInputtext1">Tanggal Surat</label>
                <input type="date" class="form-control" id="perihal-keluar" placeholder="" required name="tgl_surat_masuk">
            </div>
            <div class="form-group">
                <label for="dokumen">Unggah Dokumen Surat</label>
                <input type="file" name="dokumen_masuk" class="form-control">
            </div>
            <input type="text" class="form-control" id="perihal-keluar" placeholder="" required name="status" hidden value="Menunggu Tindakan">
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary"  style="width: 100px">Kirim</button>
            </div>
        </form>

    </div>

</div>
@endsection
