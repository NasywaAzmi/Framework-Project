@extends('layout')
@section('content')
<!-- Project Header -->
<!-- <div class="project-header">
    <h1 class="text-dark">Create a New Project</h1>
    <p class="text-dark">Fill out the form below to create a new project.</p>
</div> -->

<!-- Project Form -->
<div class="container mt-4">
    <form action="{{route('project.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="projectTitle">Nama Project</label>
            <input type="text" class="form-control" name="nama_projek" id="projectTitle" placeholder="Masukkan Nama Project" required>
        </div>
        <div class="form-group">
            <label for="projectDescription">Deskripsi Project</label>
            <textarea class="form-control" id="projectDescription" name="deskripsi_projek" rows="3" placeholder="Masukkan Deskripsi Project" required></textarea>
        </div>
        <div class="form-group">
            <label for="projectObjectives">Tujuan</label>
            <textarea class="form-control" id="projectObjectives" name="tujuan_projek" rows="3" placeholder="Masukkan Tujuan Project " required></textarea>
        </div>
        <div class="form-group">
            <label for="startDate">Tanggal Dimulai</label>
            <input type="date" class="form-control" id="startDate" name="tanggal_dimulai" required>
        </div>
        <div class="form-group">
            <label for="endDate">Tanggal Selesai</label>
            <input type="date" class="form-control" id="endDate" name="tanggal_selesai" required>
        </div>
        <div class="form-group">
            <label for="projectDeliverables">Hasil Project</label>
            <textarea class="form-control" id="projectDeliverables" name="hasil_projek" rows="3" placeholder="Masukkan Hasil Project" required></textarea>
        </div>
        <div class="form-group">
            <label for="sertifikat">Foto dari Project</label>
            <input type="file" class="form-control-file" id="sertifikat" name="sertifikat">
             <small class="form-text text-muted">Masukkan bukti Project</small>
        </div>
        <button type="submit" class="btn btn-primary">Buat Project</button>
    </form>
</div>

<!-- Footer -->
@endsection