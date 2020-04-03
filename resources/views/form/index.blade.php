<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html,
        body {
            background-color: #fff;
            color: #111;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
            width: 767px;
            margin: 0 auto;
        }

        label {
            font-weight: 900;
            font-size: 1.5rem;
        }
    </style>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success" id="alertMessage">
                {{ session('success') }}
            </div>
        @endif
        <form action="" method="post" class="full-height">
            @csrf
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="please type your email">
            </div>
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="please type your name">
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" placeholder="please type email subject">
            </div>
            <div class="form-group">
                <label for="body">Email Body</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="please type email body"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>

</html>