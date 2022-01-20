@extends('layouts.master')

@section('title', 'Routes')

@section('content')

<div class="routes">
    <div class="overseas" style="padding-bottom: 5%">
        <h1 style="color: white; text-align: center; padding: 1% 0;">OVERSEAS</h1>
        <div class="rute">
            @foreach ($overseas as $ov)
            <div class="info">
                <img src="{{ $ov->image }}">
                <h3 style="text-align:center; margin-bottom: 2%;">Destination {{ $ov->id }}</h3>
                <h3>Origin : {{ $ov->destination_origin }}</h3>
                <h3>Destination : {{ $ov->destination_name }}</h3>
                <h3>Price : Rp {{ $ov->destination_price }},-</h3>
                <h3>Duration : {{ $ov->destination_duration }}</h3>
            </div>
            @endforeach
        </div>
    </div>
    <div class="domestic" style="padding-bottom: 5%">
        <h1 style="color: white; text-align: center; padding: 2% 0;">DOMESTIC</h1>
        <div class="rute">
            @foreach ($domestic as $dom)
            <div class="info">
                <img src="{{ $dom->image }}">
                <h3 style="text-align:center; margin-bottom: 2%;">Destination {{ $dom->id }}</h3>
                <h3>Origin : {{ $dom->destination_origin }}</h3>
                <h3>Destination : {{ $dom->destination_name }}</h3>
                <h3>Price : Rp {{ $dom->destination_price }},-</h3>
                <h3>Duration : {{ $dom->destination_duration }}</h3>
            </div>
            @endforeach
        </div>
    </div>
</div>

@if (Auth::user()->role != 'admin')
    <div class="order-data">
        <table class="table" style="height: 20vh; width: 95vw; margin: 3% 2%;">
            <h1 style="text-align: center; padding-top: 1%;">Your Order</h1>
            <thead>
                <th>Category</th>
                <th>Destination</th>
                <th>Price</th>
                <th>Duration</th>
                <th>People</th>
                <th>Option</th>
            </thead>

            <tbody>
                <?php $sum = 0; ?>
                @forelse ($orderData as $d)
                <tr>
                    <td>{{ $d->destination_category }}</td>
                    <td>{{ $d->destination_name }}</td>
                    <td>Rp {{ $d->destination_price }},-</td>
                    <td>{{ $d->destination_duration }}</td>
                    <td>{{ $d->quantity }}</td>
                    <input type="hidden" value="{{ $sum+= $d->destination_price*$d->quantity }}">
                    <td><a class="btn btn-danger" href="route/delete{{ $d->id }}">DELETE</a></td>
                </tr>

                @empty
                <td colspan="2">
                    No order yet...
                </td>
                @endforelse
            </tbody>
        </table>
        <p style="margin-left: 85%;">Grand Total {{ $sum }},-</p>

            <div class="order" style="margin-top: 5%; padding: 0 5%;">
                <h3>Input your order</h3>
                <form action="route/store" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        Destination <br>
                        <input type="number" name="destination_id" required="required"> <br/>
                    </div>

                    <div class="form-group">
                        People <br>
                        <input type="number" name="quantity" required="required"> <br/>
                    </div>

                    <input type="submit" value="Upload" class="btn btn-primary" style="background-color:green; color: white; padding: 0.5% 1%; margin-left:44%; margin-bottom: 2%">

                </form>

            </div>
    </div>
@endif

@endsection
