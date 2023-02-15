<?php
session_start();
date_default_timezone_set("asia/baku");
require_once "./app/connection.php";
$DB = new DBConnection;
require_once "./app/crud.php";
$CRUD = new crud;
if(!isset($_SESSION['email'])){
    header("location:index.php");
}
else{
    if (isset($_POST['add_student'])) {
        $col = "
        fullname=:fullname,
        email=:email,
        phone=:phone,
        package=:package,
        kqt=:kqt
        ";
        $col = preg_replace('/\s+/', '', $col);
        $arr = [
            'fullname' => mb_strtolower($_POST['fullname']),
            'email' => mb_strtolower($_POST['email']),
            'phone' => $_POST['phone'],
            'package' => $_POST['package'],
            'kqt' => date("Y-m-d")
        ];
        $ins = $CRUD->insert('student', $col, $arr);
        if ($ins) {
            header("location:student.php?student=ok");
            exit;
        } else {
            header("location:index.php?student=no");
            exit;
        }
    }
    $students = $CRUD->select('student', true);
    if (isset($_GET['delete']) && $_GET['delete'] == "ok") {
        $del = $CRUD->delete('student', $_GET['id']);
        if ($del) {
            header("location:student.php?delete=ok");
            exit;
        } else {
            header("location:student.php?delete=no");
        }
    }
    
    if (isset($_POST['edit_student'])) {
        $col = "
        fullname=:fullname,
        email=:email,
        phone=:phone,
        package=:package
        ";
        $col = preg_replace('/\s+/', '', $col);
        $arr = [
            "fullname" => mb_strtolower($_POST['fullname']),
            "email" => mb_strtolower($_POST['email']),
            "phone" => $_POST['phone'],
            "package" => $_POST['package'],
            "id" => $_POST['edit_id']
        ];
        $upd = $CRUD->update("student", $col, $arr,"WHERE id=:id");
        if ($upd) {
            header("location:student.php?edit=ok");
            exit;
        } else {
            header("location:student.php?edit=no");
            exit;
        }
    }
}

