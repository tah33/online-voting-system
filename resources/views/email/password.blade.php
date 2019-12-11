<!DOCTYPE html>
<html>
  <head>
    <title>Reset Password</title>
  </head>
  <body>
    <h2>Hello {{$user->name}}</h2>
    <br/>
    Your registered email-id is {{$user->email}} , Please click on the below link to Reset your Password
    <br/>
    <a href="{{url('emails/'.$user->id.'/edit')}}">Click Here to reset Your Password</a>
  </body>
</html>