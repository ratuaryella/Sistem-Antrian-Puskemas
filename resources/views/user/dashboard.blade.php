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
        <form>
            <div class="mb-3">
                <label for="poli" class="form-label">Poli</label>
                <select class="form-select" id="poli-option">
                    <option selected>Silahkan pilih poli</option>
                    @foreach ($allPoli as $response)
                    <option value="{{ $response->id_poli }}"> {{ $response->nama }} </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

</section>
<script src="Api.js"></script>
@endsection
