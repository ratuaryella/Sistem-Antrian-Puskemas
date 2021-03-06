<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/user.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Antrian Puskesmas</title>



</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ">
        <div class="container-fluid">
            <a style="text-decoration:none" href="{{ route('/')  }}">
                <h3 class="navbar-brand">Puskesmas </h3>
            </a>
            <ul class="nav justify-content-end">


                <li class="nav-item">
                    <div class="wrap">
                        <a style="text-decoration:none; color: white" href="{{ route('/riwayat') }}">
                            {{ __('Riwayat') }}</a>
                    </div>

                </li>

                <li class="nav-item">
                    <div class="wrap">
                        <a href="{{ route('/logout') }}" class="button" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Keluar') }}</a>
                    </div>
                    <form id="logout-form" action="{{ route('/logout') }}" method="POST" class="d-none">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        @yield('containers')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
