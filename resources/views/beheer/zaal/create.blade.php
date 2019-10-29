@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('libs/quill/quill.snow.css') }}">
@endpush

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST" id="submit-form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Naam</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                               class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">https://gameplayparty.nl/bioscopen/{{ $bios->slug }}
                                    /zalen/
                                </div>
                            </div>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                                   class="form-control @error('slug') is-invalid @enderror">
                            @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <small class="text-muted">Dit is hoe de zaal in de url komt te staan.</small>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="seats">Aantal zitplaatsen (Excl. gehandicapt)</label>
                            <input type="number" name="seats" id="seats" value="{{ old('seats', 0) }}"
                                   class="form-control @error('seats') is-invalid @enderror">
                            @error('seats')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="handi-seats">Aantal gehandicapten zitplaatsen</label>
                            <input type="number" name="handi-seats" id="handi-seats" value="{{ old('handi-seats', 0) }}"
                                   class="form-control @error('handi-seats') is-invalid @enderror">
                            @error('handi-seats')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="dolby">Dolby versie</label>
                            <select type="number" name="dolby" id="dolby"
                                    class="form-control @error('dolby') is-invalid @enderror">
                                <option value="5.1">Dolby 5.1</option>
                                <option value="7.1" {{ old('dolby') === '7.1' ? 'selected' : '' }}>Dolby 7.1</option>
                            </select>
                            @error('dolby')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="atmos"
                                       name="atmos" {{ old('atmos') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="atmos">Atmos</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="3d"
                                       name="3d" {{ old('3d') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="3d">3D</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ultra"
                                       name="ultra" {{ old('ultra') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="ultra">Laser Ultra</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary mr-3">Toevoegen</button>
                        <a href="javascript:history.back()" class="btn btn-warning">Terug</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

