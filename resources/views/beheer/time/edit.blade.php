@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Tijd aanpassen - {{ $zaal->name }}</h1>
            </div>
            <div class="card-body">
                <form action="{{ url()->current() }}" method="POST" id="submit-form">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="date">Datum</label>
                            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
                                   id="date"  value="{{ old('date', \Carbon\Carbon::parse($time->start)->format('Y-m-d')) }}">
                            @error('date')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="start">Starttijd</label>
                            <input type="time" name="start" class="form-control @error('start') is-invalid @enderror"
                                   id="start"  value="{{ old('start', \Carbon\Carbon::parse($time->start)->format('H:i')) }}">
                            @error('start')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="end">Eindtijd</label>
                            <input type="time" name="end" class="form-control @error('end') is-invalid @enderror"
                                   id="end"  value="{{ old('end', \Carbon\Carbon::parse($time->start)->format('H:i')) }}">
                            @error('end')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="price">Prijs per persoon</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">&euro;</div>
                                </div>
                                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="price" step="0.01" value="{{ old('price', $time->price) }}">
                                @error('price')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary mr-3">Opslaan</button>
                        <a href="javascript:addMore()" class="btn btn-primary mr-3">Opslaan & nieuwe toevoegen</a>
                        <a href="javascript:history.back()" class="btn btn-warning">Terug</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function addMore() {
            let $form = $('#submit-form');
            $form.attr('action',  $form.attr('action') + '?add=true');
            $form.submit();
        }
    </script>
@endpush
