@extends('layouts.masterBidan')


@section('content')


<div class="container-lg mt-4">
    <h3 class="fw-bold mb-4 text-dark">Input Data Ibu Hamil</h3>


    <!-- Form Input -->
    <form action="{{ route('pasien.store') }}" method="POST" class="card shadow p-4 mb-4" id="formPasien">
        @csrf
        <input type="hidden" name="id" id="id_pasien">


        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">No. Pasien</label>
                <input type="text" name="no_pasien" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label class="form-label">NIK</label>
                <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Nama Pasien</label>
                <input type="text" name="nama_pasien" class="form-control" placeholder="Masukkan Nama">
            </div>
            <div class="col-md-6">
                <label class="form-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Umur</label>
                <input type="number" name="umur" class="form-control" placeholder="Umur">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-8">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat">
            </div>
            <div class="col-md-4">
                <label class="form-label">No. HP</label>
                <input type="text" name="no_hp" class="form-control" placeholder="Nomor HP">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-4">
               <label class="form-label">Pendidikan</label>
                <select name="pendidikan" class="form-select">
                    <option value="">-- Pilih Pendidikan --</option>
                    <option>SD</option>
                    <option>SMP</option>
                    <option>SMA</option>
                    <option>Perguruan Tinggi</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Agama</label>
                <select name="agama" class="form-select">
                    <option value="">-- Pilih Agama --</option>
                    <option>Islam</option>
                    <option>Kristen Katolik</option>
                    <option>Kristen Protestan</option>
                    <option>Hindu</option>
                    <option>Konghucu</option>
                    <option>Budha</option>
                </select>
            </div>
            <div class="col-md-4">
               <label class="form-label">Golongan Darah</label>
                <select name="golongan_darah" class="form-select">
                    <option value="">-- Pilih Golongan Darah --</option>
                    <option>A</option>
                    <option>B</option>
                    <option>AB</option>
                    <option>O</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan">
            </div>
            <div class="col-md-6">
                <label class="form-label">Nama Suami</label>
                <input type="text" name="nama_suami" class="form-control" placeholder="Nama Suami">
            </div>
        </div>


        <div class="d-flex justify-content-end gap-2">
            <button type="reset" class="btn btn-warning">Reset</button>
            <button type="submit" class="btn btn-success">+ Tambah</button>
            <a href="{{ route('bidan.inputPerkembangan') }}" class="btn" style="background-color:#f875aa; color:white;">
               Selanjutnya <i class="fas fa-angle-double-right"></i>
            </a>
        </div>
    </form>


<form action="{{ route('pasien.store') }}" method="POST" class="card shadow p-4 mb-4">
    @csrf
    <!-- isi inputan seperti yang sudah kamu buat -->
</form>


<!-- Tabel Daftar Ibu Hamil -->
<h5 class="fw-bold mb-3">Daftar Pasien Ibu Hamil</h5>
<table class="table table-bordered table-striped shadow">
    <thead style="background-color:#f875aa; color:white;">
        <tr>
            <th>No Pasien</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tgl Lahir</th>
            <th>Umur</th>
            <th>Alamat</th>
            <th>No HP</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pasien as $p)
        <tr onclick="isiForm({{ $p->id }})" style="cursor:pointer;">
            <td>{{ $p->no_pasien }}</td>
            <td>{{ $p->nik }}</td>
            <td>{{ $p->nama_pasien }}</td>
            <td>{{ $p->tempat_lahir }}</td>
            <td>{{ $p->tanggal_lahir }}</td>
            <td>{{ $p->umur }}</td>
            <td>{{ $p->alamat }}</td>
            <td>{{ $p->no_hp }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>


<script>
function isiForm(id) {
    fetch(`/pasien/${id}`)
        .then(res => res.json())
        .then(data => {
            document.querySelector('input[name="id"]').value = data.id;
            document.querySelector('input[name="no_pasien"]').value = data.no_pasien;
            document.querySelector('input[name="nik"]').value = data.nik;
            document.querySelector('input[name="nama_pasien"]').value = data.nama_pasien;
            document.querySelector('input[name="tempat_lahir"]').value = data.tempat_lahir;
            document.querySelector('input[name="tanggal_lahir"]').value = data.tanggal_lahir;
            document.querySelector('input[name="umur"]').value = data.umur;
            document.querySelector('input[name="alamat"]').value = data.alamat;
            document.querySelector('input[name="no_hp"]').value = data.no_hp;
            document.querySelector('select[name="pendidikan"]').value = data.pendidikan;
            document.querySelector('select[name="agama"]').value = data.agama;
            document.querySelector('select[name="golongan_darah"]').value = data.golongan_darah;
            document.querySelector('input[name="pekerjaan"]').value = data.pekerjaan;
            document.querySelector('input[name="nama_suami"]').value = data.nama_suami;
        });
}
</script>
@endsection

