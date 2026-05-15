@extends('layouts.masterBidan')


@section('content')


<div class="container-fluid">
    <h4 class="fw-bold mb-4">Konsultasi Bidan</h4>


    <div class="row">


        <!-- SIDEBAR CHAT -->
        <div class="col-md-4">


            <div class="card card-custom border-0 shadow-sm">


                <div class="card-header bg-white border-0">
                    <h6 class="fw-bold mb-2 text-pink">Semua Chat</h6>


                    <input type="text" class="form-control search-bar" placeholder="Cari pasien...">
                </div>


                <div class="list-group list-group-flush">


                    @foreach ($konsultasis as $item)


                    <a href="{{ route('bidan.konsultasi.detail', $item->id) }}" class="list-group-item list-group-item-action border-0 py-3
                        {{ $konsultasi->id == $item->id ? 'active-chat' : '' }}">


                        <div class="d-flex align-items-center">


                            <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama_pasien) }}&background=f8b6d2&color=fff"
                                class="rounded-circle me-3" width="45">


                            <div class="flex-grow-1">


                                <div class="d-flex justify-content-between">
                                    <span class="fw-bold">
                                        {{ $item->nama_pasien }}
                                    </span>


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


                    @endforeach


                </div>


            </div>


        </div>


        <!-- ROOM CHAT -->
        <div class="col-md-8">


            <div class="card border-0 shadow-sm chat-card">


                <!-- HEADER -->
                <div class="chat-header border-bottom p-3 d-flex align-items-center">


                    <img src="https://ui-avatars.com/api/?name={{ urlencode($konsultasi->nama_pasien) }}&background=f8b6d2&color=fff"
                        class="rounded-circle me-3" width="50">


                    <div>
                        <h6 class="fw-bold mb-0">
                            {{ $konsultasi->nama_pasien }}
                        </h6>


                        <small class="text-success">
                            Online
                        </small>
                    </div>


                </div>


                <!-- BODY CHAT -->
                <div class="chat-body p-4">


                    @foreach ($konsultasi->pesan as $chat)


                    @if ($chat->pengirim == 'pasien')


                    <div class="message-left mb-3">


                        <div class="bubble-left">
                            {{ $chat->pesan }}
                        </div>


                        <br>


                        <small class="text-muted">
                            {{ $chat->created_at->format('H:i') }}
                        </small>


                    </div>


                    @else


                    <div class="message-right mb-3 text-end">


                        <div class="bubble-right">
                            {{ $chat->pesan }}
                        </div>


                        <br>


                        <small class="text-muted">
                            {{ $chat->created_at->format('H:i') }}
                        </small>


                    </div>


                    @endif


                    @endforeach


                </div>


                <!-- INPUT CHAT -->
                <div class="chat-footer border-top p-3">


                    <form action="{{ route('bidan.konsultasi.kirim', $konsultasi->id) }}" method="POST"
                        class="d-flex align-items-center">


                        @csrf


                        <button type="button" class="btn btn-light rounded-circle me-2">


                            <i class="fas fa-paperclip"></i>


                        </button>


                        <input type="text" name="pesan" class="form-control rounded-pill me-2"
                            placeholder="Tulis pesan..." required>


                        <button type="submit" class="btn text-white rounded-circle" style="background-color:#f687b3;">


                            <i class="fas fa-paper-plane"></i>


                        </button>


                    </form>


                </div>


            </div>


        </div>


    </div>
</div>


<style>
.active-chat {
    background-color: #fff0f6 !important;
    border-left: 5px solid #f687b3 !important;
}


.chat-card {
    height: 650px;
}


.chat-body {
    flex: 1;
    overflow-y: auto;
    background-color: #fafafa;
    height: 500px;
}


.bubble-left {
    display: inline-block;
    background-color: white;
    padding: 12px 16px;
    border-radius: 18px 18px 18px 5px;
    max-width: 70%;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
}


.bubble-right {
    display: inline-block;
    background-color: #f687b3;
    color: white;
    padding: 12px 16px;
    border-radius: 18px 18px 5px 18px;
    max-width: 70%;
}
</style>


@endsection

