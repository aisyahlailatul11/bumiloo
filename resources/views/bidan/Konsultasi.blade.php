@extends('layouts.masterBidan')


@section('content')
<div class="container-fluid">
    <h4 class="fw-bold mb-4">Konsultasi Bidan</h4>


    <div class="row">
        <div class="col-md-4">
            <div class="card card-custom border-0 shadow-sm">
                <div class="card-header bg-white border-0">
                    <h6 class="fw-bold mb-2 text-pink">Semua Chat</h6>
                    <input type="text" class="form-control search-bar" placeholder="Cari pasien...">
                </div>


                <div class="list-group list-group-flush">
                    @forelse ($konsultasis as $item)
                    <a href="{{ route('bidan.konsultasi.detail', $item->id) }}"
                        class="list-group-item list-group-item-action border-0 py-3">


                        <div class="d-flex align-items-center">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama_pasien) }}&background=f8b6d2&color=fff"
                                class="rounded-circle me-3" width="45">


                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <span class="fw-bold">{{ $item->nama_pasien }}</span>


                                    <small class="text-muted">
                                        {{ optional($item->updated_at)->format('H:i') ?? '-' }}
                                    </small>
                                </div>


                                <small class="text-muted d-block">
                                    {{ $item->pesanTerakhir->pesan ?? 'Belum ada pesan' }}
                                </small>
                            </div>
                        </div>
                    </a>
                    @empty
                    <div class="text-center p-4 text-muted">
                        Belum ada chat dari pasien.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>


        <div class="col-md-8">
            <div
                class="card card-custom border-0 shadow-sm h-100 d-flex align-items-center justify-content-center text-center p-5">
                <i class="fas fa-comments text-pink mb-3" style="font-size: 70px;"></i>
                <h5 class="fw-bold">Pilih salah satu percakapan</h5>
                <p class="text-muted mb-0">Chat pasien akan muncul setelah pasien mengirim konsultasi.</p>
            </div>
        </div>
    </div>
</div>
@endsection

