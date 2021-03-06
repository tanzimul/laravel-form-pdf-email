<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>



## Instruction

#### Basic Installation

``` bash 
git clone https://github.com/tanzimul/laravel-form-pdf-email.git
cd laravel-form-pdf-email 
composer install
npm install
npm run dev
```

- Rename .env.example file to .env

``` bash
php artisan key:generate
```

- Change the mailer configuration
<p>Email configuration for Gmail</p>
<pre>
<code>
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME="your email address"
MAIL_PASSWORD="your email password"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="your email from address"
MAIL_FROM_NAME="your email from"
</code>
</pre>

``` bash
php artisan serve
```
- Your app will serve on [http://localhost:8000/](http://localhost:8000/)
- Enjoy!



## Documentation
#### Install Laravel
``` bash
composer create-project --prefer-dist laravel/laravel laravel-form-pdf-email "6.*"
cd laravel-form-pdf-email
```

#### Scaffold Bootstrap 4
``` bash
composer require laravel/ui:^1.0 --dev
php artisan ui bootstrap
npm install
npm run dev
```

#### Install Laravel DomPdf Package
``` bash
composer require barryvdh/laravel-dompdf
```
``` php
'providers' => [ 
	Barryvdh\DomPDF\ServiceProvider::class,
]
'aliases' => [
	'PDF' => Barryvdh\DomPDF\Facade::class,
]
```
``` bash
php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"
```

#### Configure Email

<p>Email configuration for Gmail</p>
<pre>
<code>
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME="your email address"
MAIL_PASSWORD="your email password"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="your email from address"
MAIL_FROM_NAME="your email from"
</code>
</pre>


#### Create Blade Files

resources/views/form/index.blade.php
``` html
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
        @if(session('error'))
        <div class="alert alert-danger" id="alertMessage">
            {{ session('error') }}
        </div>
        @endif
        <form action="{{ route('generate') }}" method="post" class="full-height">
            @csrf
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="please type your email" required>
            </div>
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="please type your name" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" placeholder="please type email subject" required>
            </div>
            <div class="form-group">
                <label for="body">Email Body</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="please type email body" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
    <script>
        $(function() {
            setTimeout(function() {
                $("#alertMessage").fadeOut("slow");
            }, 3000)
        })
    </script>
</body>

</html>
```

resources/sass/app.scss
``` css
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
```

resources/views/mails/mail.blade.php
``` html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Submit form, generate pdf and send as email attachment</title>
</head>
<body>
    <h2>Your submitted data</h2>
    <h4><b>Your Email address :</b> {{ $data['email'] }}</h4>
    <h4><b>Your Name :</b> {{ $data['name'] }}</h4>
    <h4><b>Subject: </b> {{ $data['subject'] }}</h4>
    <h4><b>Body: </b> {{ $data['body'] }}</h4>

    <p>This is a test mail coming from <b> {{ $data['replyTo'] }} </b></p>
    <p>Email Version</p>
</body>
</html>
```

resources/views/pdf/pdf.blade.php
``` html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Submit form, generate pdf and send as email attachment</title>
</head>
<body>
    <h2>Your submitted data</h2>
    <h4><b>Your Email address :</b> {{ $data['email'] }}</h4>
    <h4><b>Your Name :</b> {{ $data['name'] }}</h4>
    <h4><b>Subject: </b> {{ $data['subject'] }}</h4>
    <h4><b>Body: </b> {{ $data['body'] }}</h4>
    <p>Pdf Version</p>
</body>
</html>
```

#### Change Route
web.php
``` php

Route::get('/', function () {
    return view('form.index');
});
Route::post('/generate', 'FormPdfEmailController@generate')->name('generate');
```

#### Create Controller
``` bash
php artisan make:controller FormPdfEmailController
```

FormPdfEmailController.php
``` php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Mail;
use env;

class FormPdfEmailController extends Controller
{
    public function generate(Request $request)
    {
        $data = $request->all();

        $data['replyTo'] = env('MAIL_FROM_ADDRESS');
        $data['replyToName'] = env('MAIL_FROM_NAME');

        $pdf = PDF::loadView('pdf.pdf', compact('data'));
        try {
            Mail::send('mails.mail', compact('data'), function ($message) use ($data, $pdf) {
                $message
                    ->to($data['email'], $data['name'])
                    ->replyTo($data['replyTo'], $data['replyToName'])
                    ->subject($data['subject'])
                    ->attachData($pdf->output(), "attachment.pdf");
            });
        } catch (JWTException $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
        if (Mail::failures()) {
            return redirect()->back()->with('error', 'Error sending mail');
        } else {
            return redirect()->back()->with('success', 'Email sent successfully');
        }
        
    }
}
```


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
