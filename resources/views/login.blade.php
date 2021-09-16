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
                    <label for="inputEmail">Email</label>
                    <input type="text" name="email" id="inputEmail" class="form-control" required autofocus>
                </div>
                <div class="inputBx">
                    <label for="inputPassword">Password</label>
                    <input type="password" name="password" id="inputPassword" class="form-control" required>
                </div>
                <button class="btn btn-lg btn-primary" type="submit">
                    Masuk
                </button>
            </form>
        </div>
    </div>
</section>
<script src="Api.js"></script>
@endsection
