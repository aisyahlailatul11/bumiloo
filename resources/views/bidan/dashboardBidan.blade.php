@extends('layouts.masterBidan')


@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Bumiloo Dashboard</h2>
        </div>
    </div>


    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card card-custom p-4 border-0 shadow-sm">
                <div class="d-flex align-items-center">
                    <div class="p-3 bg-success bg-opacity-10 rounded-4 me-3 text-success">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-0">5</h2>
                        <small class="text-muted">Janji Hari Ini</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom p-4 border-0 shadow-sm">
                <div class="d-flex align-items-center">
                    <div class="p-3 bg-primary bg-opacity-10 rounded-4 me-3 text-primary">
                        <i class="fas fa-stethoscope fa-2x"></i>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-0">45</h2>
                        <small class="text-muted">Pemeriksaan Bulan Ini</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom p-4 border-0 shadow-sm">
                <div class="d-flex align-items-center">
                    <div class="p-3 bg-danger bg-opacity-10 rounded-4 me-3 text-danger">
                        <i class="fas fa-chart-line fa-2x"></i>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-0">1.41</h2>
                        <small class="text-muted">Rata-rata Kunjungan</small>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-7">
            <div class="card card-custom p-4 border-0 shadow-sm h-100">
                <h5 class="fw-bold mb-4">Janji Pemeriksaan Hari Ini</h5>
                <div class="table-responsive">
                    <table class="table table-borderless align-middle">
                        <tbody>
                            <tr>
                                <td class="text-muted small">09.00</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://ui-avatars.com/api/?name=Rini+Wulandari"
                                            class="rounded-circle me-3" width="40">
                                        <div><span class="fw-bold d-block">Rini Wulandari</span><small
                                                class="text-muted">18 Minggu 4 Hari</small></div>
                                    </div>
                                </td>
                                <td><span
                                        class="badge rounded-pill bg-danger bg-opacity-10 text-danger border border-danger px-3">Kontrol
                                        Rutin</span></td>
                            </tr>
                            <tr>
                                <td class="text-muted small">10.00</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://ui-avatars.com/api/?name=Siska+Putri"
                                            class="rounded-circle me-3" width="40">
                                        <div><span class="fw-bold d-block">Siska Putri</span><small
                                                class="text-muted">22 Minggu 1 Hari</small></div>
                                    </div>
                                </td>
                                <td><span
                                        class="badge rounded-pill bg-pink-light text-pink border border-pink px-3">Konsultasi</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 p-3 bg-pink-light rounded-4 d-flex align-items-center border border-pink">
                    <i class="fas fa-info-circle text-pink me-3 fs-3"></i>
                    <p class="mb-0 small">Ingatkan ibu hamil untuk mengonsumsi tablet tambah darah secara rutin.</p>
                </div>
            </div>
        </div>


        <div class="col-md-5">
            <div class="card card-custom p-4 border-0 shadow-sm mb-4">
                <h6 class="fw-bold mb-3">Jumlah Ibu Hamil per Trimester</h6>
                <div style="height: 200px;"><canvas id="trimesterChart"></canvas></div>
            </div>
            <div class="card card-custom p-4 border-0 shadow-sm">
                <h6 class="fw-bold mb-3">Jumlah Kunjungan Per Bulan</h6>
                <div style="height: 150px;"><canvas id="kunjunganChart"></canvas></div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    // PIE CHART
    const ctx1 = document.getElementById('trimesterChart').getContext('2d');
    new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: ['Tri 1', 'Tri 2', 'Tri 3'],
            datasets: [{
                data: [10, 15, 20],
                backgroundColor: ['#FFD700', '#9333EA', '#3B82F6'],
                borderWidth: 0
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right'
                }
            }
        }
    });


    // LINE CHART (AREA)
    const ctx2 = document.getElementById('kunjunganChart').getContext('2d');
    const gradient = ctx2.createLinearGradient(0, 0, 0, 150);
    gradient.addColorStop(0, 'rgba(246, 135, 179, 0.4)');
    gradient.addColorStop(1, 'rgba(246, 135, 179, 0)');


    new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov',
                'Des'],
            datasets: [{
                data: [30, 45, 35, 60, 80, 70, 90, 85, 60, 75, 80, 95],
                borderColor: '#f687b3',
                borderWidth: 3,
                backgroundColor: gradient,
                fill: true,
                tension: 0.4,
                pointRadius: 3,
                pointBackgroundColor: '#f687b3'
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    display: false
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
});
</script>
@endsection