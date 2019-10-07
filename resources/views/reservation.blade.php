@extends('layouts.app')

@push('head')
    <title>{{ env('APP_NAME') }} - Reserveren {{ $bios->name }}</title>
@endpush

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Reserveren - {{ $bios->name }}</h1>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="first-name">Voornaam</label>
                        <input type="text" class="form-control @error('first-name') is-invalid @enderror"
                               name="fist-name" value="{{ old('first-name') }}" id="first-name">
                        @error('first-name')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="last-name">Achternaam</label>
                        <input type="text" class="form-control @error('last-name') is-invalid @enderror"
                               name="last-name" value="{{ old('last-name') }}" id="last-name">
                        @error('last-name')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-8">
                        <label for="email">E-mailadres</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                               id="email" value="{{ old('email') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="phone">Telefoonnnumer</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                               id="phone" value="{{ old('phone') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="address">Adres</label>
                        <input type="text" name="address" id="address"
                               class="form-control @error('address') is-invalid @enderror">
                    </div>
                    <div class="col-md-2">
                        <label for="zip-code">Postcode</label>
                        <input type="text" name="zip-code" id="zip-code"
                               class="form-control @error('zip-code') is-invalid @enderror">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
