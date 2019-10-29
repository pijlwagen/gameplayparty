@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3> Opbrengsten {{ \Carbon\Carbon::now()->subMonth()->format('F Y') }}</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th>Aanbetalingen</th>
                                <td>&euro;{{ number_format($previous['pre']->sum('amount'), 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Totaal</th>
                                <td>&euro;{{ number_format($previous['total'] , 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Reserveringen</th>
                                <td>{{ $previous['pre']->count() }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            Opbrengsten {{ \Carbon\Carbon::now()->format('F Y') }}
                            [{{((($current['total'] - $previous['total']) / $current['total']) * 100) > 0 ? '+' : '-'  }}{{ number_format((($current['total'] - $previous['total']) / $current['total']) * 100, 0) }}%]
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th>Aanbetalingen</th>
                                <td>&euro;{{ number_format($current['pre']->sum('amount'), 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Totaal</th>
                                <td>&euro;{{ number_format($current['total'] , 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Reserveringen</th>
                                <td>{{ $current['pre']->count() }} [{{ $current['pre']->count() > $previous['pre']->count() ? '+' : '-' }}{{ (($current['pre']->count() - $previous['pre']->count()) / $current['pre']->count()) * 100 }}%]</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
