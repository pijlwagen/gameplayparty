@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('libs/quill/quill.snow.css') }}">
@endpush

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('cms.nieuw') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i>
                    Nieuwe pagina</a>
                <table class="table table-hover table-borderless">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titel</th>
                        <th>URL</th>
                        <th>Template</th>
                        <th>Acties</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($pages as $page)
                        <tr>
                            <th>{{ $page->id }}</th>
                            <td>{{ $page->title }}</td>
                            <td>/{{ $page->url }}</td>
                            <td>{{ $page->view }}</td>
                            <td>
                                <a href="{{ route('cms.edit', $page) }}" class="mr-2"><i class="fas fa-edit"></i></a>
                                <a href="/{{ $page->url }}" class="mr-2"><i class="fas fa-eye text-info"></i></a>
                                <a href="#"
                                   onclick="event.preventDefault(); return confirm('Weet u zeker dat u deze pagina wilt verwijderen?') ? $('#delete-{{ $page->id }}').submit() : false;"><i
                                        class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @foreach ($pages as $page)
        <form action="{{ route('cms.delete', $page) }}" id="delete-{{ $page->id }}" method="POST">
            @csrf
            <input type="text" value="{{ $page->id }}" id="page" hidden>
        </form>
    @endforeach
@stop
