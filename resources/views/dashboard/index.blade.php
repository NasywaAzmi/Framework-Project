@extends('layout')
<!-- Hero Section -->
@section('content')
<div class="hero">
    <h1>Selamat Datang Di ByteCareers</h1>
</div>

<!-- Content -->
<div class="container mt-4">
    <div class="row">

        @foreach ($users as $user)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{$user->nama}}</h5>
                    <h5 class="card-title">{{$user->email}}</h5>
                    <p class="card-text">{{$user->keahlian}}</p>
                    <div class="d-flex justify-content-around">
                        <a href="{{route('dashboard.show', $user->id)}}" class="btn btn-primary">Project terdahulu</a>
                        @role('admin')
                        <form action="{{route('user.destroy', $user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash" style="color:white"></i></button>
                        </form>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>
</div>

@endsection