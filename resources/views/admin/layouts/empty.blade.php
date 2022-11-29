<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
{{ dd(\Illuminate\Support\Facades\Session::has('message')) }}
@if(Session::has('message'))
    <p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
<div class="container-fluid pt-2">
    @yield('content')
</div>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/bootstrap.bundle.js') }}"></script>
