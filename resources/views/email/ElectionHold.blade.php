
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
<br>
<h3>Hello {{$name}}</h3>
<p>You Applied for an election called <b>{{$name}},</b> which is going to held on <b>{{$date}}</b>
    Now, it is being hold for due to unavoidable circumstances</p>
<br/>
<a style="color: white" class="a" href="{{url('login')}}">Click Here to Login</a>
</body>
</html>
