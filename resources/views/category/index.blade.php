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
                content: "Description";
            }

            td:nth-of-type(4):before {
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
                        <div class="col">
                            <h2>Categories</h2>
                        </div>
                        <div class="col-6"></div>
                        <div class="col">
                            <a href="/dashboard/categories/create">
                                <button type="button" class="btn btn-primary">Create New Category</button>
                            </a>

                        </div>
                    </div>
                </header>
                <br><br>
                <div id="category">


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

                                    {{--Todo:change size of button from main css--}}

                                    <div class="row">
                                        <div class="col-12 col-md-5 col-lg-3">
                                            <a href="/dashboard/categories/{{ $category->id  }}/edit">
                                                <button class="btn btn-primary">&nbsp; edit &nbsp;</button>
                                            </a>
                                        </div>
                                        <div class="col-12 col-md-5 col-lg-3">
                                            <form action="/dashboard/categories/{{ $category->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-warning text-white">delete</button>
                                            </form>
                                        </div>
                                    </div>

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