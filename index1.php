<?php
include("server.php"); ?>
<html>
<head>
	<title>Main Page</title>
</head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script type="text/javascript" src = "jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	$("#parent").click(function(){
		if($("#parent").is(':checked')){
			$('.child').attr('checked', true);
		}else{
			$('.child').attr('checked', false);
		}
	});
		
	});
</script>

<?php 
	if (isset($_GET['msg'])) {
		$type = $_GET['msg'];
		if ($type == "0") {
			$_GET['msg'] = "Successfully created...";
			$color = "green";
		}
		else if($type == "1"){
			$_GET['msg'] = "Successfully Deleted...";
			$color = "green";
		}
		else if ($type == "2") {
			$_GET['msg'] = "Successfully updated...";
			$color = "green";
			session_destroy();
		}
		else if ($type == "3") {
			$_GET['msg'] = "Error...";
			$color = "red";
		}
		else if ($type == "6") {
			$_GET['msg'] = "Welcome " .$_SESSION['username'];
			$color = "green";
		}
		
 ?>

 <div class = "msg">
 	<?php   
 		if ($color == "green"){ ?>
 		<div class="alert alert-success alert-dismissible" role="alert">
  
  <strong><?php echo $_GET['msg']; ?></strong>
</div>

 	
 	<?php	
 	}else{ ?>
		 	<div class="alert alert-danger alert-dismissible" role="alert">
  
  <strong><?php echo $_GET['msg']; ?></strong>
		<?php }
		?>

 </div>
 <?php } ?>
<?php unset($_SESSION['post_data']); ?>
<body>
	<div class = "container">
		<div class="page-header">
  <h1>Guest<small>book</small></h1>
</div>
<div>
<a href="logout
.php"><button class = "btn btn-primary">Logout</button></a>
</div>
<form method = "post" action = "server.php">
	<table class = "table table-bordered">
		<thead>
			<tr>
				<th>Select all <input type = "checkbox" id = "parent"><input type = "submit" name = "deleteSelected" class = "btn btn-danger" value = "Delete Selected"></th>
				<th>Name</th>
				<th>Address</th>
				<th>Email</th>
				<th>Mobile number</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($row = mysqli_fetch_array($result)){

				// echo '<pre>';
				// print_r($row); exit;
			?>
			<tr>
				<td><input type = "checkbox" class = "child" name = "checkbox[]" value = "<?php echo $row['id']; ?>"></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['address']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['Mobile_number']; ?></td>
				<td><?php if($row['status']){ echo 'Active'; }else{ echo 'Inactive'; } ?></td>
				<td><a class = "btn btn-danger" data-toggle="modal" data-target="#myModal" data-id = "<?php echo $row['id']; ?>"href = "#">Delete</a>
					<a class = "btn btn-info" href = "server.php?edit=<?php echo $row['id']; ?>">Edit</button></a></td>

					
			</tr>
			<?php
			}
			?>
		</tbody>
		<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
<!--         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 -->        <h4 class="modal-title" id="myModalLabel">Deleting an account.</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this user from the list?
      </div>
      <div class="modal-footer">
        <a class="btn btn-default" data-dismiss="modal">No</a>
        <a class="btn btn-primary" id = "modalDelete" href ="server.php?delete=<?php echo $row['id']; ?>">Yes. Delete this</a>
      </div>
    </div>
  </div>
</div> 
	</table>
		
		<a class = "btn btn-success btn-lg btn-block" href = "create.php">Create new Account</a>
	</form>	
	</div>

<script type="text/javascript">
	$(document).ready(function() {
	  $('#myModal').on('show.bs.modal', function(e) {
	    var id = $(e.relatedTarget).data('id');
	    $('#modalDelete').attr('href', 'server.php?delete=' + id);
	  });
	});

	  setTimeout(function(){ jQuery('.msg').fadeOut("slow") }, 3000);

</script>
</body>
</html>