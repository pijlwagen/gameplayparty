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
        <div class="row my-3">
            @if ($times->first())
                @foreach($times as $time)
                    <div class="col-md-4 mb-3">
                        <div class="card ad shadow-lg">
                            <div class="card-body text-center">
                                <h4>{{ $time->bios }}</h4>
                                <strong>{{ \Carbon\Carbon::parse($time->start)->formatLocalized('%A %e %B') }} van {{ \Carbon\Carbon::parse($time->start)->format('H:i') }} tot {{ \Carbon\Carbon::parse($time->end)->format('H:i') }}</strong>
                                <p></p>
                                <ul class="list-unstyled">
                                    @if ($time->atmos)
                                        <li><i class="fa fa-check text-primary"></i> Atmos</li>
                                    @endif
                                    @if ($time->{'3d'})
                                        <li><i class="fa fa-check text-primary"></i> 3D</li>
                                    @endif
                                    @if ($time->ultra)
                                        <li><i class="fa fa-check text-primary"></i> Laser Ultra</li>
                                    @else
                                        <li><i class="fa fa-check text-primary"></i> Laser</li>
                                    @endif
                                    <li><i class="fa fa-check text-primary"></i> Dolby {{ $time->dolby }}</li>
                                </ul>
                                <a href="{{ route('bios.reservations.show', [$time->biosID]) }}?timeFrame={{ $time->id }}" class="btn btn-primary">Reserveren</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="text-center w-100 my-5">
                    <h3>Er zijn geen tijden beschikbaar.</h3>
                </div>
            @endif
        </div>
    </div>
@stop
