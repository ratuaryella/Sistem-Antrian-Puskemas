@extends('template.autentikasi')
@section('containers')
<section>
    <div class="imgBx">
        <img src="https://images.unsplash.com/photo-1434626881859-194d67b2b86f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=753&q=80">
    </div>
    <div class="contentBx">
        <div class="formBx">
            <h3><strong>Sistem Antrian Puskesmas</strong></h3>
            <form method="post">
                <div class="inputBx">
                    <label for="inputName">Name</label>
                    <input type="text" name="name" id="inputName" class="form-control" required autofocus>
                </div>
                <div class="inputBx">
                    <label for="inputEmail">Email</label>
                    <input type="text" name="email" id="inputEmail" class="form-control" required autofocus>
                </div>
                <div class="inputBx">
                    <label for="inputNomorInduk">Nomor Induk Kependudukan</label>
                    <input type="text" name="nomor_induk" id="inputNomorInduk" class="form-control" required autofocus>
                </div>
                <div class="inputBx">
                    <label for="inputPassword">Password</label>
                    <input type="password" name="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="inputBx">
                    <label for="inputPassword">Confirm Password</label>
                    <input type="password" name="password" id="password_confirmation" class="form-control  @error('password') is-invalid @enderror" required>
                </div>

                <button class="btn btn-lg btn-primary" type="submit">
                    Masuk
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
