@extends('layouts.app')

@push('head')
    <title>{{ env('APP_NAME') }} - {{ $page->title }}</title>
@endpush

@section('content')
    <div class="container">
        {!! $page->render() !!}
        <div class="row">
            @foreach(\App\Models\Bioscoop::all() as $bios)
                <div class="col-lg-4 col-sm-6 mb-3 col-10 mx-auto mx-sm-0 hover text-center">
                    <a href="{{ route('bios.show', $bios->slug) }}">
                        <img src="{{ asset('images/' . $bios->photos()->first()->file) }}" class="img-fluid rounded" alt="">
                        <h2>{{ $bios->name }}</h2>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@stop