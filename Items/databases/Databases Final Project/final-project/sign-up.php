<?php
session_start();
$file = file_get_contents("db-password.txt") or die("unable to open file");

$DB_HOST = 'classmysql';
$DB_USER = 'cs340_gilesbr';
$DB_PASS = $file;
$DB_NAME = 'cs340_gilesbr';
$message1 = "Created Account Successfully!";
$message2 = "Username Already Taken!";
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS,  $DB_NAME);
if ( mysqli_connect_errno() ) {
	
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Check if field was left blank
if ( !isset($_POST['username'], $_POST['password']) ) {
	
	echo "<script type=\"text/javascript\">window.alert('field was left blank.');
                    window.location.href = '/~gilesbr/books/register.html';</script>"; 
                    exit;
}

$radio = $_POST['radio'];


if ($radio == "Corvallis"){
    $locationid = 1;
}
else if ($radio == "Portland"){
    $locationid = 2;
}
else if ($radio == "Hollywood"){
    $locationid = 3;
}
 else {
 die ("radio broken");   
}


$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$pass = password_hash($password, PASSWORD_BCRYPT);



//no repeat usernames

$result = mysqli_query("SELECT * FROM User WHERE Username='$username'"); 
if ($result->num_rows > 0) {
    echo "<script type=\"text/javascript\">window.alert('Username already taken');
                    window.location.href = '/~gilesbr/books/register.html';</script>"; 
                    exit;
}
else{
  
    //All good so far, lets put them into the database
    
        $sql = "INSERT INTO User (Username, Password, Location) VALUES ('$username', '$pass', '$locationid')";
       if ($conn->query($sql) === TRUE) {
        
        echo "<script type=\"text/javascript\">window.alert('Account Creation Successful');
                    window.location.href = '/~gilesbr/books/index.html';</script>"; 
                    
        } 
        else {
            echo "<script type=\"text/javascript\">window.alert('User insert into database failure.');
                    window.location.href = '/~gilesbr/books/register.html';</script>"; 
                    exit;
            
        }
}
    ?>
   