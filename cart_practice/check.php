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