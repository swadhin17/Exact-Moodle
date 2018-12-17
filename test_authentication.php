<?php
/**
 * Created by PhpStorm.
 * User: Swadhin
 * Date: 11/6/2018
 * Time: 4:13 PM
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link type="text/css" rel="stylesheet" href="admin_main_page.css" >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="answer_panel.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .jumbotron p{
            font-size: 15px;
            font-weight: 200;
        }
    </style>
</head>
<body>
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
    
//            $active_name = $_SESSION['name'];
            $active_name = $_SESSION['name'];
        
        }
    
    $active_name = $_SESSION['name'];
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
                    <!--        <li><a href="#">Link</a></li>-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Hi <?php echo $active_name; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="logout.php"> Logout </a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->

        </div><!-- /.container-fluid -->
    </nav>

</div>

<!--note --- this is for students so take a note of it-->

<div class="container">
    <ol class="breadcrumb">
        <li><a href="main_page1.php">Welcome <?php echo $active_name; ?></a></li>
        <li> Student Dashboard </li>
        <li> Computer Science And Engineering </li>
        <li class="active"> Answer_paper </li>
    </ol>
</div>

<div class="container">

    <div class="jumbotron">
        <h2 style="text-align: center;">Rules</h2>
        <hr>
        <p>1. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab et magni maiores modi nesciunt, nisi quisquam tenetur ullam voluptates. Accusantium alias animi atque dignissimos excepturi exercitationem quos rerum. Dolores, hic!</p>
        <p>2. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab et magni maiores modi nesciunt, nisi quisquam tenetur ullam voluptates. Accusantium alias animi atque dignissimos excepturi exercitationem quos rerum. Dolores, hic!</p>
        <p>3. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab et magni maiores modi nesciunt, nisi quisquam tenetur ullam voluptates. Accusantium alias animi atque dignissimos excepturi exercitationem quos rerum. Dolores, hic!</p>
        <p>4. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab et magni maiores modi nesciunt, nisi quisquam tenetur ullam voluptates. Accusantium alias animi atque dignissimos excepturi exercitationem quos rerum. Dolores, hic!</p>

    <form class="form-inline" style="margin-left: 30%" action="test_pass.php" method="post">

        <div class="form-group mx-sm-3 mb-2">
            <label for="inputPassword2" class="sr-only">Password</label>
            <input type="password" class="form-control" id="inputPassword2" placeholder="Password" name="password">
        </div>
        <button type="submit" name="<?php echo $teacher." ".$testname; ?>" class="btn btn-primary mb-2">submit test password</button>
    </form>
    </div>
</div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
