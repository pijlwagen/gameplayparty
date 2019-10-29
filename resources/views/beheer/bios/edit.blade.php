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
                        <input type="text" name="name" id="name" value="{{ old('name', $bios->name) }}"
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
                                <div class="input-group-text">https://gameplayparty.nl/bioscopen/</div>
                            </div>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $bios->slug) }}"
                                   class="form-control @error('slug') is-invalid @enderror">
                            @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <small class="text-muted">Dit is hoe de bioscoop in de url komt te staan.</small>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5">
                            <label for="city">Stad</label>
                            <input type="text" name="city" id="city" value="{{ old('city', $bios->city) }}"
                                   class="form-control @error('city') is-invalid @enderror">
                            @error('city')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-5">
                            <label for="address">Adres</label>
                            <input type="text" name="address" id="address" value="{{ old('address', $bios->address) }}"
                                   class="form-control @error('address') is-invalid @enderror">
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="zipcode">Postcode</label>
                            <input type="text" name="zipcode" id="zipcode" value="{{ old('zipcode', $bios->zip) }}"
                                   class="form-control @error('zipcode') is-invalid @enderror">
                            <small class="text-muted">Geen spaties</small>
                            @error('zipcode')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefoon</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $bios->phone) }}"
                               class="form-control @error('phone') is-invalid @enderror">
                        @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Omschrijving</label>
                        <div class="card">
                            <div id="toolbar"></div>
                            <div id="editor">
                                {!! old('content', $bios->description) !!}
                            </div>
                            @if ($errors->has('content'))
                                <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                            </span>
                            @endif
                            <textarea name="content" id="content" cols="30" rows="10"
                                      hidden>{{ old('content', $bios->description) }}</textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="photo">Foto</label>
                        <input type="file" name="photos[]" id="photos" multiple
                               class="form-control-file @error('photos') is-invalid @enderror">
                        @error('photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        @foreach($bios->photos() as $photo)
                            <img src="{{ asset('images/'. $photo->file) }}" style="max-width: 150px" alt="Foto"
                                 class="img-fluid my-3">
                            <input type="checkbox" value="{{ $photo->id }}" name="delete[]">
                        @endforeach
                    </div>
                    <hr>
                    @if (Auth::user()->isAdmin())
                        <div class="form-group">
                            <label for="users">Gebruikers</label>
                            <select name="users[]" id="users" value="{{ old('users') }}" multiple
                                    class="form-control @error('users') is-invalid @enderror">
                                @php($busers = $bios->users())
                                @foreach($users as $user)
                                    <option
                                        value="{{ $user->id }}" {{ $busers->where('user_id', $user->id)->first() ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('users')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    @endif
                    <div class="form-group">
                        <a href="#" class="btn btn-primary mr-3"
                           onclick="event.preventDefault(); $('#content').val(editor.root.innerHTML); $('#submit-form').submit();">Opslaan</a>
                        <a href="javascript:history.back()" class="btn btn-warning">Terug</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h3>Zalen</h3>
            </div>
            <div class="card-body">
                <a href="{{ route('zaal.create', $bios->id) }}" class="btn btn-primary float-right">Zaal toevoegen</a>
                <table class="table table-hover table-borderless">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Naam</th>
                        <th>Acties</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($zalen as $zaal)
                        <tr>
                            <th>{{ $zaal->id }}</th>
                            <td>{{ $zaal->name }}</td>
                            <td>
                                <a href="{{ route('zaal.edit', [$bios->id, $zaal->id]) }}" class="mr-2"><i class="fas fa-edit"></i></a>
                                @if (Auth::user()->isAdmin())
                                    <form action="{{ route('zaal.delete', [$bios->id, $zaal->id]) }}" method="POST" id="delete-{{ $zaal->id }}" hidden>@csrf</form>
                                    <a href="#" onclick="event.preventDefault(); return confirm('Weet u zeker dat u deze zaal wilt verwijderen?') ? $('#delete-{{ $zaal->id }}').submit() : false"><i
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
@endsection

@push('js')
    <script src="{{ asset('libs/quill/quill.js') }}"></script>
    <script>
        document.getElementsByName('form').onkeypress = function (e) {
            var key = e.charCode || e.keyCode || 0;
            if (key == 13) {
                e.preventDefault();
            }
        };

        var zipcode = $('#zipcode');
        zipcode.on('keyup', function () {
            if (zipcode.val().length > 6) {
                zipcode.val(zipcode.val().slice(0, 6))
            }
        });
    </script>
    <script>
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block', 'link'],

            [{'header': 1}, {'header': 2}],               // custom button values
            [{'list': 'ordered'}, {'list': 'bullet'}],

            [{'size': ['small', false, 'large', 'huge']}],  // custom dropdown
            [{'header': [1, 2, 3, 4, 5, 6, false]}, {'align': []}],

            ['clean']                                         // remove formatting button
        ];
        var options = {
            debug: 'info',
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'Typ hier uw text',
            readOnly: false,
            theme: 'snow'
        };

        var container = $('#editor').get(0);
        var editor = new Quill(container, options);
    </script>
@endpush
