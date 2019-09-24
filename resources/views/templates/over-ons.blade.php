@extends('layouts.app')

@push('head')
    <title>{{ env('APP_NAME') }} - {{ $page->title }}</title>
@endpush

@section('content')
    <div class="container" id="background">
        <img src="{{ asset('logo.svg') }}" class="rounded mr-auto d-block img-fluid" alt="...">
        {!! $page->render() !!}
    </div>

@stop

