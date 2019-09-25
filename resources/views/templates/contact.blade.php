@extends('layouts.app')

@push('head')
    <title>{{ env('APP_NAME') }} - {{ $page->title }}</title>
@endpush

@section('content')
    <div class="container">
        {!! $page->render() !!}
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Naam</label>
                <input type="text" name="name" id="name"
                       class="form-control @error('name') is-invalid @enderror" {{ old('name') }}>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="email">E-mail adres</label>
                    <input type="email" name="email" id="email"
                           class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="phone">Telefoon
                        <small class="text-muted">optioneel</small>
                    </label>
                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
                           value="{{ old('phone') }}">
                    @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="message">Bericht</label>
                <textarea name="message" id="message" cols="30" rows="5"
                          class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                @error('message')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary float-right">Verzenden</button>
            </div>
        </form>
    </div>
@endsection
