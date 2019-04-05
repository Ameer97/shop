@extends('layouts.home')
@section('home')

    <link rel="stylesheet" href="/css/cart.css">


    <div id="cart">

        <!-- Nav -->
        <nav id="menu">
            <ul class="links">
                <li><a href="/">Home</a></li>
                <li><a href="/user/logout">logout</a></li>
            </ul>
        </nav>


        <!-- Heading -->
        <div id="heading">
            <h1>{{ \Illuminate\Support\Facades\Auth::user()->name }}</h1>


        </div>

        <!-- Main -->
        <section id="main" class="wrapper">
            <div class="inner">
                <div class="content">
                    <header>
                        <h2>Cart</h2>
                    </header>
                    <div id="item">
                        <div class="row justify-content-center">

                            <div class="wrapper">

                                <div class="table">
                                    <div hidden>{{$totalPrice =0}}</div>
                                    <div class="row header red">
                                        <div class="cell">item</div>
                                        <div class="cell">price</div>
                                        <div class="cell">quantity</div>
                                        <div class="cell">Total Price</div>

                                    </div>
                                    @foreach($itemsRequest as $itemRequest)
                                        <div class="row">
                                            <div class="cell"
                                                 data-title="item">{{$items->find($itemRequest['item_id'])->name}}</div>
                                            <div class="cell"
                                                 data-title="price">{{$itemPrice = $items->find($itemRequest['item_id'])->price}}
                                                $
                                            </div>
                                            <div class="cell"
                                                 data-title="quantity">{{$itemRequest['quantity_order']}}</div>
                                            <div class="cell"
                                                 data-title="total">{{$total= $itemPrice * $itemRequest['quantity_order']}}
                                                $
                                            </div>
                                            <div hidden>{{$totalPrice +=$total}}</div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col">
                                            <h3>Order Price : {{$totalPrice}} $</h3>
                                            <form action="/user/cart/order" method="post">
                                                @csrf
                                                <button class="icon fa-cart-arrow-down" type="submit">Buy</button>
                                                <button class="icon fa-window-close" type="button" onclick="goBack()">Cancel</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
@section('script')
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection

