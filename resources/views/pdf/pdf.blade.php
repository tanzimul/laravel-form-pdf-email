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