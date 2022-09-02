<?php
session_start();

if(isset($_POST["action_add_to_cart"]) && !empty($_POST["action_add_to_cart"])){
    $form_image = $_POST['form_image'];
    $form_name = $_POST['form_name'];
    $form_code = $_POST['form_code'];
    $form_quantity = $_POST['form_quantity'];
    $form_price = $_POST['form_price'];

    if(!isset($_SESSION["shopping_cart"])){
        $_SESSION["shopping_cart"] = [];
    }

    $arrShoppingCart = $_SESSION["shopping_cart"];

    $arr_found_id = false;
    
    for($i=0; $i < count($arrShoppingCart); $i++){
        $item = $arrShoppingCart[$i];
        if($form_code == $item["form_code"]){
            $arr_found_id = $i;
        }
    }
    if($arr_found_id !== false){
        $arrShoppingCart[$arr_found_id]['form_quantity'] = $arrShoppingCart[$arr_found_id]['form_quantity']+$form_quantity;
        
    } else {
        $arrShoppingCart[] = [
            "form_image" => $form_image,
            "form_name" => $form_name,
            "form_code" => $form_code,
            "form_quantity" => $form_quantity,
            "form_price" => $form_price,
        ];
    }

    $_SESSION["shopping_cart"] = array_values($arrShoppingCart);

}

if(isset($_POST["form_delete_session"]) && !empty($_POST["form_delete_session"])){
    unset($_SESSION["shopping_cart"]);
}

if(isset($_POST["form_delete_individual_item"]) && !empty($_POST["form_delete_individual_item"])){
    $index = $_POST["form_delete_id"];  
    $arrShoppingCart = $_SESSION["shopping_cart"];
    unset($arrShoppingCart[$index]);
    $_SESSION["shopping_cart"] = array_values($arrShoppingCart);
    
}


?>