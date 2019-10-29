@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST" id="submit-form" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Naam</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $zaal->name) }}"
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
                            <input type="text" name="slug" id="slug" value="{{ old('slug',$zaal->slug) }}"
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
                            <input type="number" name="seats" id="seats" value="{{ old('seats', $zaal->seats) }}"
                                   class="form-control @error('seats') is-invalid @enderror">
                            @error('seats')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="handi-seats">Aantal gehandicapten zitplaatsen</label>
                            <input type="number" name="handi-seats" id="handi-seats" value="{{ old('handi-seats', $zaal->handicapped_seats) }}"
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
                                <option value="7.1" {{ old('dolby', $zaal->dolby) === '7.1' ? 'selected' : '' }}>Dolby 7.1</option>
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
                                       name="atmos" {{ old('atmos', $zaal->atmos) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="atmos">Atmos</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="3d"
                                       name="3d" {{ old('3d', $zaal->{'3d'}) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="3d">3D</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="ultra"
                                       name="ultra" {{ old('ultra', $zaal->ultra) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="ultra">Laser Ultra</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary mr-3">Opslaan</button>
                        <a href="javascript:history.back()" class="btn btn-warning">Terug</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h3>Tijden</h3>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <a href="{{ route('time.create', [$bios->id, $zaal->id]) }}" class="btn btn-primary float-right">Tijd toevoegen</a>
                    <table class="table table-hover table-borderless">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Start</th>
                            <th>Eind</th>
                            <th>Beschikbaar</th>
                            <th>Acties</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($times as $time)
                            <tr>
                                <th>{{ $time->id }}</th>
                                <td>{{ $time->start }}</td>
                                <td>{{ $time->end }}</td>
                                <td>{!! $time->available ? '<i class="fas fa-check text-success"></i>' : '<i class="fas fa-times text-danger"></i>' !!}</td>
                                <td>
                                    <a href="{{ route('time.edit', [$bios->id, $zaal->id, $time->id]) }}" class="mr-2"><i class="fas fa-edit"></i></a>
                                    @if (Auth::user()->isAdmin())
                                        <form action="{{ route('time.delete', [$bios->id, $zaal->id, $time->id]) }}" method="POST" id="delete-{{ $time->id }}" hidden>@csrf</form>
                                        <a href="#" onclick="event.preventDefault(); return confirm('Weet u zeker dat u dit tijdslot verwijderen?') ? $('#delete-{{ $time->id }}').submit() : false"><i
                                                class="fas fa-trash text-danger"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
