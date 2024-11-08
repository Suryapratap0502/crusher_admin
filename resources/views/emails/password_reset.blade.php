<!DOCTYPE html>
<html>
<head>
    <title>Udhaar</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>
  
    <p>Your reset password key is {{ $mailData['key'] }}</p>
     
    <p>Thank you</p>
</body>
</html>