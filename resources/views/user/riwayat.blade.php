@extends('template.user')
@section('containers')
<section>
    @foreach($riwayat as $riw)
    <div class="card text-center">
        <div class="card-header">
            Riwayat Antrian
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <td>Tanggal</td>
                    <td>: {{ $riw->tanggal }}</td>
                </tr>
                <tr>
                    <td>Nomor Antrian</td>
                    <td>: {{ $riw->no_antrian }}</td>
                </tr>
                <tr>
                    <td>Poli</td>
                    <td>: {{ $riw->nama }}</td>
                </tr>
                <tr>
                    <td>Nama Dokter</td>
                    <td>: {{ $riw->dokter }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    @if($riw->status == 3)
                    <td>: Batal</td>
                    @elseif($riw->status == 2)
                    <td>: Selesai</td>
                    @else
                    <td>: Dalam Proses</td>
                    @endif
                </tr>
            </table>
        </div>
    </div>
    @endforeach
</section>

@endsection
