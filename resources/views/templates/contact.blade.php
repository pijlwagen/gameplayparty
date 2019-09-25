@extends('layouts.app')

@push('head')
    <title>{{ env('APP_NAME') }} - {{ $bios->name }}</title>
@endpush

@section('content')
    <div class="container">
        <h1>{{ $bios->name }}</h1>
        <hr>
        <div class="row px-md-0 px-2">
            <div class="col-md-8">
                {!! $bios->description !!}
                @if (Auth::check() && ($bios->users()->where('user_id', Auth::user()->id)->first() || Auth::user()->isAdmin()))
                    <a href="{{ route('bios.edit', $bios) }}" target="_blank">Omscrhijving aanpassen</a>
                @endif
            </div>
            <div class="col-md-4 bg-dark rounded" style="color: #fff;">
                <div class="my-3">
                    <img src="{{ asset('images/' . $bios->photos()->first()->file) }}" alt=""
                         class="img-fluid rounded mb-3">
                    <span><i class="fas fa-home"></i> {{ $bios->address }}</span><br>
                    <span><i class="fas fa-map-marker-alt"></i> {{ $bios->zip }} {{ $bios->city }}</span><br>
                    <span><i class="fas fa-phone"></i> {{ $bios->phone }}</span><br>
                    <a href="https://www.google.com/maps/place/{{ str_replace(' ', '+', $bios->address) }},+{{ $bios->city }}"
                       class="text-right" target="_blank"><i class="fas fa-route"></i> Route plannen</a>
                </div>
            </div>
        </div>
    </div>
@endsection
