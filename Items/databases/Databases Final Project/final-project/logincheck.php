<?php
session_start();

if ( !isset($_SESSION['username'], $_SESSION['password']) or $_SESSION['loggedin'] == 0) {
    echo "<script type=\"text/javascript\">window.alert('Please Log in');
                    window.location.href = '/~gilesbr/books/index.html';</script>"; 
                    exit;	
}
?>
