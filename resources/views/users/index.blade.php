@extends('layouts.masterOwner')
@section('content')

    <style>
        /*this part for table mobile mode that can't add in external file (responsiveTable) or if can should duplicate many files of css*/
        @media only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px) {

            td:nth-of-type(1):before {
                content: "user";
            }

            td:nth-of-type(2):before {
                content: "order";
            }
        }

    </style>

    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">
                <header>
                    <h2>Users - Orders</h2>
                </header>
                <br><br>
                <div id="item">
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