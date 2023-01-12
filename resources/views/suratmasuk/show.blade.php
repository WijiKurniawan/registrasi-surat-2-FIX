<div class="modal fade" id="modalMasuk-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lihat Detail surat</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <label>Nomor Surat Masuk</label>
                    </div>
                    <div class="col-8">
                        {{ $item->nomor_surat_masuk }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Pengirim</label>
                    </div>
                    <div class="col-8">
                        {{ $item->pengirim_masuk }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Agenda</label>
                    </div>
                    <div class="col-8">
                        {{ $item->agenda_masuk }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Perihal</label>
                    </div>
                    <div class="col-8">
                        {{ $item->perihal_masuk }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Tanggal Surat Masuk</label>
                    </div>
                    <div class="col-8">
                        {{ $item->tgl_surat_masuk }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Disposisi</label>
                    </div>
                    <div class="col-8">
                        {{ $item->disposisi }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Perintah</label>
                    </div>
                    <div class="col-8">
                        {{ $item->perintah }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Catatan KSOP</label>
                    </div>
                    <div class="col-8">
                        {{ $item->catatan_KSOP }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Catatan Kasie/Kasub. Bag.</label>
                    </div>
                    <div class="col-8">
                        {{ $item->catatan }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Dokumen Masuk</label>
                    </div>
                    <div class="col-8">
                        <a href="{{ asset('/dokumen/suratmasuk/' . $item->dokumen_masuk) }}" target="_blank">{{ $item->dokumen_masuk }}</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Status</label>
                    </div>
                    <div class="col-8">
                        @if ($item->status == 'Menunggu Tindakan')
                            <span class="badge bg-warning"> {{ $item->status }}</span>
                        @elseif($item->status == 'Sedang Diproses')
                            <span class="badge bg-success"> {{ $item->status }}</span>
                        @elseif($item->status == 'Disetujui')
                            <span class="badge bg-info"> {{ $item->status }}</span>
                        @elseif($item->status == 'Tidak DIsetujui')
                            <span class="badge bg-danger"> {{ $item->status }}</span>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
