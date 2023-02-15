<?php
session_start();
date_default_timezone_set("asia/baku");
require_once "./app/connection.php";
$DB = new DBConnection;
require_once "./app/crud.php";
$CRUD = new crud;
if (isset($_POST['login'])) {
   $email=strtolower($_POST['email']);
   $pass=md5($_POST['password']);
   $user=$CRUD->select('user',false,"*",['email'=>$email,'pass'=>$pass],"WHERE email=:email AND password=:pass");
   if($user){
    $_SESSION['email']=$user['email'];
    header("location:student.php?login_success=ok");
   }
   else{
    header("location:login.php?login_success=no");
    exit;
   }
}


