<?php include("cart.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>cart</title>
</head>
<body>
    <div class="container">   
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="submit" name="clear_cart" value="Clear Cart">
        </form>
        
        <table id="above_table">
        <h2>shopping cart</h2>
                <tr id="above_tr">
                    <th id="t_img">Image</th>
                    <th id="t_name">Name</th>
                    <th id="t_code">Code</th>
                    <th id="t_quan">Quantity</th>
                    <th id="t_price">Price<br/>(in $)</th>
                    <th id="t_total">Total<br/>(in $)</th>
                    <th id="t_remove">Remove</th>
                </tr>

                <?php
                if(isset($_SESSION["shopping_cart"])){
                    $arr_cart_items = $_SESSION["shopping_cart"];
                    $arr_cart_items = array_values($arr_cart_items);
                    for($i=0; $i < count($arr_cart_items); $i++){
                        ?>

                        <tr>
                            <td><img src="<?php echo $arr_cart_items[$i]["form_image"]; ?>" alt="" style="width: 20px; height: 20px;"></td>
                            <td><?php echo $arr_cart_items[$i]["form_name"]; ?></td>
                            <td><?php echo $arr_cart_items[$i]["form_code"]; ?></td>
                            <td><?php echo $arr_cart_items[$i]["form_quantity"]; ?></td>
                            <td><?php echo $arr_cart_items[$i]["form_price"]; ?></td>
                            <td><?php printf("%.2f", $arr_cart_items[$i]["form_price"] * $arr_cart_items[$i]["form_quantity"]); ?></td>
                            <td class="form_button">
                                <form method="POST" action="">
                                    <input type="hidden" name="remove_id" value="<?php echo $i; ?>">
                                    <input type="submit" name="remove_item" value="remove">
                                </form>
                            </td>
                        </tr>

                        <?php
                    }
                }
                ?>
        </table>
        
        <table id="below_tbody">
        <h2>shopping catalog</h2>
            <tr id="below_tr">
                <td id="t_camera">
                    <div class="images">
                        <img src="https://www.sony.com.ph/image/a9bd3d4cc0dac35199d6d92078bfe331?fmt=pjpeg&bgcolor=FFFFFF&bgc=FFFFFF&wid=2515&hei=1320" class="image "alt="">
                    </div>
                    <h4>FinePix Pro2 3D Camera</h4>
                    <div class="p_info">
                        <div class="p_left">
                            <p class="price">$1500.00</p>
                        </div>
                        <div class="p_right">
                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input type="hidden" name="form_image" value="https://www.sony.com.ph/image/a9bd3d4cc0dac35199d6d92078bfe331?fmt=pjpeg&bgcolor=FFFFFF&bgc=FFFFFF&wid=2515&hei=1320">
                                <input type="hidden" name="form_name" value="FinePix Pro2 3D Camera">
                                <input type="hidden" name="form_price" value="1500.00">
                                <input type="hidden" name="form_code" value="A">
                                <input type="number" name="form_quantity">
                                <input type="submit" name="add_to_cart">
                            </form>
                        </div>
                    </div>
                </td>
                <td id="t_camera">
                    <div class="images">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKd8N2H0b1rqNDVfqnU-GjP-mlVa6TKITrMSgXQlIcsms-MrjWdy4E5IyOmb1ZKSkStPM&usqp=CAU" class="image "alt="">
                    </div>
                    <h4>EXP Portable Hard Drive</h4>
                    <div class="p_info">
                        <div class="p_left">
                            <p class="price">$1500.00</p>
                        </div>
                        <div class="p_right">
                            <input type="number" class="number">
                            <input type="submit">
                        </div>
                    </div>
                </td>
            </tr>
            <tr id="below_tr">
                <td id="t_camera">
                    <div class="images">
                        <img src="https://i.pinimg.com/736x/c2/0f/61/c20f615d48fef674f972c2ed0ba71996.jpg" class="image "alt="">
                    </div>
                        <h4>FinePix Pro2 3D Camera</h4>
                    <div class="p_info">
                        <div class="p_left">
                            <p class="price">$1500.00</p>
                        </div>
                        <div class="p_right">
                            <input type="number" class="number">
                            <input type="submit">
                        </div>
                    </div>
                </td>
                <td id="t_camera">
                    <div class="images">
                        <img src="https://i.pinimg.com/originals/14/c2/19/14c2190795db6cd6dccafecaf11764d4.jpg" class="image "alt="">
                    </div>
                    <h4>FinePix Pro2 3D Camera</h4>
                    <div class="p_info">
                        <div class="p_left">
                            <p class="price">$1500.00</p>
                        </div>
                        <div class="p_right">
                            <input type="number" class="number">
                            <input type="submit">
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>