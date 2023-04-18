<?php    

session_start(); 

session_destroy();

if(isset($_SERVER['HTTP_REFERER'])) {

 header('Location: '.$_SERVER['HTTP_REFERER']);
 session_destroy();  

} else {

 header('Location: home.php');  
 session_destroy();

}

exit;  

?>