<!-- resources/views/profile.blade.php -->
@extends('layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 100px;">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Profile</h4>
                    </div>
                    <div class="card-body">
                        @if(session('message'))
                            <div class="alert alert-info">{{ session('message') }}</div>
                        @endif
                        <form action="{{route('profil.update',  $user->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                                <small class="form-text text-muted">Biarkan kalo tidak ingin mengganti password</small>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{$user->nama}}" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{$user->tanggal_lahir}}" required>
                            </div>
                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{$user->lokasi}}" required>
                            </div>
                            <div class="form-group">
                                <label for="lokasi">Keahlian</label>
                                <input type="text" class="form-control" id="keahlian" name="keahlian" value="{{$user->keahlian}}" required>
                            </div>
                            <div class="form-group">
                                <label for="riwayat_pendidikan">Riwayat Pendidikan</label>
                                <textarea class="form-control" id="riwayat_pendidikan" name="riwayat_pendidikan" rows="3" required>{{$user->riwayat_pendidikan}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="sertifikat">Sertifikat (Upload File)</label>
                                <input type="file" class="form-control-file" id="sertifikat" name="sertifikat">
                                <small class="form-text text-muted">Upload your certificate file (optional).</small>
                                @if(isset($user->file_name))
                                    <img src="{{$user->file_path.'/'.$user->file_name}}" alt="" width="300" height="320">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @endsection