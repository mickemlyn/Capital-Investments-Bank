<?php 
echo time();
echo date(('Y-m-d H:i:s'));

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    unset($_SESSION['user']);
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


if( isset( $_SESSION['counter'] ) )
{
$_SESSION['counter'] += 1;
}
else
{
$_SESSION['counter'] = 1;
}
$msg = "You have visited this page ".
$_SESSION['counter'];
$msg .= "in this session.";
test_input()
?>

