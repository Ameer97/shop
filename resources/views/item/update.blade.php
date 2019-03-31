@extends('layouts.masterOwner')
@section('content')

    <!-- Main -->
    <section id="main" class="wrapper">
        <div class="inner">
            <div class="content">
                <header>
                    <h2>update item</h2>
                </header>

                @include('layouts.err')
                <form action="/dashboard/items/{{$item->id}}" method="post">
                    @csrf
                    @method('patch')
                    <br>
                    <div class="form-group">
                        <label for="name">name</label>
                        <input value="{{old('name',$item->name)}}" class="form-control" name="name" id="name"
                               type="text">
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="price">price</label>
                        <input value="{{old('name',$item->price)}}" class="form-control" name="price" id="price"
                               type="text">
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="quantity">quantity</label>
                        <input value="{{old('name',$item->quantity)}}" class="form-control" name="quantity" id="quantity"
                               type="text">
                    </div>

                    <br>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="custom-select" name="category_id">
                            @foreach($categories as $category)
                                <option {{$item->category_id == $category->id ? "selected" : ""}} value="{{$category->id}}">{{ $category->name }}</option>
                            @endforeach
                        </select>


                    </div>


                    <br>
                    <div class="form-group">
                        <label for="disc">disc</label>
                        <input value="{{old('name',$item->disc)}}" class="form-control" name="disc" id="disc" type="text">
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