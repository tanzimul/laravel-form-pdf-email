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
    <h5><b>Your Email address :</b> {{ $data['email'] }}</h5>
    <h5><b>Your Name :</b> {{ $data['name'] }}</h5>
    <h5><b>Subject: </b> {{ $data['subject'] }}</h5>
    <h5><b>Body: </b> {{ $data['body'] }}</h5>
</body>
</html>