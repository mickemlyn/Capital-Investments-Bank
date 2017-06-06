<?php
session_start();
header('Content-Type: application/json');
    $uploaded = [];
    $allowed = ['jpg','png','jpeg'];
    $succeeded = [];
    $failed = [];
if(!empty($_FILES['file'])){
    $sizeofimage = $_FILES["file"]["size"];
    $_SESSION['picsize'] =  $sizeofimage;
    foreach($_FILES['file']['name'] as $key =>$name){
        if($_FILES['file']['error'][$key]===0){
            $temp = $_FILES['file']['tmp_name'][$key];
            $ext = explode('.',$name);
            $ext = strtolower(end($ext));
            $file = (md5_file($temp).time().'.'.$ext);
            if((in_array($ext, $allowed) === true)  && (move_uploaded_file($temp,"itemimages/{$file}") === true)){
                $succeeded[]=array( 'name' => $name,'file'=>$file);
                $filelocation = "itemimages/{$file}";
                $_SESSION['currentItemPic'] = $filelocation;
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