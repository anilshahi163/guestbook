<?php
	session_start();
	$name = $address = $email = $number = "";
	$nameErr = $addressErr = $emailErr = $numberErr = "";
$i = 0;
	if (isset($_POST['send']) || isset($_POST['update'])) {
		$_SESSION['post_data'] = $_POST;	
		if (empty($_POST['name'])) {
			$i++;
			$_SESSION['nameErr'] = "This field must be filled";
		}else{
			$name = $_POST['name'];
		}
		if (!preg_match('/^[A-Za-z ]*$/', $name)) {
			$i++;
			$_SESSION['nameErr'] = "Username is not valid";
		}

		if (empty($_POST['address'])) {
			$i++;
			$_SESSION['addressErr'] = "You cannot leave it blank";
		}else{
			$address = $_POST['address'];
		}

		if (empty($_POST['email'])) {
			$i++;
			$_SESSION['emailErr'] = "This field must be filled";
		}else{
			$email = $_POST['email'];
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$i++;
			$_SESSION['emailErr'] = "Sorry, Invalid email.";
		}

		if (empty($_POST['number'])) {
			$i++;
			$_SESSION['numberErr'] = "This Field cannot be left blank";
		}
		if (!is_numeric($_POST['number'])) {
			$i++;
			$_SESSION['numberErr'] = "You can only input numbers.";
		}else{
			$number = $_POST['number'];
		}
		

	}
	$username = $password = "";
	$usernameErr = $passwordErr = "";
	$a = 0;
	if (isset($_POST['loginsend'])|| isset($_POST['loginupdate'])) {
		$_SESSION['post_data'] = $_POST;
		if (empty($_POST['username'])) {
			$a++;
			$_SESSION['usernameErr'] = "This field must be filled";
		}else{
			$username = $_POST['username'];
		}
		if (!preg_match('/^[A-Za-z ]*$/', $username)) {
			$a++;
			$_SESSION['usernameErr'] = "Sorry,Not a valid username. Try another one.";
		}
		if (empty($_POST['password'])) {
			$a++;
			$_SESSION['passwordErr'] = "You cannot leave it blank";
		}else{
			$password = $_POST['password'];
		}
	}


	$con = mysqli_connect('localhost','root','admin','crud');
	$result = mysqli_query($con,"SELECT * from guestuser");
	$loginresult = mysqli_query($con, "SELECT * from login");
	
	if (isset($_POST['login'])) {
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$query = "SELECT * from login where Username = '$username' AND Password = '$password'";
	$result1 = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result1);
	
	// var_dump($row['Username']);
	// var_dump($row['Password']);
	// var_dump($username);
	// var_dump($password);die;
	if ($row['Username'] == $username && $row['Password'] == $password && !empty($username) && !empty($password)) {
		$_SESSION['logged_username'] = $username;
		header("location:Practice.php?msg=6");
	}else{
		$_SESSION['logged_username'] = '';
		header("location:index.php?msg=0");
	}
	}
	

	if ($i == 0) {
		
	
	if (isset($_POST['send'])) {
		$name = mysqli_real_escape_string($con,$_POST['name']);
		$address = mysqli_real_escape_string($con,$_POST['address']); 
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$number = mysqli_real_escape_string($con,$_POST['number']);
		$status = mysqli_real_escape_string($con,$_POST['status']);
		$query = "insert into guestuser(name,address,email,mobile_number,status)values('$name','$address','$email','$number','$status')";
		mysqli_query($con,$query);
		 unset($_SESSION['post_data']);
		header("location:Practice.php?msg=0");
	}
	if (isset($_POST['update'])) {
		$name = mysqli_real_escape_string($con,$_POST['name']);
		$address = mysqli_real_escape_string($con,$_POST['address']);
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$number = mysqli_real_escape_string($con,$_POST['number']);
		$status = mysqli_real_escape_string($con,$_POST['status']);
		$id = mysqli_real_escape_string($con,$_POST['id']);

		$query = "UPDATE guestuser set name = '$name',address = '$address',email = '$email',Mobile_number = '$number',status = '$status' where id = '$id'";
		mysqli_query($con, $query);
		header("location:Practice.php?msg=2");
	}
	
}else{
	if (isset($_POST['send'])) {
		header("location:practice.php?msg=3");
	}else if(isset($_POST['update'])){
		header("location:edit.php?msg=3");
	}
}
	if ($a == 0) {
		
		if (isset($_POST['loginsend'])){
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password = mysqli_real_escape_string($con, $_POST['password']);

		$query = "INSERT into login(Username,Password)values('$username','$password')";
		mysqli_query($con, $query);
		header("location:loginshow.php");
	}
	if (isset($_POST['loginupdate'])) {
		
		$username = mysqli_real_escape_string($con, $_POST['username']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$id = mysqli_real_escape_string($con,$_POST['id']);

		$query = "UPDATE login set Username = '$username', Password = '$password' WHERE id = '$id'";
		mysqli_query($con, $query);
		header("location:loginshow.php");
	}
	}else{
		header("location:loginshow.php");
	}

	
	if (isset($_GET['delete'])) {
		$id = $_GET['delete'];
		mysqli_query($con, "DELETE from guestuser where id = '$id'");
		header("location:Practice.php?msg=1");
	}
	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($con, "DELETE from login where id = '$id'");
		header("location:loginshow.php?msg=1");
	}
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		header("location:edit.php?id=".$id);
	}
	if (isset($_GET['loginedit'])) {
		$id = $_GET['loginedit'];
		header("location:editLogin.php?id=".$id);
	}
	if (isset($_POST['deleteSelected'])) {
		$checkbox = $_POST['checkbox'];
		for ($i=0; $i <count($checkbox) ; $i++) { 
			
			$del_id = $checkbox[$i];
			$sql = "Delete from guestuser where id = '$del_id'";
			$result = mysqli_query($con, $sql);
		}
		if ($result) {
			header("location:Practice.php?msg=1");
		}else{
			echo "Sorry, failed to delete.";
		}
	}

 ?>