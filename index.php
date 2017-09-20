<html>
<head>
	<title>Login Form</title>
</head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script type="text/javascript" src = "jquery.min.js"></script>
<body>
	<?php 
	if (isset($_GET['msg'])) {
		$type = $_GET['msg'];
		if ($type == "0") {
			$_GET['msg'] = "Sorry, You are not an authorized user.";
			$color = "red";
		}
		if ($type == "1") {
			$_GET['msg'] = "Successfully logged out.";
			$color = "green";
		}
		
	

 ?>

 <div class = "msg">
 	<?php   
 		if ($color == "red"){ ?>
 		<div class="alert alert-danger alert-dismissible" role="alert">
  
  <strong><?php echo $_GET['msg']; ?></strong>
</div>

 	
 	<?php	
 	}else{ ?>
		 	<div class="alert alert-success alert-dismissible" role="alert">
  
  <strong><?php echo $_GET['msg']; ?></strong>
		<?php }
		?>

 </div>
</div>
 <?php } ?>
<div class = "container">
<form action = "server.php" method = "post">
<fieldset class = "form-group">
<legend>Login Form</legend>
<div class = "form-group">
<label for = "Username">Username</label>
<input type = "text" class = "form-control" name = "username" placeholder = "Enter your username here.">
<small class = "form-text text-muted">All letters should be small</small>
</div>

<div class = "form-group">
<label for = "password">Password</label>
<input type = "password" name = "password" class = "form-control" placeholder = "Enter your password here.">
<small class = "form-text text-muted">Enter your name and add 123 after it. Nothing as simple as that.</small>
</div>

<button type = "submit" class = "btn btn-dark" name = "login">Login</button>
</fieldset>
</form>
</div>
<script type="text/javascript">
setTimeout(function(){ jQuery('.msg').fadeOut("slow") }, 3000);

</script>
</body>
</html>