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
  <table class="table table-hover table-bordered" width="300">
        <thead>
        <tr>
            <th>Serial</th>
            <th>Candidate</th>
            <th>Area</th>

            <th>Elections</th>
        </tr>
        </thead>
<?php $renderedElections = []; ?>
<?php $renderedAreas = []; ?>
        <tbody>
            @foreach($users as $key => $user)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$user->name}}</td>
               @if (!in_array($user->userarea->name, $renderedAreas))
        <?php  $renderedAreas[] = $user->userarea->name ?>
              <td rowspan="{{count($users->where('area',$user->area))}}">
                 {{$user->userarea->name}}</td>
                 @endif
@if (!in_array($user->candidate->election->name, $renderedElections))
        <?php $renderedElections[] = $user->candidate->election->name ?>
              <td rowspan="{{count($user->candidate->election->candidates)}}">{{$user->candidate->election->name}}</td>
              @endif
            </tr>
            @endforeach
             </tbody>
    </table>