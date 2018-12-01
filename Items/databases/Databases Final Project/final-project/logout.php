<?php
              
                    session_start();
                    $blank = "loggedout";

                    $_SESSION['loggedin'] = 0;
                    $_SESSION['username'] = $blank;
                    $_SESSION['password'] = $blank;
                    
                    
                    session_destroy();
                    
                    echo "<script type=\"text/javascript\">
                    window.location.href = '/~gilesbr/books/index.html';</script>"; 
                ?>
