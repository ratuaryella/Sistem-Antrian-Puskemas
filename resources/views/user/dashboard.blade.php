@extends('template.user')
@section('containers')
<section>

    <div class="card text-center">
        <div class="card-header">
            Nomor Antrian Anda
        </div>
        <div class="card-body">
            <h1 class="card-title">2020</h1>
        </div>
    </div>

    <div class="col-antri">
        <h3>Ambil Antrian </h3>
        <hr>
        <form action="{{ route('posts.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="poli" class="form-label">Poli</label>
                <select class="form-select" id="id_poli" name="id_poli">
                    <option selected>Silahkan pilih poli</option>
                    @foreach ($allPoli as $poli)
                    <option value="{{ $poli->id_poli }}" name="id_poli"> {{ $poli->nama }} </option>
                    @endforeach
                </select>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

</section>
<script src="Api.js"></script>
@endsection
