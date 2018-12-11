<?php
    
    include "db_connect.php";
    
    session_start();
    $active_admin = $_SESSION['name'];

      if(isset($_FILES['file']))
       {
          $file_name = $_FILES['file']['name'];
          $file_size =$_FILES['file']['size'];
          $file_tmp =$_FILES['file']['tmp_name'];

          echo $file_name;

         move_uploaded_file($file_tmp,"uploads/".$file_name);

       }

    if(isset($_POST['upload']))
    {
        $branch = $_POST['branch'];
        $ass_no = $_POST['ass_no'];
        $ass_name = $_POST['ass_name'];
        $submission_date = $_POST['submission_date'];
        
        echo $branch;

        $query = "INSERT INTO admin(branch,ass_no,ass_name,file_name,submission_date,uploader_name)";
        $query .= "VALUES ('$branch' , '$ass_no' , '$ass_name' , '$file_name' , '$submission_date' , '$active_admin')";
        
        $result = mysqli_query($connection,$query);
        
        if(!$result)
        {
            die('Query Failed'.mysqli_error($connection)); 
        }
        
        header('Location: admin_main_page.php');
    }
?>