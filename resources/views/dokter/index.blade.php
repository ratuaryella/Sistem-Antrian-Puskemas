@extends('template.user')
@section('containers')
<section>

    <div class="card">
        <div class="card-header text-center">
            Nomor Antrian
        </div>
        <div class="card-body text-center">
            <form action="{{ route('/ubah-status') }}" method="POST">
                {{ csrf_field() }}
                @foreach($current as $oneAntri)
                <h1 class="card-title">{{ $oneAntri->no_antrian }}</h1>
                <input type="hidden" name="id_antrian" value="{{$oneAntri->id_antrian}}" />

                <div class="float-end">
                    <button class="btn btn-success editbtn" type="submit">Selesai</button>
                </div>

                @endforeach
            </form>


        </div>
    </div>

    @php
    $i = 1;
    @endphp

    <div class="card">
        <div class="card-header">
            <h3>List Antrian</h3>
        </div>

        @foreach($allAntrian as $oneAntri)
        <div class="card-body">
            <tr>
                <td>{{ $i++ }}.</td>
                <td> {{ $oneAntri->no_antrian }}</td>
            </tr>
        </div>
        @endforeach

    </div>

</section>
<script src="Api.js"></script>
@endsection
