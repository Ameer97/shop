@extends('layouts.masterOwner')
@section('content')


    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">
                <header>
                    <h2>Create new Category</h2>
                </header>

                <form action="/dashboard/categories" method="post">
                    @csrf
                    @include('layouts.err')
                    <br>
                    <div class="form-group">
                        <label for="name">name</label>
                        <input class="form-control" name="name" id="name"
                               type="text">
                    </div>



                    <br>
                    <div class="form-group">
                        <label for="disc">disc</label>
                        <input  class="form-control" name="disc" id="disc" type="text">
                    </div>

                    <br>
                    <input class="btn-warning form-control" type="submit">



                </form>





                </div>
            </div>
        </div>
    </section>
@endsection