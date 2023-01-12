@extends('layout.app')

@section('title', 'Edit Surat Keluar')

@section('content')
<div class="card">
    <div class="card-header">
        <b>Edit Surat</b>
    </div>
    <div class="card-body">
    <form action="{{ url('suratkeluar/update/' . $suratkeluar->id) }}" method="POST" enctype="multipart/form-data">
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
            <label for="exampleInputEmail1">Nomor surat</label>
            <input type="text" class="form-control" id="nomor-keluar" value="{{ $suratkeluar->nomor_surat }}" placeholder=""
                name="nomor_surat" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Penerima</label>
            <input type="text" class="form-control" id="penerima-keluar" value="{{ $suratkeluar->penerima }}"
                placeholder="" name="penerima" required>
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Agenda</label>
            <input type="text" class="form-control" id="agenda-keluar" value="{{ $suratkeluar->agenda }}" placeholder=""
                required name="agenda">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Perihal</label>
            <input type="text" class="form-control" id="perihal-keluar" value="{{ $suratkeluar->perihal }}"
                placeholder="" required name="perihal">
        </div>
        <div class="form-group">
            <label for="exampleInputtext1">Tanggal Surat</label>
            <input type="date" class="form-control" id="tgl-surat" placeholder="" required name="tgl_surat" value="{{ $suratkeluar->tgl_surat }}">
        </div>

        <div class="form-group">
            <label for="dokumen">Upload file surat</label>
            <input type="file" name="dokumen" class="form-control">
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary" style="width: 150px"><i class="fas fa-edit"></i> Edit Surat</button>
        </div>
    </form>
</div>
</div>
@endsection
