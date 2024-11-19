@extends('layout')
@section('content')

<!-- Project Form -->
<div class="container mt-4">
    <form action="{{route('project.update', $project->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="projectTitle">Nama Project</label>
            <input type="text" class="form-control" name="nama_projek" id="projectTitle" value="{{$project->nama_projek}}" placeholder="Masukkan Nama Project" required>
        </div>
        <div class="form-group">
            <label for="projectDescription">Deskripsi Project</label>
            <textarea class="form-control" id="projectDescription" name="deskripsi_projek" rows="3" placeholder="Masukkan Deskripsi Project" required>{{$project->deskripsi_projek}}</textarea>
        </div>
        <div class="form-group">
            <label for="projectObjectives">Tujuan</label>
            <textarea class="form-control" id="projectObjectives" name="tujuan_projek" rows="3" placeholder="Masukkan Tujuan Project " required>{{$project->tujuan_projek}}</textarea>
        </div>
        <div class="form-group">
            <label for="startDate">Tanggal Dimulai</label>
            <input type="date" class="form-control" id="startDate" name="tanggal_dimulai" value="{{$project->tanggal_dimulai}}" required>
        </div>
        <div class="form-group">
            <label for="endDate">Tanggal Selesai</label>
            <input type="date" class="form-control" id="endDate" name="tanggal_selesai" value="{{$project->tanggal_selesai}}" required>
        </div>
        <div class="form-group">
            <label for="projectDeliverables">Hasil Project</label>
            <textarea class="form-control" id="projectDeliverables" name="hasil_projek" rows="3" placeholder="Masukkan Hasil Project" required>{{$project->hasil_projek}}</textarea>
        </div>
        <div class="form-group">
            <label for="sertifikat">Foto dari Project</label>
            <input type="file" class="form-control-file" id="sertifikat" name="sertifikat">
             <small class="form-text text-muted">Masukkan bukti Project</small>
             @if(isset($project->file_name))
             <img src="{{$project->file_path.'/'.$project->file_name}}" alt="" width="300" height="320">
             @endif
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>

<!-- Footer -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/"></script>
@endsection