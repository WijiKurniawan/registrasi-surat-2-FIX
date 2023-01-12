@extends('layout.app')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href={{ asset('vendors/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('vendors/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('vendors/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}>
@endsection

@section('content')
<?php $jabatan = Auth::user()->jabatan; ?>
<div class="card p-2" style="font-size: 12px">

    @if($jabatan == 'ARSIPARIS')
    <div class="m-2 d-flex justify-content-end">
        <a type="button" class="btn btn-primary btn-sm" href="{{ url('suratmasuk/create') }}"><i class="fas fa-plus"></i> Tambah</a>
    </div>
    @endif
    <div class="col-md">
        <table class="table table-sm table-bordered table-hover text-center" id="myTable">
            <thead class="thead-light">
                <th class="align-middle">No</th>
                <th class="align-middle">Nomor surat</th>
                <th class="align-middle">Pengirim</th>
                <th class="align-middle">Agenda</th>
                <th class="align-middle">Perihal</th>
                <th class="align-middle">Tanggal Surat </th>
                @if($jabatan == 'KEPALA KSOP' || $jabatan == 'ARSIPARIS' || $jabatan == 'KASUB. BAG. TATA USAHA')
                <th class="align-middle">Disposisi</th>
                @endif
                <th class="align-middle">Perintah</th>
                <th class="align-middle">Catatan Kepala KSOP</th>
                <th class="align-middle">Catatan</th>
                <th class="align-middle">Dokumen Masuk</th>
                <th class="align-middle"> Status </th>
                <th class="align-middle"> Waktu Masuk </th>
                <th class="align-middle">Action</th>
            </thead>
            <tbody>
                
                @foreach ($suratmasuk as $index => $item)
                    @include('suratmasuk.show')
                    <tr>
                        <td class="align-middle">{{ $index + 1 }}</td>
                        <td class="align-middle">{{ $item->nomor_surat_masuk }}</td>
                        <td class="align-middle">{{ $item->pengirim_masuk }}</td>
                        <td class="align-middle">{{ $item->agenda_masuk }}</td>
                        <td class="align-middle">{{ $item->perihal_masuk }}</td>
                        <td class="align-middle">{{ $item->tgl_surat_masuk }}</td>
                        @if($jabatan == 'KEPALA KSOP' || $jabatan == 'ARSIPARIS' || $jabatan == 'KASUB. BAG. TATA USAHA')
                        <td class="align-middle">{{ $item->disposisi }}</td>
                        @endif
                        <td class="align-middle">{{ $item->perintah }}</td>
                        <td class="align-middle">{{ $item->catatan_KSOP }}</td>
                        <td class="align-middle">{{ $item->catatan }}</td>
                        <td class="align-middle">{{ $item->dokumen_masuk }}</td>
                        @if ($item->status == 'Menunggu Tindakan')
                            <td class="align-middle"><span class="badge bg-warning"> {{ $item->status }}</span></td>
                        @elseif($item->status == 'Disetujui')
                            <td class="align-middle"><span class="badge bg-info"> {{ $item->status }}</span></td>
                        @elseif($item->status == 'Tidak Disetujui')
                            <td class="align-middle"><span class="badge bg-danger"> {{ $item->status }}</span></td>
                        @elseif($item->status == 'Sedang Diproses')
                            <td class="align-middle"><span class="badge bg-success"> {{ $item->status }}</span></td>
                        @endif
                        <td class="align-middle">{{ $item->created_at }}</td>
                        <td class="d-flex align-items-center justify-content-center" style="width: 140px">

                            <a type="button" class="btn btn-sm btn-info text-white mx-1" data-toggle="modal" data-target="#modalMasuk-{{ $item->id }}">
                                <i class="fas fa-eye"></i>
                            </a>
                                @if($jabatan != 'ARSIPARIS' )
                                <a class="text-white btn btn-primary btn-sm" href="{{ route('suratmasuk.edit', $item->id) }}">
                                    <i class="fas fa-share-square"></i>
                                </a>
                                @endif
                                @if($jabatan == 'ARSIPARIS')
                                <form action="{{ route('suratmasuk.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DElETE')
                                    <button class="btn btn-danger btn-sm mx-1" type="submit"><i class="fas fa-trash"></i></button>
                                </form>
                                @endif
                                <a class="btn btn-success btn-sm text-white mx-1" href="{{ route('suratmasuk.download', $item->dokumen_masuk) }}">
                                    <i class="fas fa-download fa-sm"></i>
                                </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@push('scripts')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endpush

@endsection

