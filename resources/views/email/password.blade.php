<!DOCTYPE html>
<html>
  <head>
    <title>Reset Password</title>
  </head>
  <body>
    <h2>Welcome to the site {{$student->name}}</h2>
    <br/>
    Your registered email-id is {{$student->email}} , Please click on the below link to Reset your Password
    <br/>
    <a href="{{url('emails/'.$student->id.'/edit')}}">Click Here to reset Your Password</a>
  </body>
</html>