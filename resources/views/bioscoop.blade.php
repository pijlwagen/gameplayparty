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
                    <div class="fotorama">
                        @foreach($bios->photos() as $image)
                            <img src="{{ asset('images/' . $image->file) }}" alt="Foto">
                        @endforeach
                    </div>
                    <span><i class="fas fa-home"></i> {{ $bios->address }}</span><br>
                    <span><i class="fas fa-map-marker-alt"></i> {{ $bios->zip }} {{ $bios->city }}</span><br>
                    <span><i class="fas fa-phone"></i> {{ $bios->phone }}</span><br>
                    <a href="https://www.google.com/maps/place/{{ str_replace(' ', '+', $bios->address) }},+{{ $bios->city }}"
                       class="text-right" target="_blank"><i class="fas fa-route"></i> Route plannen</a>
                </div>
            </div>
        </div>
        <h2>Reserveren</h2>
        <hr>
        <form action="{{ route('bios.reservations.show', $bios->slug) }}" method="GET">
            <div class="form-group row">
                <div class="col-8">
                    <label for="time">Selecteer een tijd</label>
                    <select name="timeFrame" id="time" class="form-control">
                        @foreach($times as $time)
                            @php
                                $date = \Carbon\Carbon::parse($time->start)->format('l m F Y');
                                $start = \Carbon\Carbon::parse($time->start)->format('H:i');
                                $end = \Carbon\Carbon::parse($time->end)->format('H:i');
                            @endphp
                            <option value="{{ $time->id }}"><b>{{ $time->zaal }}: </b>{{ $date }} van {{ $start }} tot {{ $end }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for=""></label>
                    <button class="btn btn-primary w-100 mt-2">Reserveren</button>
                </div>
            </div>
        </form>
        <h2>Zalen</h2>
        <hr>
        <div class="row">
            @foreach($zalen as $zaal)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <b>{{ $zaal->name }}</b>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7">
                                    <p><b>Zitplaatsen:</b></p>
                                    <p><b>Rolstoelzitplaatsen:</b></p>
                                    <p><b>Dolby:</b></p>
                                    <p><b>Dolby Atmos:</b></p>
                                    <p><b>3D:</b></p>
                                    <p><b>Laser Ultra:</b></p>
                                </div>
                                <div class="col-5">
                                    <p>{{ $zaal->seats }}</p>
                                    <p>{{ $zaal->handicapped_seats }}</p>
                                    <p>{{ $zaal->dolby }}</p>
                                    <p>{{ $zaal->atmos ? 'Ja' : 'Nee' }}</p>
                                    <p>{{ $zaal->{'3d'} ? 'Ja' : 'Nee' }}</p>
                                    <p>{{ $zaal->ultra ? 'Ja' : 'Nee' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
