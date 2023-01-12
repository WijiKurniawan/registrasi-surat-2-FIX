<div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Lihat Detail surat</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-3">
                        <label>Nomor Surat</label>
                    </div>
                    <div class="col-8">
                        {{ $item->nomor_surat }}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-3">
                        <label>Lihat Dokumen surat</label>
                    </div>
                    <div class="col-8">
                        <a href="{{ asset('/dokumen/suratkeluar/' . $item->dokumen) }}" target="_blank">{{ $item->dokumen }}
                        </a>
                    </div>
                </div><br>

                <br>
                <div class="row">
                    <div class="col-3">
                        <label>Agenda</label>
                    </div>
                    <div class="col-8">
                        {{ $item->agenda }}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-3">
                        <label>tanggal surat</label>
                    </div>
                    <div class="col-8">
                        {{ $item->tgl_surat }}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-3">
                        <label>penerima</label>
                    </div>
                    <div class="col-8">
                        {{ $item->penerima }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
