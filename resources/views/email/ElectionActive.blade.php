
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <style>
        .a {
            background-color: #4CAF50; /* Green */
            border: none;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin: 4px 2px;
            cursor: pointer;
            font-size: 16px;
        }
        h3{
            text-align: justify;
        }
        p{
            text-align: justify;
        }
    </style>
</head>
<body>

<h2>Welcome to the site</h2>
<br/>
<h3>Hello {{$email}}</h3>
<p>A Election has been Activated by Admin called <b>{{$name}},</b> which is held on <b>{{$date}}</b>
    Which application date start on {{$start}} and end on {{$end}}</p>
<br/>
<a style="color: white" class="a" href="{{url('login')}}">Click Here to Login</a>

</body>
</html>
