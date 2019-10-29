@extends('layouts.app')

@push('head')
    <title>{{ env('APP_NAME') }} - Reserveren {{ $bios->name }}</title>
@endpush

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Reserveren - {{ $bios->name }}</h2>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <h3>Persoonsgegevens</h3>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="first-name">Voornaam</label>
                            <input type="text" class="form-control @error('first-name') is-invalid @enderror"
                                   name="first-name" value="{{ old('first-name') }}" id="first-name">
                            @error('first-name')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="last-name">Achternaam</label>
                            <input type="text" class="form-control @error('last-name') is-invalid @enderror"
                                   name="last-name" value="{{ old('last-name') }}" id="last-name">
                            @error('last-name')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-8">
                            <label for="email">E-mailadres</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                   id="email" value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="phone">Telefoonnnumer</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                   id="phone" value="{{ old('phone') }}">
                            @error('phone')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="address">Adres</label>
                            <input type="text" name="address" id="address" value="{{ old('address') }}"
                                   class="form-control @error('address') is-invalid @enderror">
                            @error('address')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label for="zip-code">Postcode</label>
                            <input type="text" name="zip-code" id="zip-code" value="{{ old('zip-code') }}"
                                   class="form-control @error('zip-code') is-invalid @enderror">
                            @error('zip-code')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="city">Stad</label>
                            <input type="text" name="city" id="city" value="{{ old('city') }}"
                                   class="form-control @error('city') is-invalid @enderror">
                            @error('city')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <h3>Tijdslot</h3>
                    <div class="form-group">
                        <label for="time">Selecteer een tijd</label>
                        <select name="time" id="time" class="form-control" v-on:change="pricePerPerson()">
                            @foreach($times as $time)
                                @php
                                    $date = \Carbon\Carbon::parse($time->start)->format('l d F Y');
                                    $start = \Carbon\Carbon::parse($time->start)->format('H:i');
                                    $end = \Carbon\Carbon::parse($time->end)->format('H:i');
                                @endphp
                                <option data-price="{{ $time->price }}"
                                    value="{{ $time->id }}" {{ !!($time->id == request()->query('timeFrame')) ? 'selected' : ''}}>
                                    <b>{{ $time->zaal }}: </b>{{ $date }} van {{ $start }} tot {{ $end }}</option>
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <h3>Aantal personen</h3>
                    <table class="table table-borderless">
                        <tr>
                            <td class="w-50">Normaal</td>
                            <td>&euro;<% tickets.normal.price.toFixed(2) %></td>
                            <td class="w-25">
                                <input type="number" class="form-control" name="normal" v-model="tickets.normal.amount"
                                       v-on:keyup="subTotal()" min="0">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">Kinderen t/m 11 jaar</td>
                            <td>&euro;<% tickets.kids.price.toFixed(2) %></td>
                            <td class="w-25">
                                <input type="number" class="form-control" name="kids" v-model="tickets.kids.amount"
                                       v-on:keyup="subTotal()" min="0">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">Jeugd 12 t/m 17 jaar</td>
                            <td>&euro;<% tickets.youth.price.toFixed(2) %></td>
                            <td class="w-25">
                                <input type="number" class="form-control" name="youth" v-model="tickets.youth.amount"
                                       v-on:keyup="subTotal()" min="0">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">65 Plus</td>
                            <td>&euro;<% tickets.elder.price.toFixed(2) %></td>
                            <td class="w-25">
                                <input type="number" class="form-control" name="elder" v-model="tickets.elder.amount"
                                       v-on:keyup="subTotal()" min="0">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">Studenten, CJP & BankGiro Loterij VIP-KAART</td>
                            <td>&euro;<% tickets.special.price.toFixed(2) %></td>
                            <td class="w-25">
                                <input type="number" class="form-control" name="special"
                                       v-model="tickets.special.amount" v-on:keyup="subTotal()" min="0">
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">Standaard prijs per persoon</td>
                            <td>&euro;<% pricePP.toFixed(2) %></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Subtotaal: &euro;<% tickets.total %></td>
                        </tr>
                    </table>
                    <div class="form-group">
                        <button class="btn btn-primary float-right">Naar betaling</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                pricePP: 0,
                tickets: {
                    normal: {
                        price: 10.80,
                        amount: 0,
                    },
                    kids: {
                        price: 6.50,
                        amount: 0,
                    },
                    youth: {
                        price: 8.50,
                        amount: 0,
                    },
                    elder: {
                        price: 9.00,
                        amount: 0,
                    },
                    special: {
                        price: 8.70,
                        amount: 0,
                    },
                    total: 0.00,
                }
            },
            watch: {
                pricePP: function () {
                    this.subTotal();
                },
                tickets: {
                    handler: function () {
                        let t = this.tickets;
                        if (t.normal.amount < 0) t.normal.amount = 0;
                        if (t.elder.amount < 0) t.elder.amount = 0;
                        if (t.kids.amount < 0) t.kids.amount = 0;
                        if (t.special.amount < 0) t.special.amount = 0;
                        if (t.youth.amount < 0) t.youth.amount = 0;
                    },
                    deep: true,
                }
            },
            created: function () {
                this.pricePP = parseInt($('#time option:selected').attr('data-price'));

            },
            methods: {
                pricePerPerson: function () {
                    this.pricePP = parseInt($('#time option:selected').attr('data-price'));
                },
                people: function () {
                    let t = this.tickets;
                    return parseInt(t.normal.amount) + parseInt(t.kids.amount) + parseInt(t.elder.amount) + parseInt(t.special.amount) + parseInt(t.youth.amount)
                },
                subTotal: function (int = false) {
                    let total = this.pricePP * this.people();
                    total = total + (this.tickets.normal.amount * this.tickets.normal.price);
                    total = total + (this.tickets.kids.amount * this.tickets.kids.price);
                    total = total + (this.tickets.youth.amount * this.tickets.youth.price);
                    total = total + (this.tickets.elder.amount * this.tickets.elder.price);
                    total = total + (this.tickets.special.amount * this.tickets.special.price);
                    if (int) return total;
                    this.tickets.total = total.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
            },
            delimiters: ["<%", "%>"]
        })
    </script>
@endpush
