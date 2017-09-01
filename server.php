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


	$con = mysqli_connect('localhost','root','admin','crud');
	$result = mysqli_query($con,"SELECT * from guestuser");
	
	if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$_SESSION['username'] = $username;
	$query = "SELECT * from login where Username = '$username' AND Password = '$password'";
	$result1 = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result1);
	
	// var_dump($row['Username']);
	// var_dump($row['Password']);
	// var_dump($username);
	// var_dump($password);die;
	if ($row['Username'] == $username && $row['Password'] == $password && !empty($username) && !empty($password)) {
		header("location:index1.php?msg=6");
	}else{
		header("location:index.php?msg=0");
	}
	}
	

	if ($i == 0) {
		
	
	if (isset($_POST['send'])) {
		$name = $_POST['name'];
		$address = $_POST['address']; 
		$email = $_POST['email'];
		$number = $_POST['number'];
		$status = $_POST['status'];
		$query = "insert into guestuser(name,address,email,mobile_number,status)values('$name','$address','$email','$number','$status')";
		mysqli_query($con,$query);
		header("location:index1.php?msg=0");
	}
	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$number = $_POST['number'];
		$status = $_POST['status'];
		$id = $_POST['id'];

		$query = "UPDATE guestuser set name = '$name',address = '$address',email = '$email',Mobile_number = '$number',status = '$status' where id = '$id'";
		mysqli_query($con, $query);
		header("location:index1.php?msg=2");
	}
}else{
	if (isset($_POST['send'])) {
		header("location:create.php?msg=3");
	}else if(isset($_POST['update'])){
		header("location:edit.php?msg=3");
	}
}
	if (isset($_GET['delete'])) {
		$id = $_GET['delete'];
		
		mysqli_query($con, "delete from guestuser where id = '$id'");
		header("location:index1.php?msg=1");
	}
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		header("location:edit.php?id=".$id);
	}

	if (isset($_POST['deleteSelected'])) {
		$checkbox = $_POST['checkbox'];
		for ($i=0; $i <count($checkbox) ; $i++) { 
			
			$del_id = $checkbox[$i];
			$sql = "Delete from guestuser where id = '$del_id'";
			$result = mysqli_query($con, $sql);
		}
		if ($result) {
			header("location:index1.php?msg=1");
		}else{
			echo "Sorry, failed to delete.";
		}
	}

 ?>