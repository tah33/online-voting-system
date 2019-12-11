<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
.pass_show{position: relative} 

.pass_show .ptxt { 

position: absolute; 

top: 50%; 

right: 10px; 

z-index: 1; 

color: #f36c01; 

margin-top: -10px; 

cursor: pointer; 

transition: .3s ease all; 

} 

.pass_show .ptxt:hover{color: #333333;} 
</style>
<div class="container" style="background-color: grey; margin:auto">
	<div class="row">
		<div class="col-sm-4">
        <form action="{{url('emails',$user->id)}}" method="post">
            @csrf
            @method('put')
		    <label>Current Password</label>		
		       <label>New Password</label>
            <div class="form-group pass_show"> 
                <input type="password" name="password" class="form-control" placeholder="New Password"> 
                @if($errors->has('password'))
            <strong style="color:red">{{$errors->first('password')}}</strong>
            @endif
            </div> 
		       <label>Confirm Password</label>
            <div class="form-group pass_show"> 
                <input type="password" name="password_confirmation"  class="form-control" placeholder="Confirm Password"> 
            </div> 
            <button type="submit" class="btn btn-primary">Change Password</button>
        </form>
		</div>  
	</div>
</div>