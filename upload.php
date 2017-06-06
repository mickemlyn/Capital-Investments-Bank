<?php
session_start();
require 'connections.php';
header('Content-Type: application/json');
    $uploaded = [];
    $allowed = ['jpg','png','jpeg'];
    $succeeded = [];
    $failed = [];
if(!empty($_FILES['file'])){
    foreach($_FILES['file']['name'] as $key =>$name){
        if($_FILES['file']['error'][$key]===0){
            $temp = $_FILES['file']['tmp_name'][$key];
            $ext = explode('.',$name);
            $ext = strtolower(end($ext));
            $file = (md5_file($temp).time().'.'.$ext);
            if((in_array($ext, $allowed) === true) && (move_uploaded_file($temp,"uploads/{$file}") === true)){
                $succeeded[]=array( 'name' => $name,'file'=>$file);
                $filelocation = "uploads/{$file}";
                 $updateprofilechange = mysqli_query($conn,"UPDATE users SET profileChange = CURRENT_TIMESTAMP , profilePic = '{$filelocation}'  WHERE username = '{$_SESSION['user']}'");
                //Refresh profile picture
                $_SESSION['profilePic'] = $filelocation;
                
            } 
            else{
                $failed[] = array( 'name'=>$name );
                if(in_array($ext, $allowed) === false){ 
                    $erroroccured = "invalid image format";
             }
        }
    }
    if(!empty($_POST['ajax'])){
        echo json_encode(array('succeeded'=>$succeeded, 'failed'=>$failed ));
    }
    exit();
}
}
?>