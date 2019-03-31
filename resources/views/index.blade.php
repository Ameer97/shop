@extends('layouts.home')
@section('home')

    <!-- Nav -->
    <nav id="menu">
        <ul class="links">
            <li><a href="/">Home</a></li>
            <li><a href="/user">Login User</a></li>
        </ul>
    </nav>

    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <h1>Shopping</h1>
            <p>“Buy what you don’t have yet or what you really want, which can be mixed with what you already own."
            </p>
        </div>
        <video autoplay loop muted playsinline src="/home/images/banner.mp4"></video>
    </section>

    <!-- Highlights -->
    <section class="wrapper">
        <div class="inner">
            <header class="special">
                <h2>Shop Website</h2>
                <p>"Whoever said that money can’t buy happiness simply didn’t know where to go shopping.."</p>
            </header>
            <div class="highlights" id="item">
                <div v-for="item in items">

                    <section>
                        <div class="content">
                            <header>
                                <a href="/user" class="icon fa-cart-arrow-down"><span class="label">Icon</span></a>
                                <h3>@{{ item.name }} : @{{ item.price }} $</h3>
                            </header>
                        </div>
                    </section>
                </div>


            </div>
        </div>
    </section>

    <!-- CTA -->
    <section id="cta" class="wrapper">
        <div class="inner">
            <h2>shopping is the best therapy</h2>
            <p>"Shopping is a bit of a relaxing hobby for me, which is sometimes troubling for the bank balance."</p>
        </div>
    </section>


    <!-- Highlights -->
    <section class="wrapper">
        <div class="inner">
            <header class="special">
                <h2>join with us</h2>
            </header>
            <div class="highlights">
                <section>
                    <div class="content">
                        <header>
                            <a href="/user" class="icon fa-files-o"><span class="label">Icon</span></a>
                            <h3>Login/Register User</h3>
                        </header>

                    </div>
                </section>

                <section>
                    <div class="content">
                        <header>
                            <a target="_blank" href="https://github.com/Ameer97/shop" class="icon fa-github"><span class="label">Icon</span></a>
                            <h3>Full Project on Github</h3>
                        </header>

                    </div>
                </section>


                <section>
                    <div class="content">
                        <header>
                            <a target="_blank"
                               href="https://mail.google.com/mail/u/0/?view=cm&fs=1&tf=1&source=mailto&to=ameerwisam97@gmail.com"
                               class="icon fa-envelope"><span class="label">Icon</span></a>
                            <h3>Contact with my</h3>
                        </header>

                    </div>
                </section>
            </div>
        </div>
    </section>


@endsection

@section('script')
    <script src="https://unpkg.com/vue/dist/vue.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        let vue = new Vue({
            el: "#item",
            data: {
                items: [],
            },
            methods: {
                getItems() {
                    axios.get('/home/items').then(response => {
                        this.items = response.data.items;
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


        });
    </script>
@endsection