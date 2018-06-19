<?php
session_start();
// initializing variables
$errors = array();
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'ticket');
// REGISTER USER
if ($db->connect_error) {
die("Connection failed: " . $db->connect_error);
}
//echo "Connected successfully";
if (isset($_POST['next'])) {
// receive all input values from the form
$username = mysqli_real_escape_string($db, $_POST['name']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$type = mysqli_real_escape_string($db, $_POST['type']);
// form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if (empty($username)) { array_push($errors, "Username is required"); }
if (empty($email)) { array_push($errors, "email is required"); }
if (empty($password)) { array_push($errors, "password is required"); }
if (empty($type)) { array_push($errors, "Fill the type "); }
$user_check_query = "SELECT * FROM user_record WHERE name='$username' LIMIT 1 ";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);
if ($user) { // if user exists
if ($user['name'] === $username) {
array_push($errors, "Username already exists");
}
}
if (count($errors) == 0) {
  $query = "INSERT INTO user_record (name, email, password, type )
      VALUES('$username', '$email', '$password', '$type')";
  mysqli_query($db, $query);
  }
  header('location: ticketinfo.php'); 
}
?>
<?php
$db = mysqli_connect('localhost', 'root', '', 'ticket');
if (isset($_POST['register'])) {
// receive all input values from the form
$title = mysqli_real_escape_string($db, $_POST['title']);
$url = mysqli_real_escape_string($db, $_POST['url']);
$description = mysqli_real_escape_string($db, $_POST['description']);
// form validation: ensure that the form is correctly filled ...
// by adding (array_push()) corresponding error unto $errors array
if (empty($title)) { array_push($errors, "title is required"); }
if (empty($url)) { array_push($errors, "url is required"); }
if (empty($description)) { array_push($errors, "description is required"); }
if (count($errors) == 0) {
  $query = "INSERT INTO tickets (title, description, url)
      VALUES('$title','$description','$url' )";
  mysqli_query($db, $query);
    }

  	
}

?>
<?php

	$username="";
	$password="";

	$errors = array();
	// connect to the database
	$db = mysqli_connect('localhost', 'root', '', 'ticket');
	if (isset($_POST['login'])) {
	// receive all input values from the form
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	// form validation: ensure that the form is correctly filled ...
	// by adding (array_push()) corresponding error unto $errors array
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($password)) { array_push($errors, "password is required"); }
	//if user exists
    if ($username=='ghazanfar'&& $password=='ghazanfar') {
	header('location: alltickets.php');
	}
	if ($password=='agent'){
		$_SESSION['name'] = $username;
		header('location:agent1.php');
	}
	array_push($errors, "Username and password incorrect");
	
	$user_check_query = "SELECT * FROM user_record WHERE name='$username' and password='$password'";
	$result = mysqli_query($db, $user_check_query);
	$user = mysqli_fetch_assoc($result);
	if ($user) { // if user exists
	if (!$user['name'] === $username) {
	array_push($errors, "Username not found");
	}
	else{
		$_SESSION['name'] = $username;
		header('location: ticket.php');	
	}
	}
}

?>
<?php

	$username="";
	$password="";

	$errors = array();
	// connect to the database
	$db = mysqli_connect('localhost', 'root', '', 'ticket');
	if (isset($_POST['login_user'])) {
	// receive all input values from the form
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	// form validation: ensure that the form is correctly filled ...
	// by adding (array_push()) corresponding error unto $errors array
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($password)) { array_push($errors, "password is required"); }
	// if user exists
	if ($username=='ghazanfar'&& $password=='ghazanfar') {
		header('location: alltickets.php');
	}
	if ($password=='agent'){
		$_SESSION['name'] = $username;
		header('location:agent1.php');
	}
	array_push($errors, "Username and password incorrect");
	
	$user_check_query = "SELECT * FROM user_record WHERE name='$username' and password='$password'";
	$result = mysqli_query($db, $user_check_query);
	$user = mysqli_fetch_assoc($result);
	if ($user) { // if user exists
	if (!$user['name'] === $username) {
	array_push($errors, "Username not found");
	}
	else{
		$_SESSION['name'] = $username;
		header('location: ticket.php');	
	}
	}
}

?>

