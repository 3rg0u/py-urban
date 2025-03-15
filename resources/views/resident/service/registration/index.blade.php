@extends('resident.app')


@section('content')


    @foreach ($services as $service)
        @include('resident.service.registration.components.card', ['service' => $service, 'type' => 'pernament'])
    @endforeach
@endsection