<!DOCTYPE html>
<html>
  <head>
    <title>Your OTP</title>
  </head>
  <body>
    <h2>Hello {{$user->name}}</h2>
    <br/>
    Your registered OTP is {{$user->email}} , Please Use this OTP to Give our valuable vote
    <br/>
    <strong style="color: red"><b><u>Note:</u></b>It will be remain active for 10 Minutes</strong>
  </body>
</html>
