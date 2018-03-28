<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
  		<div class="row">
  			<div class="card col" style="margin-top:10%;">
			  <div class="card-header"> Register OTP Featured </div>
			  <div class="card-body">
			    <form method="POST" action="<?php echo base_url();?>auth/register_akun">
				  <div class="form-group">
				    <input type="text" class="form-control" id="id_user" name="id_user" placeholder="Username">
				  </div>
				  <div class="form-group">
				    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
				  </div>
				  <div class="form-group">
				    <input type="text" class="form-control" id="nama_user" name="nama_user" placeholder="Name">
				  </div>
				  <div class="form-group">
				    <input type="text" class="form-control" id="email_user" name="email_user" aria-describedby="emailHelp" placeholder="Emaill">
				  </div>
				  <div class="form-group">
				    <input type="text" class="form-control" id="hp_user" name="hp_user" placeholder="Telepon">
				  </div>
				  <button type="submit" class="btn btn-primary">Register OTP</button>
				  <a href="#" class="btn btn-primary">Register With Facebook</a>
				  <a href="<?php echo base_url();?>" class="btn btn-primary">Login</a>
				</form>
			  </div>
			</div>
			<div class="col-1"> </div>
			<div class="card col" style="margin-top:10%;">
			</div>
  		</div>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>