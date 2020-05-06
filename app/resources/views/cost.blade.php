@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <h4>Tablica z ValueDeliveryCosts</h4>

                <table class="table table-bordered table-sm">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Client name</th>
                        <th scope="col">Client Group</th>
                        <th scope="col" class="col-1">Payment</th>
                        <th scope="col" class="col-2">Value from</th>
                        <th scope="col" class="col-2">Value to</th>
                        <th scope="col" class="col-2">Cost</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($valueDeliveryCosts as $valueCost)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-left">{{ $valueCost->client->name }}</td>
                            <td class="text-center">{{ $valueCost->client_group }}</td>
                            <td class="text-center">{{ $valueCost->payment }}</td>
                            <td class="text-right">{{ $valueCost->value_from }}</td>
                            <td class="text-right">{{ $valueCost->value_to }}</td>
                            <td class="text-right">{{ $valueCost->cost }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                <h4>Tablica z WeightDeliveryCost</h4>

                <table class="table table-bordered table-sm">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Client name</th>
                        <th scope="col">Client Group</th>
                        <th scope="col" class="col-1">Payment</th>
                        <th scope="col" class="col-2">Weight from</th>
                        <th scope="col" class="col-2">Weight to</th>
                        <th scope="col" class="col-2">Cost</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($weightDeliveryCosts as $weightCost)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-left">{{ $weightCost->client->name }}</td>
                            <td class="text-center">{{ $weightCost->client_group }}</td>
                            <td class="text-center">{{ $weightCost->payment }}</td>
                            <td class="text-right">{{ $weightCost->weight_from }}</td>
                            <td class="text-right">{{ $weightCost->weight_to }}</td>
                            <td class="text-right">{{ $weightCost->cost }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                <h4>Tablica z QuantityDeliveryCosts</h4>

                <table class="table table-bordered table-sm">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Client name</th>
                        <th scope="col">Client Group</th>
                        <th scope="col" class="col-1">Payment</th>
                        <th scope="col" class="col-2">Quantity from</th>
                        <th scope="col" class="col-2">Quantity to</th>
                        <th scope="col" class="col-2">Cost</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($quantityDeliveryCosts as $quantityCost)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-left">{{ $quantityCost->client->name }}</td>
                            <td class="text-center">{{ $quantityCost->client_group }}</td>
                            <td class="text-center">{{ $quantityCost->payment }}</td>
                            <td class="text-right">{{ $quantityCost->quantity_from }}</td>
                            <td class="text-right">{{ $quantityCost->quantity_to }}</td>
                            <td class="text-right">{{ $quantityCost->cost }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                <h4>Zlecenie</h4>

                <table class="table table-bordered table-sm">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Numer</th>
                        <th scope="col">Client name</th>
                        <th scope="col">Payment</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-right">{{ $order->id }}</td>
                            <td class="text-center">{{ $order->client->name }}</td>
                            <td class="text-center">{{ $order->payment }}</td>
                        </tr>

                    </tbody>
                </table>

                <table class="table table-bordered table-sm">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Weight</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">calc_value</th>
                        <th scope="col">calc_weight</th>
                        <th scope="col">calc_quantity</th>
                        <th scope="col">calc_individual</th>
                        <th scope="col">Cost per piece</th>
                        <th scope="col">Flat cost</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($order->lines as $line)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-left text-nowrap">{{ $line->product->name }}</td>
                            <td class="text-left text-nowrap">{{ $line->product->description }}</td>
                            <td class="text-right">{{ $line->product->weight }}</td>
                            <td class="text-right">{{ $line->quantity }}</td>
                            <td class="text-right">{{ $line->price }}</td>
                            <td class="text-center">{{ $line->product->calculate_value_cost }}</td>
                            <td class="text-center">{{ $line->product->calculate_weight_cost }}</td>
                            <td class="text-center">{{ $line->product->calculate_quantity_cost }}</td>
                            <td class="text-center">{{ $line->product->calculate_individual_cost }}</td>
                            <td class="text-right">{{ $line->product->cost_per_piece }}</td>
                            <td class="text-right">{{ $line->product->flat_cost }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

                <h4>Wyliczony koszt</h4>

                <div class="alert alert-success" role="alert">
                    {{ number_format($cost, 2)}}
                </div>

            </div>
        </div>
    </div>
@endsection
