<?php
session_start();

if(isset($_POST['submit']) && !empty($_POST['submit'])){
    $text = $_POST['text'];

    if(!isset($_SESSION['memo'])){
        $_SESSION['memo'] = [];
    }

    $arrMemo = $_SESSION['memo'];

    $arrMemo[] = [
        "text" => $text,
        "status" => 0,
    ];

    $_SESSION['memo'] = array_values($arrMemo);
}

if(isset($_POST['delete_indivisual_item']) && !empty($_POST['delete_indivisual_item'])){
    $index = $_POST['memo_delete_id'];
    $arrMemo = $_SESSION['memo'];
    unset($arrMemo[$index]);
    $_SESSION['memo'] = array_values($arrMemo);
}

if(isset($_POST['complete_indivisual_item']) && !empty($_POST['complete_indivisual_item'])){
    $index = $_POST['memo_delete_id'];
    $arrMemo = $_SESSION['memo'];
    $arrMemo[$index]["status"]=1;
    $_SESSION['memo'] = array_values($arrMemo);
}

if(isset($_POST['complete_indivisual_item_bottom']) && !empty($_POST['complete_indivisual_item_bottom'])){
    $index = $_POST['memo_delete_id_bottom'];
    $arrMemo = $_SESSION['memo'];
    $arrMemo[$index]["status"]=0;
    $_SESSION['memo'] = array_values($arrMemo);
}


?>