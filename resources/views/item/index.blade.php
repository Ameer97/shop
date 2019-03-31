@extends('layouts.masterOwner')
@section('content')

    <style>
        td {
            height: 50px;
            width: 50px;
        }

        #cssTable td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">
                <header>
                    <h2>items</h2>

                    <a href="/dashboard/items/create">
                        <button type="button" class="btn btn-primary">Create</button>
                    </a>
                </header>




                <div class="col-8" id="item">


                    <!-- Main -->
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th>Decryption</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            @if($item->category->name != null)

                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->price}} $</td>
                                    <td>{{$item->quantity}}</td>


                                    <td>{{$item->category->name}}</td>
                                    <td>{{$item->disc}}</td>
                                    <td class="td">
                                        <div class="btn-group btn-group-sm">
                                            <a href="items/{{ $item->id  }}/edit">
                                                <button class="btn btn-primary">&nbsp; edit &nbsp;</button>
                                            </a>
                                            <form action="/dashboard/items/{{ $item->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-warning text-white">delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                            @endif

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection