@extends('template.autentikasi')
@section('containers')

<div class="contentBx">
    <div class="formBx">
        <h3><strong>Sistem Antrian Puskesmas</strong></h3>
        <form method="post" action="{{ route('forgot-password') }}">
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

            <button class="btn btn-lg btn-primary" type="submit">
                Submit
            </button>
        </form>
        <br>
    </div>
</div>

</section>
@endsection
