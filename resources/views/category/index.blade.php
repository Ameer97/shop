@extends('layouts.masterOwner')
@section('content')
    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">
                <header>
                    <h2>Categories</h2>
                </header>
                <div class="col-8" id="item">

                    <!-- Main -->
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>Decryption</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->disc}}</td>
                                <td class="td">
                                    <div class="btn-group btn-group-sm">
                                        <a href="/dashboard/categories/{{ $category->id  }}/edit">
                                            <button class="btn btn-primary">&nbsp; edit &nbsp;</button>
                                        </a>
                                        <form action="/dashboard/categories/{{ $category->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-warning text-white">delete</button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                        <a href="/dashboard/categories/create"> <button type="button" class="btn btn-primary">Create</button></a>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection