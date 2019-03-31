@extends('layouts.masterOwner')
@section('content')

    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">
                <header>
                    <h2>Create new item</h2>
                </header>

                <form action="/dashboard/items" method="post">
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
                        <label for="price">price</label>
                        <input class="form-control" name="price" id="price"
                               type="text">
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="quantity">quantity</label>
                        <input  class="form-control" name="quantity" id="quantity"
                                type="text">
                    </div>


                    <br>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="custom-select" name="category_id">
                            @foreach($categories as $category)
                                <option  value="{{$category->id}}">{{ $category->name }}</option>
                            @endforeach
                        </select>


                    </div>

                    <br>
                    <div class="form-group">
                        <label for="disc">disc</label>
                        <input  class="form-control" name="disc" id="disc" type="text">
                    </div>

                    <br>
                    <input class="btn-warning form-control" type="submit">



                </form>




                <div class="col-8" id="item">


                    <!-- Main -->

                </div>
            </div>
        </div>
    </section>
@endsection