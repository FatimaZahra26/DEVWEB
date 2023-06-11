<?php 
    require_once('../config.php');
    $user_id=$_GET['user_id'];
    echo "userv is".$user_id;
    if(!isset($_GET['id'])){
        echo "<script> alert('Undefined Schedule ID.'); location.replace('./') </script>";
        $conn->close();
        exit;
    }
    
    $delete = $conn->query("DELETE FROM `schedule_list` where id = '{$_GET['id']}'");

    if($delete){
        echo "<script> alert('Event has deleted successfully.')</script>";
    }else{
        echo "<pre>";
        echo "An Error occured.<br>";
       // echo "Error: ".$conn->error."<br>";
        echo "SQL: ".$sql."<br>";
        echo "</pre>";
    }
    header("location:Calendar.php?user=".$user_id);
    $conn->close();
?>