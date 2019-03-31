@extends('layouts.masterOwner')
@section('content')

    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">
                <header>
                    <h2>Users - Orders</h2>
                </header>
                <div class="col-8" id="item">
                    <div class="row justify-content-between">

                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Users</th>
                            <th>Orders</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)

                            <tr>
                                <td>{{$user->name}}</td>
                                <td>
                                    <select class="custom-select" id="">
                                        @foreach($user->orders as $order)

                                            <option name="quantity"
                                                    value="{{ $order->id }}">

                                                {{ $order->created_at }} : &nbsp
                                                @foreach($order->items as $item)

                                                    {{ $item->name }} :

                                                    {{ $item->pivot->quantity_order}}   &nbsp   ||   &nbsp

                                                @endforeach

                                            </option>

                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection