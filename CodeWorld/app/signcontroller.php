<?php
session_start();
date_default_timezone_set("asia/baku");
require_once "./app/connection.php";
$DB = new DBConnection;
require_once "./app/crud.php";
$CRUD = new crud;
if (isset($_POST['send'])) {
    $col ="
    fullname=:fullname,
    email=:email,
    password=:password,
    created_at=:created_at
    ";
    $col = preg_replace('/\s+/', '', $col);
    $arr = [
        "fullname" =>$_POST['fullname'],
        "email" => $_POST['email'],
        "password" => md5($_POST['password']),
        "created_at" => date("Y-m-d H:i:s")
    ];
    $ins = $CRUD->insert('user', $col, $arr);
    if ($ins) {
        header("location:student.php?success=ok");
        exit;
    } else {
        header("location:index.php?success=no");
        exit;
    }
}


