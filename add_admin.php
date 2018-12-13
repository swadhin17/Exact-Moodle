<?php


if(isset($_POST['new_admin']))
{
    include "db_connect.php";   
    
    session_start();
    
    $by_name = $_SESSION['name'];
    
  $name = $_POST['name'];
  $password = $_POST['password'];
  $branch = $_POST['subject'];    
    

        $query = "INSERT INTO admin_login(name,password,branch,by_name)";
        $query .= "VALUES ('$name','$password','$branch','$by_name')";
        
        $result = mysqli_query($connection,$query);
        
        if(!$result)
        {
            die('Query Failed'.mysqli_error($connections)); 
        }
    
        $create_table = "CREATE TABLE IF NOT EXISTS $name(
        id int(10) NOT NULL AUTO_INCREMENT,
        nquestions int(10) NOT NULL,
        positive int(10) NOT NULL,
        negative int(10) NOT NULL,
        testname varchar(256) NOT NULL ,
        questions varchar(256) NOT NULL ,
        options varchar(256) NOT NULL ,
        answers varchar(256) NOT NULL ,
        password varchar(256) NOT NULL ,
        testtime int(10) NOT NULL,
        students varchar(256) NOT NULL ,
        PRIMARY KEY (id)
      )";

        $create_table_result = mysqli_query($connection,$create_table);

        if(!$create_table_result)
        {
            die('Query Failed'.mysqli_error($connection)); 
        }
    
        header('Location: admin_main_page.php');
    
}








?>