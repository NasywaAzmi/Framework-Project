@extends('layout')
@section('content')
<div class="hero">
    <h1>Project anda</h1>
    <a href="{{route('project.create')}}" class="btn btn-primary">Tambah Project</a>
</div>

<!-- Content -->

<div class="container mt-2">
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
                    <div class="d-flex justify-content-around">
                        <a href="{{route('project.show', $project->id)}}" class="btn btn-primary">detail</a>
                        
                        <div class="d-flex">
                            <a href="{{route('project.edit', $project->id)}}" class="btn btn-warning mx-3"><i class="fas fa-edit" style="color:white"></i></a>

                            <form action="{{route('project.destroy', $project->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash" style="color:white"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>

@endsection
