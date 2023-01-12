@extends('layout.app')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href={{ asset('vendors/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('vendors/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('vendors/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}>
@endsection

@section('content')
    <?php $jabatan = Auth::user()->jabatan; ?>
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $countmasuk }}</h3>
                    <p>Surat Masuk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-envelope"></i>
                </div>
            </div>
        </div>
        @if($jabatan == 'ARSIPARIS')
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $countkeluar }}</h3>
                    <p>Surat Keluar</p>
                </div>
                <div class="icon">
                    <i class="fas fa-paper-plane"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $countuser }}</h3>
                    <p>Akun Terdaftar</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="card" style="font-size: 12px">
        <div class="card-header">
            Data Surat Masuk
        </div>
        <div class="card-body">
            <div class="col-md">
                <table class="table table-sm table-bordered table-hover text-center" id="myTable">
                    <thead class="thead-light">
                        <th class="align-middle">No</th>
                        <th class="align-middle">Nomor surat</th>
                        <th class="align-middle">Pengirim</th>
                        <th class="align-middle">Agenda</th>
                        <th class="align-middle">Perihal</th>
                        <th class="align-middle">Tanggal Surat </th>
                        <th class="align-middle"> Status </th>
                        <th class="align-middle"> Waktu Masuk </th>
                        <th class="align-middle">Detail</th>
                    </thead>
                    <tbody>

                        @foreach ($suratmasuk as $index => $item)
                            {{-- @include('suratmasuk.show') --}}
                            <tr>
                                <td class="align-middle">{{ $index + 1 }}</td>
                                <td class="align-middle">{{ $item->nomor_surat_masuk }}</td>
                                <td class="align-middle">{{ $item->pengirim_masuk }}</td>
                                <td class="align-middle">{{ $item->agenda_masuk }}</td>
                                <td class="align-middle">{{ $item->perihal_masuk }}</td>
                                <td class="align-middle">{{ $item->tgl_surat_masuk }}</td>
                                @if ($item->status == 'Menunggu Tindakan')
                                    <td class="align-middle"><span class="badge bg-warning"> {{ $item->status }}</span></td>
                                @elseif($item->status == 'Sedang Diproses')
                                    <td class="align-middle"><span class="badge bg-success"> {{ $item->status }}</span>
                                    </td>
                                @elseif($item->status == 'Disetujui')
                                    <td class="align-middle"><span class="badge bg-info"> {{ $item->status }}</span>
                                    </td>
                                @elseif($item->status == 'Tidak Disetujui')
                                    <td class="align-middle"><span class="badge bg-danger"> {{ $item->status }}</span>
                                    </td>
                                @endif
                                <td class="align-middle">{{ $item->created_at }}</td>
                                <td class="align-middle">
                                    <a class="btn btn-info btn-sm text-white mx-1" href="{{ route('suratmasuk') }}">
                                        <i class="fas fa-eye fa-sm"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
