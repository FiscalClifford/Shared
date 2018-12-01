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
                                                .data-form input[type="text"] {
			width: 100%;
			padding: 15px;
			border: 1px solid #dddddd;
			margin-bottom: 15px;
			box-sizing:border-box;
                                                    }
                                                      .data-form input[type="submit"] {
			width: 100%;
			padding: 15px;
			background-color: #535b63;
			border: 0;
			box-sizing: border-box;
			cursor: pointer;
			font-weight: bold;
			color: #ffffff;
                                                    }
                                                
                    
		</style>
              
	</head>
                    <body>
                        <ul>
                                <li><a href="main.php">Home</a></li>
                                <li><a href="listings.php">View Listings</a></li>
                                <li><a class="active" href="create.php">Create Listing</a></li>
                                <li><a href="edit.php">Edit Account</a></li>
                                <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </body>
                    <body>
                    
                         <div class="data-form">
                                    <h1>Create Listing</h1>       
                                    <p>Please fill out the following information and hit submit when you are ready to post</p>
                                              <form  action="create.php" method="post" >
                                                     <input type="text" name="title" placeholder="title">
                                                     <input type="text" name="author" placeholder="author">
                                                     <input type="text" name="topic" placeholder="topic (Math, Science, etc.)">
                                                     <input type="text" name="price" placeholder="Desired Price">
                                                     
                                                          
                                                      <input type="submit">
                                                          
                                             </form>
                            </div>  
                        
                    </body>    
</html>

<?php
    if(isset($_POST['title'], $_POST['author'], $_POST['topic'], $_POST['price']) ) {
        $username = mysqli_real_escape_string($conn, $_SESSION['username']);
        
        //below gives locationID
        $locid = mysqli_query($conn, "SELECT Location FROM User WHERE Username='$username' ");
        $locval = mysqli_fetch_assoc( $locid);
         $locvaly = ($locval['Location']);
         
        //below gives location name
        $locname = mysqli_query($conn, "SELECT Location FROM Place WHERE LocationID='$locvaly' ");
        $locfinal = mysqli_fetch_assoc( $locname);
        $location = ($locfinal['Location']);
        
       //below gives info, title, author, price, and topic
         $info = "no info given yet";       
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $author = mysqli_real_escape_string($conn, $_POST['author']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);
         $topic = mysqli_real_escape_string($conn, $_POST['topic']);
         
         //insertions
         $sql = "INSERT INTO Book (Title, Topic, Seller, SellLocation, Price) VALUES ('$title', '$topic', '$username', '$locvaly', '$price')";
         $sql2 = "INSERT INTO Author (Name, info) VALUES ('$author','$info')";
         
        
      if ($conn->query($sql) === TRUE ) {
      
                   if ($conn->query($sql2) === TRUE){
                       
                        //we need bookid and authorid to update the many to many table BookAuth
        
        $b1 = mysqli_query($conn, "SELECT ID FROM Book ORDER BY ID DESC LIMIT 1");
        $b2 = mysqli_fetch_assoc( $b1);
        $b3 = ($b2['ID']);
        
        $a1 = mysqli_query($conn, "SELECT ID FROM Author ORDER BY ID DESC LIMIT 1");
        $a2 = mysqli_fetch_assoc( $a1);
        $a3 = ($a2['ID']);
        
        $sql3 = "INSERT INTO BookAuth (BookID, AuthorID) VALUES ('$b3','$a3')";
       
                       
                       if ($conn->query($sql3) === TRUE){
                        echo "<script type=\"text/javascript\">window.alert('Posted Successfully');
                   window.location.href = '/~gilesbr/books/main.php';</script>"; 
                   }
                   else{
                       echo "<script type=\"text/javascript\">window.alert('Post Creation Failure BOOKAUTH');
                    window.location.href = '/~gilesbr/books/create.php';</script>"; 
                 exit;
                   }
                       }
                      
                    else{
                        echo "<script type=\"text/javascript\">window.alert('Post Creation Failure AUTHOR');
                    window.location.href = '/~gilesbr/books/create.php';</script>"; 
                 exit;
                    }
     
     
       } 
       else {
           echo "<script type=\"text/javascript\">window.alert('Post Creation Failure BOOK');
                    window.location.href = '/~gilesbr/books/create.php';</script>"; 
                 exit;
          
       }
        
        
        
        
        
        
        
        
        
        
    }
   
 ?>