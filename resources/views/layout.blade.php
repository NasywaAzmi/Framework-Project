<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 56px;
            background-color: #f8f9fa;
        }
        .hero {
            background: url('https://source.unsplash.com/1600x400/?technology') no-repeat center center;
            background-size: cover;
            color: black;
            padding: 60px 0;
            text-align: center;
        }
        .card {
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        footer {
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #f1f1f1;
        padding: 10px 0;
        box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#">ByteCareers</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link"  href="{{ url('/dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/project') }}"><i class="fas fa-project-diagram"></i> Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/profil') }}"><i class="fas fa-user"></i> Profile</a>
            </li>
            <li class="nav-item">
                <form method="POST" action="/logout" style="display:none;" id='logoutForm'>
                    @csrf
                </form>
                <a class="nav-link" onclick="formSubmit()"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Hero Section -->
<div>
    @if(session('message'))
    <div class="alert alert-info">{{ session('message') }}</div>
@endif
</div>

@yield('content')

<footer class="text-center text-lg-start mt-4">
    <div class="text-center p-3">
        © 2024 ByteCareers
    </div>
</footer>

<script>
    function formSubmit(){
        event.preventDefault();
        document.getElementById("logoutForm").submit();
        return false;
    }
</script>
