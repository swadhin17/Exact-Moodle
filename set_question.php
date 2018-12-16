<?php

include "db_connect.php";
//$testname = "phy";
//$name = "jignesh";

session_start();

//$student = $_SESSION['name'];
$name = $_SESSION['name'];
$testname = $_SESSION['testname'];

echo $name.$testname;


    if($_POST)
    {
        foreach($_POST as $id_name => $content)
        {
//            echo "The HTML name: $id_name <br>";
//            echo "The HTML name: $content <br>";

            $query = "SELECT * FROM $name WHERE testname LIKE '%$testname%'";

            $fetch_result = mysqli_query($connection,$query);

            if(!$fetch_result)
            {
                die('Query Failed'.mysqli_error($connection));
            }

            if(substr_count($id_name,"q")==1){

            while($row = mysqli_fetch_assoc($fetch_result))
            {
                $questions = $row['questions'];

                if($questions!="")
                {
                    $questions_substr = substr($questions,0);
//                    $questions_explode = explode(" $ ",$questions_substr);
                    $questions = $questions_substr." $ ".$content;

                }
                else
                {
                    $questions = " $ ".$content;
                }
                $query = "UPDATE $name SET ";
//                $query .= "questions = '$questions' , ";
                $query .= "questions = '$questions'";
                $query .= "WHERE testname = '$testname'";

                $result = mysqli_query($connection , $query);

                if(!$result)
                {
                    die ("QUERY FAILED");
                }


            }
            }

            if(substr_count($id_name,"Option")==1){

                while($row = mysqli_fetch_assoc($fetch_result))
                {
                    $options = $row['options'];

                    if($options!="")
                    {
                        $options_substr = substr($options,0);
//                        $options_explode = explode(" $ ",$options_substr);
                        $options = $options_substr." $ ".$content;

                    }
                    else
                    {
                        $options = " $ ".$content;
                    }
                    $query = "UPDATE $name SET ";
//                $query .= "questions = '$questions' , ";
                    $query .= "options = '$options'";
                    $query .= "WHERE testname = '$testname'";

                    $result = mysqli_query($connection , $query);

                    if(!$result)
                    {
                        die ("QUERY FAILED");
                    }


                }
            }

            if(substr_count($id_name,"Answer")==1){

                while($row = mysqli_fetch_assoc($fetch_result))
                {
                    $answers = $row['answers'];

                    if($answers!="")
                    {
                        $answers_substr = substr($answers,0);
//                        $questions_explode = explode(" $ ",$questions_substr);
                        $answers = $answers_substr." $ ".$content;

                    }
                    else
                    {
                        $answers = " $ ".$content;
                    }
                    $query = "UPDATE $name SET ";
//                $query .= "questions = '$questions' , ";
                    $query .= "answers = '$answers'";
                    $query .= "WHERE testname = '$testname'";

                    $result = mysqli_query($connection , $query);

                    if(!$result)
                    {
                        die ("QUERY FAILED");
                    }


                }
            }


        }


header('Location: admin_main_page.php');
    }
        
?>

