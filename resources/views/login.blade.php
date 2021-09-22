@extends('template.autentikasi')
@section('containers')
<section>
    <div class="imgBx">
        <img src="https://images.unsplash.com/photo-1434626881859-194d67b2b86f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=753&q=80">
    </div>
    <div class="contentBx">
        <div class="formBx">
            <h3><strong>Sistem Antrian Puskesmas</strong></h3>
            <form method="post" action="{{ route('login') }}">
                @csrf
                @if(session('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Something it's wrong:
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
                @endif
                @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
                @endif
                <div class="inputBx">
                    <label for="inputEmail">Email</label>
                    <input type="text" name="email" id="inputEmail" class="form-control" required autofocus>
                </div>
                <div class="inputBx">
                    <label for="inputPassword">Password</label>
                    <input type="password" name="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" required>
                </div>
                <a href="{{ route('register') }}" style="margin-left: 1px"> Lupa password </a>
                <button class="btn btn-lg btn-primary" type="submit">
                    Masuk
                </button>
            </form>
            <br>
            <center><a href="{{ route('register') }}"> Daftar Akun </a></center>
        </div>
    </div>

</section>
@endsection
