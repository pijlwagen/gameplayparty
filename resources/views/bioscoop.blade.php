@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {!! $bios->description !!}
            </div>
            <div class="col-md-4 bg-dark rounded" style="color: #fff;">
                <div class="my-3">
                    <h3 class="text-center">{{ $bios->name }}</h3>
                    <img src="{{ asset('images/' . $bios->photos()->first()->file) }}" alt=""
                         class="img-fluid rounded mb-3">
                    <span>{{ $bios->address }}</span><br>
                    <span>{{ $bios->zip }} {{ $bios->city }}</span><br>
                    <a href="https://www.google.com/maps/place/{{ str_replace(' ', '+', $bios->address) }},+{{ $bios->city }}"
                       class="text-right" target="_blank">Route plannen <i class="fas fa-route"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
