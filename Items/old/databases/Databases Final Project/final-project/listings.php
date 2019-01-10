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

                                                    body {
                            font-size: 15px;
                            color: #343d44;
                           font-family: Tahoma, Geneva, sans-serif;
                            padding: 0;
                            margin: 0;
                    }
                    table {
                            margin: auto;
                            font-family: Tahoma, Geneva, sans-serif;
                            font-size: 12px;
                    }

                    h1 {
                            margin: 25px auto 0;
                            text-align: center;
                            text-transform: uppercase;
                            font-size: 17px;
                    }

                    table td {
                            transition: all .5s;
                    }

                    /* Table */
                    .data-table {
                            border-collapse: collapse;
                            font-size: 14px;
                            min-width: 537px;
                    }

                    .data-table th, 
                    .data-table td {
                            border: 1px solid #e1edff;
                            padding: 10px 17px;
                    }
                    .data-table caption {
                            margin: 7px;
                    }

                    /* Table Header */
                    .data-table thead th {
                            background-color: #508abb;
                            color: #FFFFFF;
                            border-color: #6ea1cc !important;
                            text-transform: uppercase;
                    }

                    /* Table Body */
                    .data-table tbody td {
                            color: #353535;
                    }
                    .data-table tbody td:first-child,
                    .data-table tbody td:nth-child(4),
                    .data-table tbody td:last-child {
                            text-align: right;
                    }

                    .data-table tbody tr:nth-child(odd) td {
                            background-color: #f4fbff;
                    }
                    .data-table tbody tr:hover td {
                            background-color: #ffffa2;
                            border-color: #ffff0f;
                    }
                    

                    
		</style>
              
	</head>
                    <body>
                        <ul>
                                <li><a href="main.php">Home</a></li>
                                <li><a class="active" href="listings.php">View Listings</a></li>
                                <li><a href="create.php">Create Listing</a></li>
                                <li><a href="edit.php">Edit Account</a></li>
                                <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </body>
                    <body>
                     <h1>All Listings</h1>
	<table class="data-table">
		
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Topic</th>
				<th>Author</th>
				<th>Location</th>
                                                                        <th>Seller</th>
                                                                        <th>Price</th>
                                                                        <th>View</th>
			</tr>
		</thead>
		<tbody>
		<?php
                                
                                $sql = "SELECT * FROM Book";
                                $query = mysqli_query($conn, $sql);
                
		while ($row = mysqli_fetch_array($query))
		{
                                                    //get author name
                                                      $curid = $row['ID'];
                                                      $getauth = mysqli_query($conn,"SELECT AuthorID FROM BookAuth WHERE BookID='$curid'");  
			$authid = mysqli_fetch_assoc( $getauth);
                                                      $a3 = ($authid['AuthorID']);
                                                      $getname = mysqli_query($conn, "SELECT Name FROM Author WHERE ID='$a3'");
                                                      $authname = mysqli_fetch_assoc( $getname);
                                                      
                                                      //get location name
                                                      $locid = $row['SellLocation'];
                                                      $locname = mysqli_query($conn, "SELECT Location FROM Place WHERE LocationID='$locid' ");
                                                      $locfinal = mysqli_fetch_assoc( $locname);
                                                      
                                                      $username = $_SESSION['username'];
                                                      
                                                      //display table
			echo '<tr>
					<td>'.$row['ID'].'</td>
					<td>'.$row['Title'].'</td>
					<td>'.$row['Topic'].'</td>
					<td>'.$authname['Name']. '</td>
					<td>'.$locfinal['Location'] . '</td>
                                                                                          <td>'.$row['Seller'] . '</td>
                                                                                          <td>'.$row['Price'].  '</td>';
                                                                                            if ($row['Seller'] != $username){
                                                                                         echo '<td><form  action="" method="post" ><button input type="hidden" name="sub"  type="hidden" value=" '.$row['ID']. ' ">Buy!</button></form></td>';    
                                                                                            }
				echo '</tr>';
			
                                                              
		}
                
                                                             if(isset($_POST['sub'])) {       
               
                                                                $temp = $_POST['sub'];
                                                                $sql = "DELETE FROM Book WHERE ID='$temp' ";
                                                                if ($conn->query($sql) === TRUE ) {
                                                                    echo "<script type=\"text/javascript\">window.alert('Book Purchased! It will arrive in the mail shortly.');
                                                                                    window.location.href = '/~gilesbr/books/listings.php';</script>"; 
                                                                }
                                                                else {
                                                                     echo "<script type=\"text/javascript\">window.alert('Book Purchase Fail');
                                                                                    window.location.href = '/~gilesbr/books/listings.php';</script>"; 
                                                                }
                                                              }
                
                
                ?>
		</tbody>
		
	</table>
                     
                        
                    </body>    
</html>