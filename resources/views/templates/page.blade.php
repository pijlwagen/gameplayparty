@extends('layouts.app')

@push('head')
    <title>{{ env('APP_NAME') }} - {{ $page->title }}</title>
@endpush

@section('content')
    <div class="container">
        {!! $page->content !!}
    </div>
@stop