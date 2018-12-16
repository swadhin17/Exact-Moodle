<?php

session_start();

        if($_POST)
        {
          
            foreach($_POST as $name => $content) 
            {
//                echo $name;
            }
          
          $name = explode("_",$name);
            
//            echo $name[0].$name[1];
            
            $teacher = $name[0];
            $testname = $name[1];
            
            $_SESSION['teacher'] = $teacher;
            $_SESSION['testname'] = $testname;
            
//            header('Location: test_authentication.php');

        }

//$testname = "phy";
//$teacher = "jignesh";

if($_POST)
{
    $gotpass = $_POST['password'];
include "db_connect.php";
$query = "SELECT * FROM $teacher WHERE testname LIKE '%$testname%'";

$result = mysqli_query($connection,$query);

if(!$result)
{
    die('Query Failed'.mysqli_error($connection));
}
while($row = mysqli_fetch_assoc($result))
{
    $pin = $row['password'];
    echo $pin;
}

    if(strcmp($pin,$gotpass)==0){
        echo "matched";
        header('Location: disp_questions.php');
    }
    else
    {
        echo "not matched";
        header('Location: test_authentication.php');

    }

}
?>