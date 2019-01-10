<?php
    
                session_start();
                include ("logincheck.php");
                    
                    $file = file_get_contents("db-password.txt") or die("unable to open file");

                    $DB_HOST = 'classmysql';
                    $DB_USER = 'cs340_gilesbr';
                    $DB_PASS = $file;
                    $DB_NAME = 'cs340_gilesbr';

                    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS,  $DB_NAME);
                    if ( mysqli_connect_errno() ) {

                            die ('Failed to connect to MySQL: ' . mysqli_connect_error());
                    }
                   
                ?>
<html>
	<head>
                    <meta charset="utf-8">
                    <title>Main Page</title>
                    <style>
                    ul {
                                                    list-style-type: none;
                                                    margin: 0;
                                                    padding: 0;
                                                    overflow: hidden;
                                                    list-style: none;
                                                    text-align: center;
                                                    background-color: #333;
                                                }

                                                li {
                                                   
                                                    display: inline-block;
                                                }

                                                li a {
                                                    display: block;
                                                    color: white;
                                                    text-align: center;
                                                    padding: 14px 16px;
                                                    text-decoration: none;
                                                }

                                                li a:hover:not(.active) {
                                                    background-color: #111;
                                                }

                                                .active {
                                                    background-color: #508abb;
                                                }
                                                .login-form {
			width: 300px;
			margin: 0 auto;
			font-family: Tahoma, Geneva, sans-serif;
		}
		.login-form h1 {
			text-align: center;
			color: #4d4d4d;
			font-size: 38px;
			padding: 20px 0 20px 0;
		}
                                    .login-form input[type="password"] {
			width: 100%;
			padding: 15px;
			border: 1px solid #dddddd;
			margin-bottom: 15px;
			box-sizing:border-box;
		}
                                    .login-form p {
                                        text-align: center;
                                        font: Geneva;
                                    }
                                                .login-form input[type="submit"] {
			width: 100%;
			padding: 15px;
			background-color: #508abb;
			border: 0;
			box-sizing: border-box;
			cursor: pointer;
			font-weight: bold;
			color: #ffffff;
		}
                                                  
                                                    .login-form input[type="submit"]:hover {
                                                        background-color: red;
                                                        border-style: double;
                                                    }
                                  
                                                    /* The container */
                                                    .container {
                                                        display: block;
                                                        position: relative;
                                                        padding-left: 35px;
                                                        margin-bottom: 12px;
                                                        cursor: pointer;
                                                        font-size: 22px;
                                                        -webkit-user-select: none;
                                                        -moz-user-select: none;
                                                        -ms-user-select: none;
                                                        user-select: none;
                                                    }

                                                    /* Hide the browser's default radio button */
                                                    .container input {
                                                        position: absolute;
                                                        opacity: 0;
                                                        cursor: pointer;
                                                    }

                                                    /* Create a custom radio button */
                                                    .checkmark {
                                                        position: absolute;
                                                        top: 0;
                                                        left: 0;
                                                        height: 25px;
                                                        width: 25px;
                                                        background-color: #eee;
                                                        border-radius: 50%;
                                                    }

                                                    /* On mouse-over, add a grey background color */
                                                    .container:hover input ~ .checkmark {
                                                        background-color: #ccc;
                                                    }

                                                    /* When the radio button is checked, add a blue background */
                                                    .container input:checked ~ .checkmark {
                                                        background-color: #2196F3;
                                                    }

                                                    /* Create the indicator (the dot/circle - hidden when not checked) */
                                                    .checkmark:after {
                                                        content: "";
                                                        position: absolute;
                                                        display: none;
                                                    }

                                                    /* Show the indicator (dot/circle) when checked */
                                                    .container input:checked ~ .checkmark:after {
                                                        display: block;
                                                    }

                                                    /* Style the indicator (dot/circle) */
                                                    .container .checkmark:after {
                                                            top: 9px;
                                                            left: 9px;
                                                            width: 8px;
                                                            height: 8px;
                                                            border-radius: 50%;
                                                            background: white;
                                                    }
                    
		</style>
              
	</head>
                    <body>
                        <ul>
                                <li><a href="main.php">Home</a></li>
                                <li><a  href="listings.php">View Listings</a></li>
                                <li><a  href="create.php">Create Listing</a></li>
                                <li><a class="active" href="edit.php">Edit Account</a></li>
                                <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </body>
                    <body>
                        
                        <div class="login-form">
                            <h1>Edit Account</h1>
                            <p>Note:  Don't forget to update your listings if you have changed location!</p>
                         <form  action="" method="post" >
                                                     
                                                          <input type="password" name="password" placeholder="New Password">
                                                          <p>Select New Location</p>
                                                           <label class="container">Corvallis
                                                                         <input type="radio" checked="checked" name="radio" value="Corvallis">
                                                                                    <span class="checkmark"></span>
                                                          </label>
                                                          <label class="container">Portland
                                                                         <input type="radio" name="radio" value="Portland">
                                                                                     <span class="checkmark"></span>
                                                          </label>
                                                          <label class="container"> Hollywood
                                                                        <input type="radio" name="radio" value="Hollywood">
                                                                                     <span class="checkmark"></span>
                                                          </label>
                                                          
                                                            <input type="submit" name="subutton">
                                                           
                                             </form>
                        </div>
                    </body>    
</html>

<?php

     if(isset($_POST['subutton'])) {       
                                                                $username = $_SESSION['username'];
                                                                $newpass = mysqli_real_escape_string($conn, $_POST['password']);
                                                                $pass = password_hash($newpass, PASSWORD_BCRYPT);
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
                                                                $sql = "UPDATE User SET Password='$pass', Location='$locationid' WHERE Username='$username'";
                                                               if ($conn->query($sql) === TRUE) {
        
        echo "<script type=\"text/javascript\">window.alert('Account Successfully edited');
                    window.location.href = '/~gilesbr/books/main.php';</script>"; 
                    
        } 
     }

?>