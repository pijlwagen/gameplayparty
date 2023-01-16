@extends('layouts.app')

@push('head')
{{--    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">--}}
<link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST" id="submit-form">
                    @csrf
                    <div class="form-group">
                        <label for="title">Titel</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                               class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">https://gameplayparty.nl/</div>
                            </div>
                            <input type="text" name="url" id="url" value="{{ old('url') }}"
                                   class="form-control @error('title') is-invalid @enderror">
                        </div>
                        @error('url')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Content</label>
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

                    <div class="form-group">
                        <label for="view">Template</label>
                        <select name="view" id="view"
                                class="form-control @error('view') is-invalid @enderror">
                            @foreach($files as $file)
                                <option value="{{ $file }}">{{ $file }}</option>
                            @endforeach
                        </select>
                        @error('view')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

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
{{--        <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>--}}
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        document.getElementsByName('form').onkeypress = function (e) {
            var key = e.charCode || e.keyCode || 0;
            if (key == 13) {
                e.preventDefault();
            }
        }
    </script>
    <script>
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block', 'link'],

            [{'header': 1}, {'header': 2}],               // custom button values
            [{'list': 'ordered'}, {'list': 'bullet'}],

            [{'size': ['small', false, 'large', 'huge']}],  // custom dropdown
            [{'header': [1, 2, 3, 4, 5, 6, false]}, {'align': []}], ,

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
