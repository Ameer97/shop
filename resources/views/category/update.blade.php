@extends('layouts.masterOwner')
@section('content')

    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">
                <header>
                    <h2>update Category</h2>
                </header>

                @include('layouts.err')
                <form action="/dashboard/categories/{{ $category->id }}" method="post">
                    @csrf
                    @method('patch')
                    <br>
                    <div class="form-group">
                        <label for="name">name</label>
                        <input value="{{old('name',$category->name)}}" class="form-control" name="name" id="name"
                               type="text">
                    </div>


                    <br>
                    <div class="form-group">
                        <label for="disc">disc</label>
                        <input value="{{old('name',$category->disc)}}" class="form-control" name="disc" id="disc" type="text">
                    </div>


                    <br>
                    <div class="form-group justify-content-center">
                        <div class="col">
                            <input class="btn-warning form-control" type="submit">
                        </div>
                    </div>

                </form>




                <div class="col-8" id="item">


                    <!-- Main -->

                </div>
            </div>
        </div>
    </section>
@endsection