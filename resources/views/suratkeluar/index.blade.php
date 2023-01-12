@extends('layout.app')

@section('title', 'Surat Keluar')
@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="card p-2" style="font-size: 12px">

    <div class="m-2 d-flex justify-content-end">
        <a type="button" class="btn btn-primary btn-sm" href="{{ url('/buatsuratkeluar') }}"><i class="fas fa-plus"></i> Tambah</a>
        {{-- <a type="button" class="btn btn-primary btn-sm">Tambah</a> --}}

    </div>


    <!-- SidebarSearch Form -->

    <div class="col-md">
        <table class="table text-center" id="myTable" style="font-size: 12px">
            <thead class="thead-light">
                <th class="align-middle">No</th>
                <th class="align-middle">Nomor surat</th>
                <th class="align-middle">Penerima</th>
                <th class="align-middle">Agenda</th>
                <th class="align-middle">Perihal</th>
                <th class="align-middle">Tanggal Surat </th>
                <th class="align-middle"> Waktu Masuk </th>
                <th class="align-middle">Action</th>
            </thead>
            <tbody>
                @foreach ($suratkeluar as $index => $item)
                    @include('suratkeluar.show')
                    <tr>
                        <td class="align-middle">{{ $index + 1 }}</td>
                        <td class="align-middle">{{ $item->nomor_surat }}</td>
                        <td class="align-middle">{{ $item->penerima }}</td>
                        <td class="align-middle">{{ $item->agenda }}</td>
                        <td class="align-middle">{{ $item->perihal }}</td>
                        <td class="align-middle">{{ $item->tgl_surat }}</td>
                        <td class="align-middle">{{ $item->created_at }}</td>
                        <td class="align-middle">
                            <div class="row-col-md-3 d-flex align-items-center justify-content-center" style="font-size: 12px">
                                <a type="button" class="btn btn-sm btn-info text-white" data-toggle="modal" data-target="#exampleModal-{{ $item->id }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a class="text-white btn btn-warning btn-sm mx-1" href="{{ route('suratkeluar.edit', $item->id) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('suratkeluar.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DElETE')
                                    <button class="btn btn-danger btn-sm mx-1" type="submit"><i class="fas fa-trash"></i></button>
                                </form>
                                <a class="btn btn-primary btn-sm text-white" href="{{ route('suratkeluar.download', $item->dokumen) }}">
                                    <i class="fas fa-download"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <form action="" method="post" id="formDelete">
                    @method('DELETE')
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="mb-konfirmasi">
                        {{-- anda yakin ingin menghapus data program studi ini ? --}}
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-outline-light">Hapus</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
    <script src="{{ asset('vendors/plugins/jquery/jquery.min.js') }}"></script>
    <script>
        //generate alamat url untuk hapus data program sudi
        $('.btn-hapus').click(function() {
            let id = $(this).attr('data-id');
            $('#formDelete').attr('action', '/suratkeluar/' + id);
            // get value attribute data-nama-nama_prodi
            // let nama_prodi = $(this).attr('data-nama-prodi');
            // set text div id mb-konfirmasi
            $("#mb-konfirmasi").text("apakah anda yakin ingin menghapus data surat ini ?");
        })

        $('#formDelete [type="submit"]').click(function() {
            $('#formDelete').submit();
        })
    </script>
@endsection
@push('scripts')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endpush
