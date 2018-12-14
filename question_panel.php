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



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container-fluid">
<?php

include "db_connect.php";
//GLOBAL $name;
//$name = "jignesh";
//GLOBAL $testname;
//$testname = "phy";
    
    session_start();

//    $name = $_SESSION['name'];
    $name = $_SESSION['name'];
    $testname = $_SESSION['testname'];
    
    echo $name.$testname;
//    $testname = "afl";

$query = "SELECT * FROM $name WHERE testname LIKE '%$testname%'";

$result = mysqli_query($connection,$query);

if(!$result)
{
    die('Query Failed'.mysqli_error());
}
while($row = mysqli_fetch_assoc($result))
{
    $positive = $row['positive'];
    $negative = $row['negative'];
    $nquestions = $row['nquestions'];
//    echo $testname;
    
//    echo "gh".$testname;
//    echo $nquestions; 


}
?>


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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Hi Admin <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"> Logout </a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->

        </div><!-- /.container-fluid -->
    </nav>

</div>

<div class="container">
    <ol class="breadcrumb">
        <li><a href="#">Welcome <?php echo $name; ?></a></li>
        <li> Admin Dashboard </li>
        <li> Computer Science And Engineering </li>
        <li class="active"> Question_paper </li>
    </ol>
</div>
<br>

<div class="container">  <!-- CONTAINER STARTS -->


    <div class="row"> <!-- ROW 1 STARTS -->
        <form action="set_question.php" method="post">
        <?php
//            echo $nquestions;
        for ($i=0;$i<$nquestions;$i++){
            
        ?>
        <div class="col-md-4">


            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading"> Question - <?php echo $i+1 ?> </div>
                <div class="panel-body">
                    <input type="text" class="form-control" name="<?php echo 'q'.$i?>" value="" placeholder="type question here" style="width: 100%;height: 100%;" >
                </div>

                <ul class="list-group">
                    <input type="text" class="form-control" name="<?php echo $i ?>Option1" value="" placeholder="Option - 1" style="border-radius: 0px;border: 0px;" >
                    <input type="text" class="form-control" name="<?php echo $i ?>Option2" value="" placeholder="Option - 2" style="border-radius: 0px;border: 0px;" >
                    <input type="text" class="form-control" name="<?php echo $i ?>Option3" value="" placeholder="Option - 3" style="border-radius: 0px;border: 0px;" >
                    <input type="text" class="form-control" name="<?php echo $i ?>Option4" value="" placeholder="Option - 4" style="border-radius: 0px;border: 0px;" >
                    <input type="text" class="form-control" name="<?php echo $i ?>Answer" value="" placeholder="Answer" style="border-radius: 0px;border: 0px;" >
                </ul>

            </div>


        </div>
        <?php
        }
        ?>

    </div> <!-- ROW ENDS -->

    <button type="submit" class="btn btn-secondary btn-lg btn-block" style="margin-bottom: 20px;">Submit</button>
</div> <!-- CONTAINER ENDS -->
</form>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>