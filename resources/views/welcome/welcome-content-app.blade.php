@extends('layouts.app')

@section('content')

<style>
    .body{
        display: flex;
        flex-direction: column;
        justify-content: start;
        align-items: center;
        background-color: rgb(224, 224, 224);
    }

</style>

<body class="body">
    @include('components.navigation')
    @yield('welcome-content')
</body>

@endsection