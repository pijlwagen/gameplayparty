@extends('layouts.app')

@push('head')
    <title>{{ env('APP_NAME') }} - Betaling {{ $bios->name }}</title>
@endpush

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Kies uw betaalmethode</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div id="paypal-button"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php($total = $reservation->total())
        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td>Omschrijving</td>
                                <td>Aantal</td>
                                <td>Prijs</td>
                                <td>Totaal</td>
                            </tr>
                            <tr>
                                <th>Aantal personen:</th>
                                <td>{{ $reservation->people() }}</td>
                            </tr>
                            @if ($reservation->kids > 0)
                                <tr>
                                    <th>Kinderen t/m 11 jaar:</th>
                                    <td>{{ $reservation->kids }}</td>
                                    <td>&euro;6,50</td>
                                    <td>{{ number_format($reservation->kids * 6.50, 2, ',', '.') }}</td>
                                </tr>
                            @endif
                            @if ($reservation->youth > 0)
                                <tr>
                                    <th>Jeugd 12 t/m 17 jaar:</th>
                                    <td>{{ $reservation->youth }}</td>
                                    <td>&euro;8,5</td>
                                    <td>&euro;{{ number_format($reservation->youth * 8.50, 2, ',', '.') }}</td>
                                </tr>
                            @endif
                            @if ($reservation->normal > 0)
                                <tr>
                                    <th>Normaal:</th>
                                    <td>{{ $reservation->normal }}</td>
                                    <td>&euro;10,80</td>
                                    <td>&euro;{{ number_format($reservation->normal * 10.80, 2, ',', '.') }}</td>
                                </tr>
                            @endif
                            @if ($reservation->elder > 0)
                                <tr>
                                    <th>65 Plus:</th>
                                    <td>{{ $reservation->elder }}</td>
                                    <td>&euro;9,00</td>
                                    <td>&euro;{{ number_format($reservation->elder * 9, 2, ',', '.') }}</td>
                                </tr>
                            @endif
                            @if ($reservation->special > 0)
                                <tr>
                                    <th>Studenten, CJP & BankGiro Loterij VIP-KAART:</th>
                                    <td>{{ $reservation->special }}</td>
                                    <td>&euro;8,70</td>
                                    <td>&euro;{{ number_format($reservation->kids * 8.70, 2, ',', '.') }}</td>
                                </tr>
                            @endif
                            @if ($zaal->{'3d'})
                                <tr>
                                    <th>3D toeslag (excl bril):</th>
                                    <td>{{ $reservation->people() }}</td>
                                    <td>&euro;0,50</td>
                                    <td>&euro;{{ number_format($reservation->people() * 0.50, 2, ',', '.') }}</td>
                                </tr>
                            @endif
                            @if ($zaal->atmos)
                                <tr>
                                    <th>Dolby Atmos toeslag:</th>
                                    <td>{{ $reservation->people() }}</td>
                                    <td>&euro;1,50</td>
                                    <td>&euro;{{ number_format($reservation->people() * 1.50, 2, ',', '.') }}</td>
                                </tr>
                            @endif
                            @if ($zaal->ultra)
                                <tr>
                                    <th>Laser Ultra toeslag:</th>
                                    <td>{{ $reservation->people() }}</td>
                                    <td>&euro;2,50</td>
                                    <td>&euro;{{ number_format($reservation->people() * 2.50, 2, ',', '.') }}</td>
                                </tr>
                            @endif
                            <tr>
                                <th>Prijs per persoon (Zaal):</th>
                                <td>{{ $reservation->people() }}</td>
                                <td>&euro;{{ number_format($time->price, 2, ',', '.') }}</td>
                                <td>&euro;{{ number_format($reservation->people() *  $time->price, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Subtotaal:</th>
                                <td></td>
                                <td></td>
                                <td>&euro;{{ number_format($total, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>BTW 21%:</th>
                                <td></td>
                                <td></td>
                                <td>&euro;{{ number_format($total / 100 * 21, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Online aanbetaling:</th>
                                <td></td>
                                <td></td>
                                <td>&euro;{{ number_format((($total / 100 * 21) + $total) / 100 * 25, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Te voldoen bij kassa:</th>
                                <td></td>
                                <td></td>
                                <td>&euro;{{ number_format((($total / 100 * 21) + $total) / 100 * 75, 2, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Totaal:</th>
                                <td></td>
                                <td></td>
                                <td>&euro;{{ number_format(($total / 100 * 21) + $total, 2, ',', '.') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
@endsection

@push('js')
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>

    <script>
        paypal.Button.render({
            env: 'sandbox',
            client: {
                sandbox: 'AXbcLONS7RfbfYkkrT8E15HCri81_ZWMd8rsIOrRI7poHlBDLjFVzZDyGZK6JwWX34j2VcC1ckCAg9G0',
                production: 'sike nigga you thought',
            },
            style: {
                size: 'medium',
                color: 'gold',
                shape: 'pill',
            },
            commit: true,

            payment: function (data, actions) {
                return actions.payment.create({
                    transactions: [{
                        amount: {
                            total: parseFloat('{{ (($total / 100 * 21) + $total) / 100 * 25 }}').toFixed(2),
                            currency: 'EUR'
                        }
                    }]
                });
            },
            // Execute the payment
            onAuthorize: function (data, actions) {
                return actions.payment.execute().then(function () {
                    fetch('{{ route('payment.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            paymentID: data.paymentID,
                            payerID: data.payerID,
                            reservationID: parseInt('{{ $reservation->id }}'),
                            amount: parseFloat('{{ (($total / 100 * 21) + $total) / 100 * 25 }}').toFixed(2),
                            _token: '{{ csrf_token() }}'
                        })
                    }).then(res => {
                        document.location = `{{ route('invoice') }}?paymentId=${data.paymentID}`
                    });
                    window.alert('Betaling succesvol! U word doorverwezen.');
                });
            }
        }, '#paypal-button');
    </script>
@endpush
