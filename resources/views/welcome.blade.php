@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid jumbotron-home-bg text-white text-center d-flex flex-column">
        <div class="container m-auto">
            <img src="/icon.svg" alt="" class="img-fluid">
            <br>
            <a href="/bioscopen" class="btn btn-primary mb-auto mx-auto pl-4 pr-4">
                Kies een bioscoop
            </a>
        </div>
    </div>
    <div class="container">
        {!! $page->render() !!}
    </div>
@stop