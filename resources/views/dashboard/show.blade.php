@extends('layout')
@section('content')
<!-- Hero Section -->
<div class="hero">
    <h1>Project user {{$user->nama}}</h1>
</div>


<!-- Content -->

<div class="container mt-4">
    <h3>Nama: {{$user->nama}}</h3>
    <h3>Lokasi: {{$user->lokasi}}</h3>
    <h3>Riwayat Pendidikan: {{$user->riwayat_pendidikan}}</h3>
    <h3>Keahlian: {{$user->keahlian}}</h3>
    @if(isset($user->file_name))
        <img class="img-fluid my-3" src="{{$user->file_path.'/'.$user->file_name}}" alt="">
    @endif
    @if(session('message'))
        <div class="alert alert-info">{{ session('message') }}</div>
    @endif
    <div class="row">
        @foreach ($user->Projects as $project)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    @if(isset($project->file_name))
                    <img class="card-img-top" src="{{$project->file_path.'/'.$project->file_name}}" alt="" width="100" height="120">
                    @endif
                    <h5 class="card-title">{{$project->nama_projek}}</h5>
                    <h5 class="card-title">{{$project->deskripsi_projek}}</h5>
                    <p class="card-text">{{$project->tujuan_projek}}</p>
                    <div class="">
                        <a href="{{route('project.show', $project->id)}}" class="btn btn-primary">detail</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection