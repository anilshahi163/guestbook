<?php include("server.php"); ?>
<html>
<head>
	<title></title>
</head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script type="text/javascript" src = "jquery.js"></script>
<body>
	<div class = "container">

<form class = "form-horizontal" method = "post" action = "server.php">
	<fieldset>
	<legend>Create form</legend>
	
	<div class = "form-group">
	<label for = "name" class = "col-sm-2 control-label">Name</label>
	<div class = "col-sm-10">
	<input type = "text" name = "name" class = "form-control" placeholder = "Enter your name here" value="<?php echo isset($_SESSION['post_data']['name'])? $_SESSION['post_data']['name'] : ''; ?>">
	<span style = "color:red"><p><?php echo isset($_SESSION['nameErr'])?$_SESSION['nameErr']:'' ?></p></span>
	</div></div>
	<div class = "form-group">
	<label for = "address" class = "col-sm-2 control-label">Address</label>
	<div class = "col-sm-10">
	<input type = "text" name = "address" class = "form-control" placeholder = "Enter your address here" value = "<?php echo isset($_SESSION['post_data']['address'])? $_SESSION['post_data']['address'] : ''; ?>">
	<span style = "color:red"><p><?php echo isset($_SESSION['addressErr'])?$_SESSION['addressErr']:'' ?></p></span>
	</div></div>
	<div class = "form-group">
	<label for = "email" class = "col-sm-2 control-label">Email</label>
	<div class = "col-sm-10">
	<input type = "text" name = "email" class = "form-control" placeholder = "Enter your email here" value = "<?php echo isset($_SESSION['post_data']['email'])? $_SESSION['post_data']['email'] : ''; ?>">
	<span style = "color:red"><p><?php echo isset($_SESSION['emailErr'])?$_SESSION['emailErr']:'' ?></p></span>
	</div></div>
	<div class = "form-group">
	<label for = "Mobile_number" class = "col-sm-2 control-label">Mobile Number</label>
	<div class = "col-sm-10">
	<input type = "text" name = "number" class = "form-control" placeholder = "Enter your number here" value = "<?php echo isset($_SESSION['post_data']['number'])? $_SESSION['post_data']['number'] : ''; ?>">
	<span style = "color:red"><p><?php echo isset($_SESSION['numberErr'])?$_SESSION['numberErr']:'' ?></p></span>
	</div></div>
	<div class = "form-group">
		<label for = "status" class = "col-sm-2 control-label">Status</label>
			<div class = "col-sm-10">
			<div class = "radio">
	<label>
		<input type = "radio" name = "status" value = "1" checked>Active
	</label>
	</div>
	
	<div class = "radio">
	<label>
		<input type = "radio" name = "status" value = "0">Inactive
	</label>
	</div>
	</div>
	</div>
	<div class = "form-group">
		<div class = "col-sm-offset-2 col-sm-10">
		<input type = "submit" class = "btn btn-success" value = "send" name = "send">
	</div>
	</div>
	


</fieldset>
</form>
</div>

</body>
</html>