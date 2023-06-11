<?php 
    require_once('../config.php');
    $title=$_POST['title'];
    $description=$_POST['description'];
    $end_datetime=$_POST['end_datetime'];
    $start_datetime=$_POST['start_datetime'];
    $user_id=$_POST['user_id'];
    $id=$_POST['id'];
   
    if($_SERVER['REQUEST_METHOD'] !='POST'){
        echo "<script> alert('Error: No data to save.'); location.replace('./') </script>";
        $conn->close();
        exit;
    }

    extract($_POST);
    $allday = isset($allday);
    session_start();
    $user_email= $_GET['email']; 
    if(empty($id)){
        $sql = "INSERT INTO `schedule_list` (`title`,`description`,`start_datetime`,`end_datetime`,`user_id`) VALUES ('$title','$description','$start_datetime','$end_datetime','$user_id')";
    }else{
        $sql = "UPDATE `schedule_list` set `title` = '{$title}', `description` = '{$description}', `start_datetime` = '{$start_datetime}', `end_datetime` = '{$end_datetime}' where `id` = '{$id}'";
    }

    $save = $conn->query($sql);

    if($save){
        echo "<script> alert('Schedule Successfully Saved.'); location.replace('./Calendar.php') </script>";
    }else{
        
        echo "<pre>";
        echo "An Error occured.<br>";
        //echo "Error: ".$conn->error."<br>";
        echo "SQL: ".$sql."<br>";
        echo "</pre>";
    }
    header("location:Calendar.php?user=".$user_id);
    $conn->close();
?>