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

        session_start();

        $name = $_SESSION['name'];    
//        $name = "jignesh";
//        echo $name;
    
        if(isset($_POST['submit'])){
            $testname = $_POST['testname'];
            $nquestions = $_POST['nquestions'];
            $positive = $_POST['pos'];
            $negative = $_POST['neg'];
            $testtime = $_POST['time'];
            $password = $_POST['password'];
//            echo $testname;
//            echo $nquestions;
//            echo $positive;
//            echo $negative;
            
            $_SESSION['testname'] = $testname;

            $query = "INSERT INTO $name(testname,nquestions,positive,negative,testtime,password) ";
            $query .= "VALUE('{$testname}','{$nquestions}','{$positive}','{$negative}','{$testtime}','{$password}')";

            $test_set_query =  mysqli_query($connection,$query);
            if(!$test_set_query){
            die("query failed".mysqli_error($connection));
        }

            header('Location: question_panel.php');
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Hi <?php echo $name; ?> <span class="caret"></span></a>
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
        <li class="active"> Question_settings </li>
    </ol>
</div>

<br>

<div class="container">
    <form class="form-horizontal" method="post" action="about_questions.php">
        <div class="form-group">
            <label for="testname" class="col-sm-2 control-label">test name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="testname" placeholder=" Enter name of test" name="testname">
            </div>
        </div>
        <div class="form-group">
            <label for="nquestions" class="col-sm-2 control-label">no. of questions</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="nquestions" placeholder=" Enter no. of questions" name="nquestions">
            </div>
        </div>
        <div class="form-group">
            <label for="pos" class="col-sm-2 control-label">positive marks</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="pos" placeholder="Positive marks" name="pos">
            </div>
        </div>

        <div class="form-group">
            <label for="neg" class="col-sm-2 control-label">negative marks</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="neg" placeholder="negetive marks" name="neg">
            </div>
        </div>

        <div class="form-group">
            <label for="neg" class="col-sm-2 control-label">test time</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="time" placeholder="test time" name="time">
            </div>
        </div>

        <div class="form-group">
            <label for="testname" class="col-sm-2 control-label">test password</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="password" placeholder=" Enter password" name="password">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-6 col-sm-10">
                <button type="submit" class="btn btn-default" name="submit">done</button>
            </div>
        </div>
    </form>

</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
