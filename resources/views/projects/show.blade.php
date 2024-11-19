@extends('layout')
@section('content')

<!-- Hero Section -->
<div class="hero">
    <h1>{{$project->nama_projek}}</h1>
</div>

<!-- Content -->

<div class="container mt-4">

    <h2>Tujuan Projek: {{$project->tujuan_projek}}</h2>
    <p>Deskripsi Projek: {{$project->deskripsi_projek}}</p>
    <h4>Hasil Projek: {{$project->hasil_projek}}</h4>
    @if(isset($project->file_name))
    <img class="img-fluid" src="{{$project->file_path.'/'.$project->file_name}}" alt="">
    @endif


</div>
<div class="container mt-4 d-flex justify-content-around w-100">
    <h6>Tanggal Dimulai: {{$project->tanggal_dimulai}}</h6>
    <h6>Tanggal Selesai: {{$project->tanggal_selesai}}</h6>

</div>


@endsection