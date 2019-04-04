@extends('layouts.masterOwner')
@section('content')

    <style>
        /*this part for table mobile mode that can't add in external file (responsiveTable)
         or if it can, should duplicate many files of css*/

        @media only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px) {

            td:nth-of-type(1):before {
                content: "#";
            }

            td:nth-of-type(2):before {
                content: "Name";
            }

            td:nth-of-type(3):before {
                content: "Price";
            }

            td:nth-of-type(4):before {
                content: "Quantity";
            }

            td:nth-of-type(5):before {
                content: "Category";
            }

            td:nth-of-type(6):before {
                content: "Description";
            }

            td:nth-of-type(7):before {
                content: "Actions";
            }

            tr {
                padding-bottom: 20%;
            }
        }

    </style>

    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">
                <header>
                    <div class="row">


                        <div class="col"><h2>items</h2></div>
                        <div class="col-6"></div>
                        <div class="col">
                            <a href="/dashboard/items/create">
                                <button type="button" class="btn btn-primary">Create New Item</button>
                            </a>
                        </div>
                    </div>
                </header>
                <br><br>

                <div id="item">

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
                                    <td>{{$item->price}}$</td>
                                    <td>{{$item->quantity}}</td>


                                    <td>{{$item->category->name}}</td>
                                    <td>{{$item->disc}}</td>
                                    <td class="td">

                                        <a href="/dashboard/items/{{ $item->id  }}/edit">
                                            <button class="btn btn-primary">&nbsp; edit &nbsp;</button>
                                        </a>
                                        <form action="/dashboard/items/{{ $item->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-warning text-white">delete</button>
                                        </form>

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