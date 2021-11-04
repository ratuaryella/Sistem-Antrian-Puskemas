@extends('template.autentikasi')
@section('containers')

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

            <button class="btn btn-lg btn-primary" type="submit">
                Masuk
            </button>
        </form>
        <form action="{{ route('register') }}">
            <button type="submit" class="btn btn-lg btn-primary">Registrasi</button>
        </form>

        <br>
        <a href="{{ route('forgot-password') }}" style="margin-left: 1px"> Lupa password </a>
        <center>
    </div>
</div>

</section>
@endsection
