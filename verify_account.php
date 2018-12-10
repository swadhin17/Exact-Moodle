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
      
      $name = $_SESSION['name'];
      $branch = $_SESSION['branch'];
      $email = $_SESSION['email'];
      
      echo $name.$branch.$email;
      
      if(isset($_POST['verify']))
      {
          $otp = $_POST['otp'];
          echo $otp;
      }
      
        $query = "SELECT * FROM student_login WHERE (name = '$name' AND branch = '$branch')";
        
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
          
          header('Location: main_page1.php');
      }
      else
      {
          echo "not match";
      }
          
      
    ?>  
    
    <div class="container">
    
        <div class="row" id=row1>
            
            <div class="col-md-3"></div>
            
            <div class="col-md-6" id=col1 >
                
                <div id=moodle_inner_layout>

                    <div class="page-header" id="moodle_header" >  
                     
                      <h4> Confirm Your Account </h4>

                    </div>

                    <form action="verify_account.php" method="post">

                        <input type="text" class="form-control" tabindex="1" id="input1" name="otp" placeholder="Enter Your Otp">
                        <br>
                        <p class="warning_otp" > Enter the otp before it expires <button class="btn btn-default" id=otp_button > 5 : 01 minutes </button> </p>
                        <br>
                        <input type="submit" class="btn btn-default col-md-12" tabindex="2" name=verify id=verify_button value="Confirm The Account" > 
                        <br><br><br><br>
                        
                    </form>
                
                </div>
                
               
                
                
            </div>
                 
                
            <div class="col-md-3"></div>
                
        </div>
    
    </div>

    <br><br><br><br>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>