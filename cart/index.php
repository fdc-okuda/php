<?php require_once 'cart.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <style>
        .container{
            width: 800px;
            height: auto;
            margin: auto auto;
        }
        .cart{
            width: 100%:
        }
        .cart_image{
            width: 20%;
        }
        .cart_name{
            width: 30%;
        }
        .cart_code{
            width: 5%;
        }
        .cart_quantity{
            width: 5%;
        }
        .cart_price{
            width: 15%;
        }
        .cart_total{
            width: 15%;
        }
        .cart_remove{
            width: 10%;
        }
        td{
            text-align: center;
        }
        .send_image{
            object-fit: cover;
            width: 50px;
            height: 50px;
            border-radius:50%;
        }
        .catalog-above{
            width: 100%;
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .catalog-bottom{
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        .product{
            border: 1px solid black;
            width: 47%;
            padding: 5px;
        }
        .image{
            object-fit: cover;
            width: 100%;
            height: 200px;
        }
        .detail{
            display: flex;
            justify-content: space-between; 
            padding-top: 10px;
            padding-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="submit" name="form_delete_session" value="clear cart">
        </form>


        <p>Shopping Cart</p>
        <div class="cart">
            <table class="cart_table">
                <tr>
                    <th class="cart_image">Image</th>
                    <th class="cart_name">Name</th>
                    <th class="cart_code">Code</th>
                    <th class="cart_quantity">Quantity</th>
                    <th class="cart_price">Price<br />(in $)</th>
                    <th class="cart_total">Total<br />(in $)</th>
                    <th class="cart_remove">Remove</th>
                </tr>

                <?php
                if(isset($_SESSION["shopping_cart"])){
                    $arrCartItems = $_SESSION["shopping_cart"];
                    $arrCartItems = array_values($arrCartItems);
                    for($i=0; $i < count($arrCartItems); $i++) {
                ?>
                
                    <tr>
                        <td><img src="<?php echo $arrCartItems[$i]["form_image"]; ?>" width="100" height="100" class="send_image" alt=""></td>
                        <td><?php echo $arrCartItems[$i]["form_name"]; ?></td>
                        <td><?php echo $arrCartItems[$i]["form_code"]; ?></td>
                        <td><?php echo $arrCartItems[$i]["form_quantity"]; ?></td>
                        <td><?php echo $arrCartItems[$i]["form_price"]; ?></td>
                        <td><?php printf ("%.2f", $arrCartItems[$i]["form_price"] * $arrCartItems[$i]["form_quantity"]); ?></td>
                        <td class="form-button">
                            <form method="POST" action="">
                                <input type="hidden" name="form_delete_id" value="<?php echo $i; ?>">
                                <input type="submit" name="form_delete_individual_item" value="-">
                            </form>
                        </td>
                    </tr>

                <?php
                    }
                }
                ?>

                
                
            </table>





        </div>
        <p>Product Catalog</p>
        <div class="catalog">
            <div class="catalog-above">
                <div class="product">
                    <div class="cover"><img src="https://www.sony.com.ph/image/a9bd3d4cc0dac35199d6d92078bfe331?fmt=pjpeg&bgcolor=FFFFFF&bgc=FFFFFF&wid=2515&hei=1320" class="image" alt=""></div>
                    <div class="name">FinePix Pro2 3D Camera</div>
                    <div class="detail">
                        <div class="detail-left">
                            <div class="price">$1500.00</div>
                        </div>
                        <div class="detail-right">
                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1">
                                <input type="hidden" name="form_image" value="https://www.sony.com.ph/image/a9bd3d4cc0dac35199d6d92078bfe331?fmt=pjpeg&bgcolor=FFFFFF&bgc=FFFFFF&wid=2515&hei=1320" class="img_camera" >
                                <input type="hidden" name="form_name" value="FinePix Pro2 3D Camera">
                                <input type="hidden" name="form_code" value="A">
                                <input type="number" name="form_quantity" min="1" required="required" oninvalid="this.setCustomValidity('Buy Now.')"
                                oninput="this.setCustomValidity('')">
                                <input type="hidden" name="form_price" value="1500.00">
                                <input type="submit" value="Add to Cart" name="action_add_to_cart" required>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="product">
                    <div class="cover"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKd8N2H0b1rqNDVfqnU-GjP-mlVa6TKITrMSgXQlIcsms-MrjWdy4E5IyOmb1ZKSkStPM&usqp=CAU" class="image" alt=""></div>
                    <div class="name">EXP Portable Hard Drive</div>
                    <div class="detail">
                        <div class="detail-left">
                            <div class="price">$800.00</div>
                        </div>
                        <div class="detail-right">
                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                                <input type="hidden" name="form_image" value="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKd8N2H0b1rqNDVfqnU-GjP-mlVa6TKITrMSgXQlIcsms-MrjWdy4E5IyOmb1ZKSkStPM&usqp=CAU">
                                <input type="hidden" name="form_name" value="EXP Portable Hard Drive">
                                <input type="hidden" name="form_code" value="B">
                                <input type="number" name="form_quantity" min="1" required="required" oninvalid="this.setCustomValidity('Buy Now.')"
                                oninput="this.setCustomValidity('')">
                                <input type="hidden" name="form_price" value="800.00">
                                <input type="submit" value="Add to Cart" name="action_add_to_cart">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="catalog-bottom">
                <div class="product">
                    <div class="cover"><img src="https://i.pinimg.com/736x/c2/0f/61/c20f615d48fef674f972c2ed0ba71996.jpg" class="image" alt=""></div>
                    <div class="name">Luxury Ultra thin Wrist Watch</div>
                    <div class="detail">
                        <div class="detail-left">
                            <div class="price">$300.00</div>
                        </div>
                        <div class="detail-right">
                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="post">
                                <input type="hidden" name="form_image" value="https://i.pinimg.com/736x/c2/0f/61/c20f615d48fef674f972c2ed0ba71996.jpg">
                                <input type="hidden" name="form_name" value="Luxury Ultra thin Wrist Watch">
                                <input type="hidden" name="form_code" value="C">
                                <input type="number" name="form_quantity" min="1" required="required" oninvalid="this.setCustomValidity('Buy Now.')"
                                oninput="this.setCustomValidity('')">
                                <input type="hidden" name="form_price" value="300.00">
                                <input type="submit" value="Add to Cart" name="action_add_to_cart">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="product">
                    <div class="cover"><img src="https://i.pinimg.com/originals/14/c2/19/14c2190795db6cd6dccafecaf11764d4.jpg" class="image" alt=""></div>
                    <div class="name">XP 1155 Intel Core Laptop</div>
                    <div class="detail">
                        <div class="detail-left">
                            <div class="price">$800.00</div>
                        </div>
                        <div class="detail-right">
                            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                                <input type="hidden" name="form_image" value="https://i.pinimg.com/originals/14/c2/19/14c2190795db6cd6dccafecaf11764d4.jpg">
                                <input type="hidden" name="form_name" value="XP 1155 Intel Core Laptop">
                                <input type="hidden" name="form_code" value="D">
                                <input type="number" name="form_quantity" min="1" required="required" oninvalid="this.setCustomValidity('Buy Now.')"
                                oninput="this.setCustomValidity('')">
                                <input type="hidden" name="form_price" value="800.00">
                                <input type="submit" value="Add to Cart" name="action_add_to_cart">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>