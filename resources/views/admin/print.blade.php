<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/navbar.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <title>Sistem Informasi Antrian Puskesmas</title>
</head>
<body onload="window.print()">
<section>

    <div class="card text-center">
        <div class="card-header">
            Nomor Antrian Anda
        </div>
        <div class="card-body">
            <h1 class="card-title">{{ $antrians->no_antrian }}</h1>
                                @foreach ($polis as $poli)
                                    @if($antrians->id_poli == $poli->id_poli)
                                        <p>Anda mengantri untuk {{ $poli->nama }}</p>
                                    @endif
                                @endforeach
            <h5>Tanggal : {{ $antrians->tanggal }}</h5>
        </div>
    </div>
</body>


