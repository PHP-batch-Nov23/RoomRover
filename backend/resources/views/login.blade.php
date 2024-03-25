<!DOCTYPE html>
<html lang="en">

<head>
    <title>RoomRover Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('form.css') }}">
    <style>
        /* Dark theme */
        body {

            color: #ffffff;
            /* Light text color */
        }

        .jumbotron {
            margin-top: 0%;
            background-color: #343a40;
            /* Dark jumbotron background color */
            color: #ffffff;
            /* Light text color */
        }

        .form-control {
            background-color: #343a40;
            /* Dark form background color */
            color: #ffffff;
            /* Light text color */
            border-color: #ffffff;
            /* Light border color */
        }

        /* Light theme */
        .jumbotron-light {
            background-color: #f8f9fa;
            /* Light jumbotron background color */
            color: #212529;
            /* Dark text color */
        }

        .form-control-light {
            background-color: #f8f9fa;
            /* Light form background color */
            color: #212529;
            /* Dark text color */
            border-color: #212529;
            /* Dark border color */
        }

        /* Hover effect */
        .form-control:hover {
            background-color: #495057;
            /* Darker background color on hover */
            color: #ffffff;
            /* Light text color on hover */
        }

        .form-control-light:hover {
            background-color: #e9ecef;
            /* Lighter background color on hover */
            color: #212529;
            /* Dark text color on hover */
        }

        .container {
            text-align: justify;
            padding-right: 40px;
            margin-left: 30%;
            margin-left: 30%;
        }

        .jumbotron .container {
            max-width: 75%;
        }
    </style>
</head>

<body>

<div class="jumbotron text-center">
        <h1>Admin Login</h1>
        <p>Welcome to RoomRover Hotel Booking Application</p>
        <div class="container ">
            <div class="">
                <div class="col-md-6">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="/login" method="POST" id="login-form" class="login-form" autocomplete="off" role="main">
                        @csrf
                        <h1 class="a11y-hidden">Login Form</h1>
                        <div>
                            <label class="label-email">
                                <input type="email" class="text" name="email" placeholder="Email" id="email" tabindex="1" required />
                                <span class="required">Email</span>
                            </label>
                        </div>
                        <input type="checkbox" name="show-password" class="show-password a11y-hidden" id="show-password" tabindex="3" />
                        <label class="label-show-password" for="show-password">
                            <span>Show Password</span>
                        </label>
                        <div>
                            <label class="label-password">
                                <input type="text" class="text" name="password" placeholder="Password" id="password" tabindex="2" required />
                                <span class="required">Password</span>
                            </label>
                        </div>
                        <input type="submit" value="Log In" />
                        <div class="email">
                            <a href="#">Forgot password?</a>
                        </div>
                        <figure aria-hidden="true">
                            <div class="person-body"></div>
                            <div class="neck skin"></div>
                            <div class="head skin">
                                <div class="eyes"></div>
                                <div class="mouth"></div>
                            </div>
                            <div class="hair"></div>
                            <div class="ears"></div>
                            <div class="shirt-1"></div>
                            <div class="shirt-2"></div>
                        </figure>
                    </form>



                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>