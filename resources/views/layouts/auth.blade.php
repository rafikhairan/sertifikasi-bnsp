<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PMB</title>
  <link href="{{ asset('vendor/bootstrap-5.3.2-dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/DataTables-1.13.8/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
</head>
<body>
  <div class="container">
    @yield('content')
  </div>

  @stack('scripts')
</body>
</html>