<?php

session_start();
    $username =$_POST['Username'];
    $password = $_POST['Password'];
    $bool = true;
    $pass=md5($password);

   

    $conn=mysqli_connect("localhost", "root", "") or die (mysqli_error()); //Connect to server
    mysqli_select_db($conn,"cib") or die ("Cannot connect to database"); //Connect to database
    $query = mysqli_query($conn,"Select * from users WHERE BINARY username='$username'"); // Query the users table
    $exists = mysqli_num_rows($query); //Checks if username exists

    if($exists > 0) //IF there are no returning rows or no existing username
    {
       while($row = mysqli_fetch_assoc($query)) // display all rows from query
       {
          $table_username = $row['username']; // the first Email row is passed on to $table_users, and so on until the query is finished
          $table_password = $row['password']; // the first password row is passed on to $table_password, and so on until the query is finished
            $userlevel = $row['userLevel'];
           $profilepic = $row['profilePic'];
           $email = $row['email'];
           $phone = $row['phone'];
           $office = $row['office'];
           $branch = $row['branch'];
           $bio = $row['bio'];
       }
       if(($username == $table_username) && ($pass == $table_password))// checks if there are any matching fields
       {
          if($pass == $table_password)
          { 
             $_SESSION['user'] = $table_username;
             $_SESSION['profilePic'] = $profilepic;
             $_SESSION['myemail'] = $email;
             $_SESSION['myphone'] = $phone;
             $_SESSION['myline'] = $office;
             $_SESSION['mybranch'] = $branch;
            $_SESSION['mybio'] = $bio;
            $_SESSION['myuserlevel'] = $userlevel;
             $_SESSION['LAST_ACTIVITY'] = time();
             $lastLogin = mysqli_query($conn,"UPDATE users SET lastLogin = CURRENT_TIMESTAMP WHERE username = '{$_SESSION['user']}'");
              
              if(isset($_SESSION['loginError']) || isset($_SESSION['failedUsername'] )){
                 unset($_SESSION['loginError']);
                 unset($_SESSION['failedUsername']);
              }
//set the username in a session. This serves as a global variable
        if($userlevel==1){
          header("location: home.php");  
                }// redirects the user to the specific authenticated home page
            elseif($userlevel==2){
            header("location: admin.php");   
            }// redirects the user to the specific authenticated home page
            elseif($userlevel==3){
            header("location: supplier.php");   
            } // redirects the user to the specific authenticated home page
            elseif($userlevel==4){
            header("location: approver.php");   
            }// redirects the user to the specific authenticated home page
            elseif($userlevel==5){
            header("location: finance.php");   
            }// redirects the user to the specific authenticated home page
        
          }}
       
       else
       { $_SESSION['loginError'] = "Incorrect password !";
        $_SESSION['failedUsername'] = $username;
          header("location: index.php");
       }
    }
    else
    {
       $_SESSION['loginError'] = "Username does not exist !";
        header("location: index.php"); // redirects to login page
    }
	
	?>