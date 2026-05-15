@extends('layouts.masterBidan')

@section('content')
<div class="container-lg mt-4">
    <h3 class="fw-bold mb-4 text-dark">Jadwal Bidan</h3>

    {{-- Card Statistik --}}
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm border-0" style="background-color:#d8f3dc;">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle p-3 me-3" style="background-color:#b7e4c7;">
                        <i class="fas fa-users" style="color:#2d6a4f;"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-0">Laporan Kunjungan</h6>
                        <p class="mb-0 text-success fw-semibold">8 Terjadwal</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0" style="background-color:#e9d8fd;">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle p-3 me-3" style="background-color:#d6bcfa;">
                        <i class="fas fa-baby" style="color:#6b46c1;"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-0">Jadwal Persalinan</h6>
                        <p class="mb-0 text-purple fw-semibold">2 Persalinan</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0" style="background-color:#d8f3dc;">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle p-3 me-3" style="background-color:#b7e4c7;">
                        <i class="fas fa-calendar-alt" style="color:#2d6a4f;"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-0">Jadwal Hari Ini</h6>
                        <p class="mb-0 text-success fw-semibold">8 Jadwal</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0" style="background-color:#ffe5b4;">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle p-3 me-3" style="background-color:#ffd580;">
                        <i class="fas fa-user-md" style="color:#cc8400;"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-0">Jadwal Pemeriksaan Kontrol</h6>
                        <p class="mb-0 text-warning fw-semibold">5 Ibu Hamil</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mt-3">
            <div class="card shadow-sm border-0" style="background-color:#caf0f8;">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle p-3 me-3" style="background-color:#ade8f4;">
                        <i class="fas fa-syringe" style="color:#0077b6;"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-0">Jadwal Imunisasi</h6>
                        <p class="mb-0 text-primary fw-semibold">1 Terjadwal</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Jadwal Bidan Hari Ini --}}
    <h5 class="fw-bold mb-3 text-dark">Jadwal Bidan Hari Ini</h5>
    <div class="card shadow-sm border-0 mb-2" style="background-color:#d8f3dc;">
        <div class="card-body">
            <strong>08.00 - 08.30 WIB</strong> — Pemeriksaan Ibu Hamil (Narindra Pratama)
            <span class="badge bg-success ms-2">Terjadwal</span>
        </div>
    </div>

    <div class="card shadow-sm border-0 mb-2" style="background-color:#e9d8fd;">
        <div class="card-body">
            <strong>09.30 - 11.00 WIB</strong> — Persalinan (Bia)
            <span class="badge bg-purple ms-2">Konfirmasi</span>
        </div>
    </div>

    <div class="card shadow-sm border-0 mb-2" style="background-color:#f8d7da;">
        <div class="card-body">
            <strong>08.30 - 09.00 WIB</strong> — Pemeriksaan Ibu Hamil (Kinanti)
            <span class="badge bg-danger ms-2">Batal</span>
        </div>
    </div>
</div>
@endsection