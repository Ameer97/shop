@extends('layouts.masterOwner')
@section('content')

    <!-- Highlights -->
    <section class="wrapper">
        <div class="inner">
            <header class="special">
                <h2>Shop Website</h2>
                <p>"Whoever said that money can’t buy happiness simply didn’t know where to go shopping.."</p>
            </header>
            <div class="highlights">
                <section>
                    <div class="content">
                        <header>
                            <a href="/dashboard/users" class="icon fa-user"><span class="label">Icon</span></a>
                            <h3> users list</h3>
                        </header>
                    </div>
                </section>
                <section>
                    <div class="content">
                        <header>
                            <a href="/dashboard/categories" class="icon fa-list"><span class="label">Icon</span></a>
                            <h3>categories list</h3>
                        </header>

                    </div>
                </section>
                <section>
                    <div class="content">
                        <header>
                            <a href="/dashboard/items" class="icon fa-shopping-bag"><span class="label">Icon</span></a>
                            <h3> items list</h3>
                        </header>

                    </div>
                </section>

            </div>
        </div>
    </section>


@endsection



