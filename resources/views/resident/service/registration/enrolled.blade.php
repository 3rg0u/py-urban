@extends('resident.app')


@section('content')


    @foreach ($services as $service)
        @include('resident.service.registration.components.card_sub', ['service' => $service])
    @endforeach
@endsection