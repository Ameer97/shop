@extends('layouts.home')
@section('home')

    <div id="user">

        <!-- Nav -->
        <nav id="menu">
            <ul class="links">
                <li><a href="/">Home</a></li>
                <li><a href="/user/logout">logout</a></li>
            </ul>
        </nav>


        <!-- Heading -->
        <div id="heading">
            <h1>@{{ loggedInUser }}</h1>


        </div>

        <!-- Main -->
        <section id="main" class="wrapper">
            <div class="inner">
                <div class="content">
                    <header>
                        <h2>items</h2>
                    </header>
                    <div class="col-8" id="item">
                        <div class="row justify-content-between">


                        </div>
                        {{--action="/order/create/new--}}
                        <form action="/user/cart" method="post">
                            @csrf

                            <input placeholder="Search here" type="text" v-model="search">

                            <button class="btn btn-primary icon fa-cart-arrow-down" type="submit" value="Submit">Add to Cart</button>
                            <br><br>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Category</th>
                                    <th>Decryption</th>
                                </tr>
                                </thead>
                                <tbody v-for="item in sortedAppointments">

                                <tr>
                                    <td>@{{ item.name }}</td>
                                    <td>@{{ item.price }} $</td>


                                    <td>
                                        <select class="custom-select" :name="item.id">

                                            <option value=""> Choose quantity</option>

                                            <option v-for="index in item.quantity" :value="[index]" :key="index">
                                                @{{ index }} : @{{ index * item.price }} $
                                            </option>

                                        </select>
                                    </td>


                                    <td>@{{ item.category.name }}</td>
                                    <td>@{{ item.disc }}</td>

                                </tr>

                                </tbody>

                            </table>


                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        let vue = new Vue({
            el: "#user",
            data: {
                items: [],
                categories: [],
                users: [],
                loggedInUser: "{{ \Illuminate\Support\Facades\Auth::user()->name }}",
                search: "",
            },
            methods: {
                getItems() {
                    axios.get('/user/dataJson').then(response => {
                        this.items = response.data.items;
                        this.categories = response.data.categories;
                        this.users = response.data.users;
                    }).catch(error => {
                        console.log(error);
                    });

                },
                sortArrays(arrays) {
                    return _.orderBy(arrays, 'price', 'asc');
                },
            },


            mounted() {
                this.getItems();
            },

            computed: {
                filteredList() {
                    return this.items.filter(item => {
                        return item.name.toLowerCase().includes(this.search.toLowerCase())
                    })
                },
                sortedAppointments() {
                    return this.filteredList.slice().sort(function (a, b) {
                        return b.price - a.price;


                    })
                },
            }


        });
    </script>
@endsection

