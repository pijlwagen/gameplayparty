@extends('layouts.app')

@push('head')
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
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
                                <div class="input-group-text">https://gameplayparty.nl/bioscopen/</div>
                            </div>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
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
                            <input type="text" name="city" id="city" value="{{ old('city') }}"
                                   class="form-control @error('city') is-invalid @enderror">
                            @error('city')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-5">
                            <label for="address">Adres</label>
                            <input type="text" name="address" id="address" value="{{ old('address') }}"
                                   class="form-control @error('address') is-invalid @enderror">
                            @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="zipcode">Postcode</label>
                            <input type="text" name="zipcode" id="zipcode" value="{{ old('zipcode') }}"
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
                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
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
                                {!! old('content') !!}
                            </div>
                            @if ($errors->has('content'))
                                <span class="text-danger" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                            </span>
                            @endif
                            <textarea name="content" id="content" cols="30" rows="10"
                                      hidden>{{ old('content') }}</textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="photo">Foto</label>
                        <input type="file" name="photos[]" id="photo" multiple
                               class="form-control-file @error('photos') is-invalid @enderror">
                        @error('photos')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <hr>
                    @if (Auth::user()->isAdmin())
                        <div class="form-group">
                            <label for="users">Gebruikers</label>
                            <select name="users[]" id="users" value="{{ old('users') }}" multiple
                                    class="form-control @error('users') is-invalid @enderror">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
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
                        <a href="#" class="btn btn-primary"
                           onclick="event.preventDefault(); $('#content').val(editor.root.innerHTML); $('#submit-form').submit();">Toevoegen</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
        <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
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
            [{'header': [1, 2, 3, 4, 5, 6, false]}, {'align': []}],,

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
