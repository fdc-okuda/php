<?php

session_start();

if(isset($_POST['submit']) && !empty($_POST['submit'])){
    $title = $_POST['title'];
    $date = $_POST['date'];
    $textarea = $_POST['textarea'];

    if(!empty($date)){

        $file = $_FILES['file'];

    if(!isset($_SESSION["cal"])){
        $_SESSION["cal"] = [];
    }

    $_SESSION["cal"] = [
        'title' => $title,
        'date' => $date,
        'textarea' => $textarea,
    ];

    header('Location: ./');
    exit;
  }
}

?>