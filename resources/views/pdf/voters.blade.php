<head>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    #a{
        color: red;
    }
</style>
<center>
<h2 id="a" style="font-size: 25px">Online Voting System</h2>
<h4><?php echo date("F-Y")?></h4>
</center>
 <div class="panel panel-default">
  <div class="panel-body">
                <table class="table table-bordered table-hover">
                    <caption>Voter List</caption>
                    <thead>
                        <tr>
                        <th>Serial</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>NID</th>
                        <th>Phone</th>
                        <th>Area</th>
                        <th>Gender</th>
                        <th>Type</th>
                        <th>Date of Birth</th>
                        <th>Age</th>
                        </tr>
                    </thead>
                    @foreach($users as $key => $user)
                    <tr>
                        <td>{{$key+1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->nid}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->userarea->name}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->dob}}</td>
                    <td>{{Carbon\Carbon::createFromDate($user->dob)->diff(Carbon\Carbon::now())->format('%y years')}}</td>
                    </tr>
                        @endforeach
                   
                </table>
       </div>
</div>