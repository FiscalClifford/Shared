<?php


session_start();
$file = file_get_contents("db-password.txt") or die("unable to open file");

$DB_HOST = 'classmysql';
$DB_USER = 'cs340_gilesbr';
$DB_PASS = $file;
$DB_NAME = 'cs340_gilesbr';

$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS,  $DB_NAME);
if ( mysqli_connect_errno() ) {
	
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}


// Check if field was left blank
if ( !isset($_POST['username'], $_POST['password']) ) {
	
	echo "<script type=\"text/javascript\">window.alert('field was left blank.');
                    window.location.href = '/~gilesbr/books/index.html';</script>"; 
                    exit;
}



$_SESSION['username'] = mysqli_real_escape_string($conn, $_POST['username']);
$_SESSION['password'] = mysqli_real_escape_string($conn, $_POST['password']);
$_SESSION['loggedin'] = 0;
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$logincheck = mysqli_query($conn,"SELECT Password FROM User WHERE Username='$username' ");
$val = mysqli_fetch_assoc( $logincheck);

if (password_verify($password, $val['Password'])){
    $_SESSION['loggedin'] = 1;
    
    echo "<script type=\"text/javascript\">
                    window.location.href = '/~gilesbr/books/main.php';</script>"; 
                    exit;
}
else {
  echo "<script type=\"text/javascript\">window.alert('invalid login');
                    window.location.href = '/~gilesbr/books/index.html';</script>"; 
                    exit;
}
    
?>