<!DOCTYPE html>
<html lang="en">
<head>
    <link type="text/css" rel="stylesheet" href="admin_main_page.css" >
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <link rel="stylesheet" href="admin.css">

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

<?php
    
    session_start();
//    $name = "swadhin"; 
    $name = $_SESSION['name'];
    
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Hi student<span class="caret"></span></a>
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
          <li>Welcome <?php echo $name; ?></li>
            <li class="active"><a href="main_page1.php"> Dashboard </a></li>
        </ol>   
        </div>


<div class="page-header">
    <p class="para1" > Student Status </p>

</div>



<div class="container">
    <div class="table-responsive">
        <table class="table table-hover table-striped" >


            <thead>
            <th> Test Name </th>
            <th> Total Marks </th>
            <th> Your Score </th>
<!--            <th> Subject </th>-->
            </thead>

            <tbody>


            <?php

            include "db_connect.php";

            $query = "SELECT * FROM $name ";

            $result = mysqli_query($connection,$query);

            if(!$result)
            {
                die('Query Failed'.mysqli_error($connection));
            }
            while($row = mysqli_fetch_assoc($result))
            {
            $testname = $row['testname'];
            $score = $row['marks'];
            $total = $row['total_marks'];
//            $time = $row['uploaded_time'];

            //            $substr = substr($assignment_no_student,3);
            //
            //            $explode = explode(" , ",$name);
            //
            //            print_r($explode);
            //            $post_total = count($explode);

            ?>

            <tr>
                <td> <?php echo $testname; ?> </td>
                <td> <?php echo $total; ?>  </td>
                <td> <?php echo $score; ?> </td>
<!--                <td>  </td>-->

            </tr>


            <?php  } ?>

            </tbody>


        </table>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>