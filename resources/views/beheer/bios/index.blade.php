@extends('layouts.app')

@push('head')
    <link rel="stylesheet" href="{{ asset('libs/quill/quill.snow.css') }}">
@endpush

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('bios.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Nieuwe bioscoop</a>
                <table class="table table-striped table-hover table-borderless">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Naam</th>
                        <th>Stad</th>
                        <th>Acties</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($bioscopen as $bios)
                        <tr>
                            <th>{{ $bios->id }}</th>
                            <td>{{ $bios->name }}</td>
                            <td>/{{ $bios->city }}</td>
                            <td>
                                {{--<a href="{{ route('cms.edit', $page) }}" class="mr-2"><i class="fas fa-edit"></i></a>--}}
                                {{--<a href="/{{ $page->url }}" class="mr-2"><i class="fas fa-eye text-info"></i></a>--}}
                                {{--<a href="#" onclick="event.preventDefault(); $('#delete-{{ $page->id }}').submit()"><i class="fas fa-trash text-danger"></i></a>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{--@foreach ($pages as $page)--}}
{{--        <form action="{{ route('cms.delete', $page) }}" id="delete-{{ $page->id }}" method="POST">--}}
            {{--@csrf--}}
            {{--<input type="text" value="{{ $page->id }}" id="page" hidden>--}}
        {{--</form>--}}
    {{--@endforeach--}}
@stop