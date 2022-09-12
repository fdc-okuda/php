<?php

session_start();

if(isset($_POST["add_to_cart"]) && !empty($_POST["add_to_cart"])){

    $form_image = $_POST["form_image"];
    $form_name = $_POST["form_name"];
    $form_price = $_POST["form_price"];
    $form_code = $_POST["form_code"];
    $form_quantity = $_POST["form_quantity"];

    if(!isset($_SESSION["shopping_cart"])){
        $_SESSION["shopping_cart"] = [];
    }

    $arr_shopping_cart = $_SESSION["shopping_cart"];

    $arr_found_id = false;
    
    for($i=0; $i < count($arr_shopping_cart); $i++){
        $item = $arr_shopping_cart[$i];
        if($form_code == $item["form_code"]){
            $arr_found_id = $i;
        }
    }
    if($arr_found_id !== false){
        $arr_shopping_cart[$arr_found_id]['form_quantity'] = $arr_shopping_cart[$arr_found_id]['form_quantity']+$form_quantity;
        
    } else {
        $arr_shopping_cart[] = [
            "form_image" => $form_image,
            "form_name" => $form_name,
            "form_code" => $form_code,
            "form_quantity" => $form_quantity,
            "form_price" => $form_price,
        ];
    }

    $_SESSION["shopping_cart"] = array_values($arr_shopping_cart);

    

    header('Location: ./');
	exit;
    
}

if(isset($_POST["clear_cart"]) && !empty($_POST["clear_cart"])){
    unset($_SESSION["shopping_cart"]);    
}

if(isset($_POST["remove_item"]) && !empty($_POST["remove_item"])){
    $index = $_POST["remove_id"];  
    $arrShoppingCart = $_SESSION["shopping_cart"];
    unset($arrShoppingCart[$index]);
    $_SESSION["shopping_cart"] = array_values($arrShoppingCart);
}



?>