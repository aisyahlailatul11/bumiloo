@extends('layouts.masterAdmin')

@section('content')
<div class="container-fluid">
    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Admin Dashboard</h2>
    </div>

    <!-- CARDS -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card card-custom p-4 border-0 shadow-sm">
                <div class="d-flex align-items-center">
                    <div class="p-3 bg-success bg-opacity-10 rounded-4 me-3 text-success">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-0">23</h2>
                        <small class="text-muted">Jumlah Kunjungan</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom p-4 border-0 shadow-sm">
                <div class="d-flex align-items-center">
                    <div class="p-3 bg-primary bg-opacity-10 rounded-4 me-3 text-primary">
                        <i class="fas fa-baby fa-2x"></i>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-0">2</h2>
                        <small class="text-muted">Jumlah Persalinan</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-custom p-4 border-0 shadow-sm">
                <div class="d-flex align-items-center">
                    <div class="p-3 bg-danger bg-opacity-10 rounded-4 me-3 text-danger">
                        <i class="fas fa-exclamation-triangle fa-2x"></i>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-0">7</h2>
                        <small class="text-muted">Jumlah Kelainan</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CHARTS -->
    <div class="row">
        <div class="col-md-6">
            <div class="card card-custom p-4 border-0 shadow-sm h-100 bg-pink-light">
                <h6 class="fw-bold mb-3">Jumlah Ibu Hamil per Trimester</h6>
                <div style="height:250px;"><canvas id="trimesterChart"></canvas></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-custom p-4 border-0 shadow-sm h-100 bg-pink-light">
                <h6 class="fw-bold mb-3">Jumlah Kunjungan Per Bulan</h6>
                <div style="height:250px;"><canvas id="kunjunganChart"></canvas></div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card card-custom p-4 border-0 shadow-sm h-100 bg-pink-light">
                <h6 class="fw-bold mb-3">Perbandingan Normal vs Kelainan</h6>
                <div style="height:250px;"><canvas id="barChart"></canvas></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-custom p-4 border-0 shadow-sm h-100 bg-pink-light">
                <h6 class="fw-bold mb-3">Kelainan Kehamilan per Bulan</h6>
                <div style="height:250px;"><canvas id="kelainanChart"></canvas></div>
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
                legend: { position: 'right' }
            }
        }
    });

    // LINE CHART (CUTE STYLE)
    const ctx2 = document.getElementById('kunjunganChart').getContext('2d');
    const gradient = ctx2.createLinearGradient(0, 0, 0, 250);
    gradient.addColorStop(0, 'rgba(248,117,170,0.4)');
    gradient.addColorStop(1, 'rgba(248,117,170,0)');

    new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agt','Sep','Okt','Nov','Des'],
            datasets: [{
                data: [30,45,35,60,80,70,90,85,60,75,80,95],
                borderColor: '#f875aa',
                borderWidth: 3,
                backgroundColor: gradient,
                fill: true,
                tension: 0.4,
                pointRadius: 5,
                pointBackgroundColor: '#f875aa'
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { display: false },
                x: { grid: { display: false } }
            }
        }
    });

    // BAR CHART
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: ['Trimester 1','Trimester 2','Trimester 3'],
            datasets: [
                { label: 'Normal', data: [10,15,20], backgroundColor: '#22c55e', borderRadius: 10 },
                { label: 'Ada Kelainan', data: [2,5,3], backgroundColor: '#ea580c', borderRadius: 10 }
            ]
        },
        options: {
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom' } },
            scales: { x: { grid: { display: false } }, y: { grid: { display: false } } }
        }
    });

    // LINE CHART (KELAINAN)
    const ctx4 = document.getElementById('kelainanChart').getContext('2d');
    const gradKelainan = ctx4.createLinearGradient(0, 0, 0, 250);
    gradKelainan.addColorStop(0, 'rgba(234,88,12,0.4)');
    gradKelainan.addColorStop(1, 'rgba(234,88,12,0)');

    new Chart(ctx4, {
        type: 'line',
        data: {
            labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agt','Sep','Okt','Nov','Des'],
            datasets: [{
                label: 'Kelainan Kehamilan',
                data: [5,10,15,20,25,30,35,40,30,20,10,5],
                borderColor: '#ea580c',
                borderWidth: 3,
                backgroundColor: gradKelainan,
                fill: true,
                tension: 0.4,
                pointRadius: 5,
                pointBackgroundColor: '#ea580c'
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { display: false },
                x: { grid: { display: false } }
            }
        }
    });
});
</script>
@endsection