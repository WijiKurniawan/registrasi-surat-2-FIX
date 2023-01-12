@extends('layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        <b>Tambah Surat</b>
    </div>
    <div class="card-body">
    <form action="{{ route('suratkeluar.store') }}" method="POST" enctype="multipart/form-data">
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
            <input type="text" class="form-control" id="nomor-keluar" placeholder="" name="nomor_surat" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Penerima</label>
            <input type="text" class="form-control" id="penerima-keluar" placeholder="" required name="penerima">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Agenda</label>
            <input type="text" class="form-control" id="agenda-keluar" placeholder="" required name="agenda">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Perihal</label>
            <input type="text" class="form-control" id="perihal-keluar" placeholder="" required name="perihal">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Tanggal Surat</label>
            <input type="date" class="form-control" id="tgl-surat" placeholder="" required name="tgl_surat">
        </div>


        <div class="form-group">
            <label for="dokumen">Upload file surat</label>
            <input type="file" name="dokumen" class="form-control">
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary" style="width: 150px"><i class="fas fa-plus"></i> Tambah Surat</button>
        </div>
    </form>
</div>
</div>

@endsection
