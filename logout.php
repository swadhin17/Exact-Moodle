<?php

session_start();

if(isset($_SESSION['X']))
{
    session_destroy();
    
    echo "<script>alert('You are Logged Out Successfully')</script>";
    echo "<script>location.href='moodle_index.php'</script>";
    
}
else
{
    echo "<script>location.href='moodle_index.php'</script>";
}

?>