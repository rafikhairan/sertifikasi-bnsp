<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PMB</title>
    <link href="{{ asset('vendor/bootstrap-5.3.2-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/DataTables-1.13.8/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/select2-4.1.0-rc.0/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/select2-4.1.0-rc.0/dist/css/select2-bootstrap-5-theme.min.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
        <div class="container-fluid mx-5">
            <a class="navbar-brand" href="{{ route('home') }}">Aplikasi PMB</a>
            <span class="ms-auto">{{ auth()->user()->name }}</span>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row mx-5 g-0" style="height: 92vh">
            <div class="col-lg-2 py-3 border-end">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    @if (auth()->user()->is_admin) 
                    <li class="nav-item">
                        <a class="nav-link" href="/users">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('registrations.index') }}">Mahasiswa Baru</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('registrations.create') }}">Pendaftaran Mahasiswa Baru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('registrations.show', auth()->user()->id) }}">Status Pendaftaran</a>
                    </li>
                    @endif
                    <li class="nav-item mt-3">
                        <form action="{{ route('auth.logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
            <div class="col-10 py-3 ps-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/jQuery-3.7.0/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/DataTables-1.13.8/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/DataTables-1.13.8/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('vendor/select2-4.1.0-rc.0/dist/js/select2.min.js') }}"></script>
    @stack('scripts')
</body>
</html>