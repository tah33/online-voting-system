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
    #a {
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
            <caption>{{$area->name}}</caption>
            <thead class="bg-gray">
            <tr>
                <th>Serial</th>
                <th>Candidate</th>
                <th>Party</th>
                <th>Symbol Name</th>
                <th>Vote</th>
                <th>Result</th>
            </tr>
            </thead>
            @foreach($area->users->where('role','candidate') as $key => $user)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->party->name}}</td>

                    <td>{{$user->party->symbol_name}}</td>
                    <td>{{$user->candidate ? $user->candidate->votes : ''}}</td>
                    <td> @if($user->candidate->votes == $max)
                            @if($users_max_vote->count()>1)
                                Draw between
                                @foreach($users_max_vote as $vote)
                                    {{$vote->name}}
                                @endforeach
                            @else
                                Winner
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
</div>
