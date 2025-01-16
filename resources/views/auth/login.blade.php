@extends('layouts.app')

@section('content')
<!-- Tambahkan CSS langsung di halaman login -->
<style>
    /* Importing fonts from Google */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

    /* Reseting */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background: #ecf0f3;
    }

    .wrapper {
    max-width: 350px;
    min-height: 500px;
    margin: 80px auto;
    padding: 40px 30px 30px 30px;
    background-color: #ecf0f3;
    border-radius: 15px;
    box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
    display: flex;
    flex-direction: column;
    align-items: center; /* Memusatkan konten secara horizontal */
    justify-content: center; /* Memusatkan konten secara vertikal */
}

.logo {
    display: flex;
    justify-content: center; /* Memusatkan gambar di dalam wrapper logo */
    margin-bottom: 20px;
}

.logo img {
    width: 90px; /* Memperbesar lebar gambar */
    height: 90px; /* Memperbesar tinggi gambar */
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0px 0px 3px #5f5f5f, 0px 0px 0px 5px #ecf0f3, 8px 8px 15px #a7aaa7, -8px -8px 15px #fff;
    transform: scale(1.2);
    transition: transform 0.3s ease-in-out;
}

.logo img:hover {
    transform: scale(1.3); /* Zoom lebih besar ketika hover */
}


    .wrapper .name {
        font-weight: 600;
        font-size: 1.4rem;
        letter-spacing: 1.3px;
        padding-left: 10px;
        color: #555;
    }

    .wrapper .form-field input {
        width: 100%;
        display: block;
        border: none;
        outline: none;
        background: none;
        font-size: 1.2rem;
        color: #666;
        padding: 10px 15px 10px 10px;
    }

    .wrapper .form-field {
        padding-left: 10px;
        margin-bottom: 20px;
        border-radius: 20px;
        box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
    }

    .wrapper .btn {
        box-shadow: none;
        width: 100%;
        height: 40px;
        background-color: #03A9F4;
        color: #fff;
        border-radius: 25px;
        box-shadow: 3px 3px 3px #b1b1b1, -3px -3px 3px #fff;
        letter-spacing: 1.3px;
    }

    .wrapper .btn:hover {
        background-color: #039BE5;
    }

    .wrapper a {
        text-decoration: none;
        font-size: 0.8rem;
        color: #03A9F4;
    }

    .wrapper a:hover {
        color: #039BE5;
    }

    @media(max-width: 380px) {
        .wrapper {
            margin: 30px 20px;
            padding: 40px 15px 15px 15px;
        }
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="wrapper">
                <div class="logo">
                    <img src="/modern/src/assets/images/logos/kesmas.jpg" alt="Logo puskesmas">
                </div>
                <div class="text-center mt-4 name">
                    PUSKESMASIN
                </div>
                <form method="POST" action="{{ route('login') }}" class="p-3 mt-3">
                    @csrf
                    <div class="form-field d-flex align-items-center">
                        <span class="far fa-user"></span>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <span class="fas fa-key"></span>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button class="btn btn-primary mt-3">Login</button>
                </form>
                <div class="text-center fs-6">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forget password?</a> or <a href="#">Sign up</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
