<?php
date_default_timezone_set("asia/baku");
require_once "../app/connection.php";
$DB = new DBConnection;
require_once "../app/crud.php";
$CRUD = new crud;
if (isset($_POST['view']) && $_POST['view'] == "ok") {
    $data = $CRUD->select("student", false, "*", ["id" => $_POST['id']], "WHERE id=:id");
    if ($data) {
        echo json_encode($data, true);
    } else {
        echo [];
    }
}
if (isset($_POST['login_email']) && $_POST['login_email'] == "ok") {
    $data = $CRUD->select('user', false, "*", ['email' => $_POST['email']], "WHERE email=:email");
    if ($data) {
        echo json_encode([
            "status" => true
        ], true);
    } else {
        echo json_encode([
            "status" => false
        ], true);
    }
}
if (isset($_POST['sign_email']) && $_POST['sign_email'] == "ok") {
    $data = $CRUD->select('user', false, "*", ['email' => $_POST['email']], "WHERE email=:email");
    if ($data) {
        echo json_encode([
            "status" => true
        ], true);
    } else {
        echo json_encode([
            "status" => false
        ], true);
    }
}
if (isset($_POST['add_phone']) && $_POST['add_phone'] == "ok") {
    $data = $CRUD->select('student', false, "*", ['phone' => $_POST['phone']], "WHERE phone=:phone");
    if ($data) {
        echo json_encode([
            "status" => true
        ], true);
    } else {
        echo json_encode([
            "status" => false
        ], true);
    }
}
if (isset($_POST['edit_phone']) && $_POST['edit_phone'] == "ok") {
    $data = $CRUD->select('student', false, "*", ['phone' => $_POST['phone']], "WHERE phone=:phone");
    if ($data) {
        echo json_encode([
            "status" => true
        ], true);
    } else {
        echo json_encode([
            "status" => false
        ], true);
    }
}