@extends('layouts.home')
@section('home')

    <style>
        /*this part for table mobile mode that can't add in external file (responsiveTable) or if can should duplicate many files of css*/
        @media only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px) {

            td:nth-of-type(1):before {
                content: "Name";
            }

            td:nth-of-type(2):before {
                content: "Price";
            }

            td:nth-of-type(3):before {
                content: "Quantity";
            }

            td:nth-of-type(4):before {
                content: "Category";
            }

            td:nth-of-type(5):before {
                content: "Decryption";
            }

        }


    </style>


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
                    <div id="item">
                        <form action="/user/cart" method="post">
                            @csrf

                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-9 col-lg-10">
                                        <input placeholder="Search here" type="text" v-model="search">
                                    </div>
                                    <div class="col-12 col-md-3 col-lg-2">
                                        <button class="icon fa-cart-arrow-down" type="submit" value="Submit">Add to
                                            Cart
                                        </button>
                                    </div>
                                </div>
                            </div>


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
                                    <td>@{{ item.price }}$</td>


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
    <script src="https://unpkg.com/vue/dist/vue.min.js"></script>
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

