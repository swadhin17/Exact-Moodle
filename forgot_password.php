<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css?family=Mali|Patrick+Hand" rel="stylesheet"> 
    
    <link href="moodle_index.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
   <?php
      
      include "db_connect.php";
      
      session_start();
      
      $count_error = 0;
      if(isset($_POST['login']))
      {
          $username = $_POST['username'];
//          $email = $_POST['email'];
      
        $query = "SELECT * FROM student_login WHERE(name='$username') ";
        
        $result = mysqli_query($connection,$query);
        
        $row_count = mysqli_num_rows($result);
          
        if(!$result)
        {
            die('Query Failed'.mysqli_error($connection));
        }
        if($row_count == 1)
        {    
//            echo "hi";
            
            while($row = mysqli_fetch_assoc($result))
            {

                $fetch_password = $row['password'];
                $fetch_username = $row['name'];
                $branch = $row['branch'];
                
                $email = $row['email'];
            }
            
            $_SESSION['email']  = $email;
            
            $i = 0;   
            $pin = "";
            while($i < 4)
            {
                $pin .= mt_rand(0, 9);
                $i++;
            }

//            echo $pin, '<br>';

//            $_SESSION['otp'] = $pin;
          
          $to = $email;
        $subject = "Email Verification";
        $txt = "Your OTP is  : $pin "  ; 
        $headers = "From: savanjasanidot5@gmail.com" . "\r\n" ;

        $mail = mail($to,$subject,$txt,$headers);
          
          if($mail)
          {
//                echo "done-;";
              
                $query = "UPDATE student_login SET ";
                $query .= "otp = '$pin'";
                $query .= "WHERE name = '$fetch_username'";

                $result = mysqli_query($connection , $query);

                if(!$result)
                {
                    die ("QUERY FAILED".mysqli_connect($connection));
                }
              
              header('Location: new_password.php');
          }
          else
          {
            $query = "UPDATE student_login SET ";
                $query .= "otp = '$pin'";
                $query .= "WHERE name = '$fetch_username'";

                $result = mysqli_query($connection , $query);

                if(!$result)
                {
                    die ("QUERY FAILED".mysqli_connect($connection));
                }
              
              header('Location: new_password.php');
          }
            
        
        }
          else
            {
//              echo "not hi";
                $count_error = 1;
//                echo $count_error;
                $error = "Please insert the correct username or email";
    //            header('Location: moodle_index.php');

                
            }
      
            
      }
      
    ?>    
            <a href="moodle_index.php" type="button" class="btn btn-default" style="float: right;margin: 30px 20px;" > Back </a>
          
    
    <div class="container">
       
        <div class="row" id=moodle_row >
            
            <div class="col-xs-12 col-sm-12 col-md-3"></div>
            
            <div class="col-xs-12 col-sm-12 col-md-6" id=moodle_layout >
                
            <div id=moodle_inner_layout     >

                    <div class="page-header" id="moodle_header" >  
                      <h4>  Forgot Your Password ? </h4>
                        
                        <br>
                        <p style="color:red;" ><?php if($count_error == 1){ echo $error; } else {  } ?> </p>
                        
                        
                        
                        

                    </div>

                <form action="forgot_password.php" method="POST" role="form">

                        <input type="text" name="username"  class="form-control" id="input1" placeholder="Enter Your Username" required>
                        <br>

                    <button type="submit" class="btn btn-primary col-md-12 " name="login" id="moodle_login" >Submit</button>
                    <br><br>
                    
                </form>    


            </div>
                    
                
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-3" id="moodle_layou" ></div>

            
        </div>
        
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>