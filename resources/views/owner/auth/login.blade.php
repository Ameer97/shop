<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/creat.css">
    <title>Login</title>
</head>
<body>

<div class="login-wrap">
    <div class="login-html">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign
                        In</label>
                    <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
                    <div class="login-form">
                        <div class="sign-in-htm">

                            <form action="{{ route('loginOwner') }}" method="post">
                                @csrf
                                @include('layouts.err')

                                <div class="group">
                                    <label for="email" class="label">email</label>
                                    <input required name="email" id="email" type="email"
                                           class="input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    value="{{ old('email') }}" autofocus>
                                </div>
                                <div class="group">
                                    <label for="password" class="label">password</label>
                                    <input required name="password" id="password" type="password" class="input form-control"
                                           data-type="password">
                                </div>

                                <div class="group">
                                    <input type="submit" class="button" value="Sign In">
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>