@extends('layouts.home')
@section('home')

    <!-- Nav -->
    <nav id="menu">
        <ul class="links">
            <title>Owner</title>
            <li><a href="/">Home</a></li>
            <li><a href="/dashboard/items">items</a></li>
            <li><a href="/dashboard/categories">categories</a></li>
            <li><a href="/dashboard/users">users</a></li>
            <li><a href="/logout">-Logout</a></li>
        </ul>
    </nav>

    <!-- Heading -->
    <div id="heading">
        <h1>Owner</h1>
    </div>

    @yield('content')


@endsection

@section('script')
    @yield('vue')
@endsection


