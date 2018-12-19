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
    
    <link href="co.css" rel="stylesheet">
    
    <script src="iframe.js" ></script>
    
    <script src="key.js" ></script>
<!--    <script src="on_load.js" ></script>-->

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
      
      $active_name = $_SESSION['name'];
//      echo "name".$active_name;
//      $branch = $_SESSION['branch'];
////      echo "branch".$branch;
//      $full_branch = $branch;
//      $email = $_SESSION['email'];
      
      if($_POST)
      {
          
            foreach($_POST as $name => $content) 
        {
//            echo $name;
        }
          
          $name = explode("_",$name);
//        print_r($name);
        
        $new_name = "";
        $total = count($name);
        while($total != 0)
        {
            $ori_name = $name;
            $dub_name = $ori_name[$total - 1];
//            echo $dub_name;
            $new_name = $dub_name." ".$new_name;
//            echo $new_name;
            $total = $total - 1;
        }
//        echo $new_name."<br>";
        
        $branch = $new_name;
          
        $_SESSION['current_branch'] = $branch;   
          
//        echo $_SESSION['current_branch'];
      
//        echo $name."<br>";
      
//       if($name == "Computer Sciecne And Engineering "){ $name = "cse" ;}
//       elseif($name == 'Electronics And Communicaton Engineering '){ $name = "ece";  }
//       elseif($name == 'Statistics And Probability '){ $name = "maths";  }
      
      
//      echo $branch;
      
//      $branch = $new_name;
      
          if($branch == "Computer Sciecne And Engineering "){ $branch = "cse" ;}
       elseif($branch == 'Electronics And Communicaton Engineering '){ $branch = "ece";  }
       elseif($branch == 'Statistics And Probability '){ $branch = "maths";  }
        else {  $branch = $_SESSION['current_branch']; }  
             
      
          $_SESSION['current_branch'] = $branch;
          
      }
//          echo $name;
          
      
      
//      $branch = $new_name;
      
//        if($full_branch == 'cse'){ $full_branch = "Computer Sciecne And Engineering";  }
//        elseif($full_branch == 'ece'){ $full_branch = "Electronics And Communicaton Engineering";  }
//        elseif($full_branch == 'maths'){ $full_branch = "Statistics And Probability";  }
//        else{ $full_branch = "Others";  }

      
          
    $branch = $_SESSION['current_branch'];      
      
  ?>
   
        <div class="container-fluid">
           
           
           
            
            <nav class="navbar navbar-default navbar-fixed-top ">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <a class="navbar-brand" href="#"> Foodle Moodle </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                      <ul class="nav navbar-nav navbar-right">
                        <li><a href="main_page.php"> Home Page </a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Hi <?php echo ucfirst($active_name); ?> <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="logout.php"> Logout </a></li>
                          </ul>
                        </li>
                      </ul>
                    </div><!-- /.navbar-collapse -->

                  </div><!-- /.container-fluid -->
            </nav>
            
        </div>   
    
    
    
      <div class="container">
        <ol class="breadcrumb">
          <li>Welcome <?php echo ucfirst($active_name); ?></li>
            <li><a href="main_page1.php"> Student Dashboard </a></li>
            <li> <?php echo $branch; ?> </li>
        </ol>   
        </div>
       
        
        <div class="container">
        <div class="row">
        
        <div class="col-md-6">
         
              <div class="page-header">
                  <h3> Assignments Conducted </h3>
              </div>
               
            <div id="list-example" class="list-group">
             
             <form action="co_sample.php" method="post">
             
             <?php
                 
                 $branch = $_SESSION['current_branch'];
                 
                // echo $branch;
                
                 $query = "SELECT * FROM admin WHERE (branch='$branch') ";
        
                $result = mysqli_query($connection,$query);

                if(!$result)
                {
                    die('Query Failed'.mysqli_error());
                }
                
                $num = 1; 
                while($row = mysqli_fetch_assoc($result))
                {
                    
                    $id = $row['id'];
                    $uploader_name = $row['uploader_name'];
                    $uploaded_time = $row['uploaded_time'];
                    $ass_no = $row['ass_no'];
                    $branch = $row['branch'];
                    $ass_name = $row['ass_name'];
                    $file_name = $row['file_name'];
                    $time = $row['submission_date'];
                

//                echo $ass_no;
                 
                ?> 
                 
                 <button type="submit"  class="list-group-item list-group-item-action" href="<?php echo "people".$id.".html"; ?>" target="co" name="<?php echo $id." ".$ass_no." ".$branch; ?>" ><b>Assignment</b> <?php echo "<b>".$ass_no."</b>"."<small>"." was uploaded on ".$uploaded_time." by ".$uploader_name." sir"."</small>"; ?> </button>
                 
              <?php $num = $num + 1; }  ?>
            
            </form> 
               
                     
                                
            </div>
            
        </div>
        
        <div class="col-md-6">
         
         <div class="page-header">
          <h3> Tests Conducted </h3>
        </div>

         
          <form action=test_authentication.php method="post">
           
           <?php
                 
                 $branch = $_SESSION['current_branch'];
                
//                echo $branch;
                 $query = "SELECT * FROM admin_login WHERE (branch='$branch')";
        
                $result = mysqli_query($connection,$query);

                if(!$result)
                {
                    die('Query Failed'.mysqli_error($connection));
                }
                
                $num = mysqli_num_rows($result);
//                echo $num;
                while($row = mysqli_fetch_assoc($result))
                {
                    $teacher_name = $row['name'];
//                    echo $teacher_name;
//                    echo "dFdf";
                    $test_name_query = "SELECT * FROM $teacher_name ";
        
                    $test_name_result = mysqli_query($connection,$test_name_query);

                    if(!$test_name_result)
                    {
                        die('Query Failed'.mysqli_error($connection));
                    }
                    
                    while($row = mysqli_fetch_assoc($test_name_result))
                    {
                        $test_name = $row['testname'];
            
            ?>
                 
                 <button type="submit"  class="list-group-item list-group-item-action" href="<?php echo "people".$id.".html"; ?>" target="co" name="<?php echo $teacher_name." ".$test_name; ?>"> <?php echo $test_name; ?>  </button>
                 
              <?php  } }  ?>
            
            </form>
        </div>
    
    

      </div>    
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>