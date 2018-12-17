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
    
    <link href="verify_account.css" rel="stylesheet">
    
    <script src="timer.js" ></script>

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
      
//      branch = $_SESSION['branch'];
      $email = $_SESSION['email'];
      
      $err_count = 0;
      $check_otp = 0;
      if(isset($_POST['verify']))
      {
          $otp = $_POST['otp'];
//          echo $otp;
      
      
            $query = "SELECT * FROM student_login WHERE (email = '$email')";

            $result = mysqli_query($connection,$query);

            if(!$result)
            {
                die('Query Failed'.mysqli_error($connection));
            }
            while($row = mysqli_fetch_assoc($result))
            {
                $fetch_otp = $row['otp'];
    //            echo $fetch_otp;
            }

          if($otp == $fetch_otp)
          {
              echo "match";
              $check_otp = 1;
              $err_count = 1;
              $err_message = "Your Account Has Been Confirmed , please Update the New Password ------>";
    //          header('Location: main_page1.php');
          }
          else
          {
              $err_count = 1;
              $check_otp = 0;
              $err_message = " Please Enter The Otp Correctly ";
              echo "not match";
          }
          
      
      }
      
      if(isset($_POST['verify1']))
      {
          $otp1 = $_POST['otp1'];
          $otp2 = $_POST['otp2'];
          
          if($otp1 == $otp2)
          {
                $query = "UPDATE student_login SET ";
                $query .= "password = '$otp1'";
                $query .= "WHERE email = '$email'";

                $result = mysqli_query($connection , $query);

                if(!$result)
                {
                    die ("QUERY FAILED".mysqli_connect($connection));
                }
                else
                {
                    header('Location: moodle_index.php');
                }
          }
      }
    ?>  
    
    <div class="container">
    
        <div class="row" id=row1>
            
            <div class="col-md-6" id=col1 >
                
                <div id=moodle_inner_layout>

                    <div class="page-header" id="moodle_header" >  
                     
                      Confirm Your Account 
                      <br><br>
                      <p style="color:green;" ><?php echo "The email has been sent to "."<b>".$email."</b>"." for verfication please confirm it ."; ?> </p>
<!--              -        <br><br>-->
                      <p style="color:orange;" ><?php if($err_count == 1){ echo $err_message; } else {  } ?> </p>

                    </div>
                    
                    <?php if($err_count == 1 && $check_otp == 1) { ?>

                    
                        
                    <?php    } else { ?>
    
                            <form action="new_password.php" method="post">

                                <input type="text" class="form-control" tabindex="1" id="input1" name="otp" placeholder="Enter Your Otp">
                                <br>
                                <input type="submit" class="btn btn-default col-md-12" tabindex="2" name=verify id=verify_button value="Confirm The Account" > 
                                <br><br><br><br>

                            </form>



                        <?php    } ?>
                
                </div>
                
               
                
                
            </div>
                 
                
            <div class="col-md-6">
                
                <div id=moodle_inner_layout>

                    <div class="page-header" id="moodle_header" >  
                     
                      Create a New <Password></Password>

                    </div>

                    <form action="new_password.php" method="post">

                        <input type="text" class="form-control" tabindex="1" id="input1" name="otp1" placeholder="New Password">
                        <br>
                        <input type="text" class="form-control" tabindex="1" id="input1" name="otp2" placeholder="Confirm New Password">
                        <br>
                        <input type="submit" class="btn btn-default col-md-12" tabindex="2" name=verify1 id=verify_button value="Confirm The Account" > 
                        <br><br><br><br>
                    </form>
                
                </div>
                
            </div>
                
        </div>
    
    </div>

    <br><br><br><br>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>