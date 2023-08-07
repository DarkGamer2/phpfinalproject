<?php 
function calculateSubtotal($product,$quantity){
    $price=$product=['price'];
    if($product['quantity_discount']){
        if($quantity>=3){
            $price=300.00;
        }
    }
    return $price * $quantity;
}

function getQuantityForm($product_id,$quantity){
    return <<<HTML
    <form action="index.php?update_quantity={$product_id}" method="post">
        Quantity: <input type="number" name="quantity" value="{$quantity}" min="1">
        <input type="submit" value="Update">
    </form>
HTML;
}

if(!isset($_SESSION['cart'])){
    $_SESSION['cart']=array();
}

if (isset($GET['add_to_cart'])){
    $product_id=$_GET['add_to_cart'];
    if(array_key_exists($product_id,$products)){
        if(isset($_SESSION['cart'][$product_id])){
            $_SESSION['cart'][$product_id]['quantity']++;
        }
        else{
            $_SESSION['cart'][$product_id]=array(
                'product'=>$products[$product_id],
                'quantity'=>1
            );
        }
    }
}

if (isset($_GET['update_quantity'])) {
    $product_id = $_GET['update_quantity'];
    $quantity = $_POST['quantity'];

    if (array_key_exists($product_id, $_SESSION['cart']) && $quantity > 0) {
        $_SESSION['cart'][$product_id]['quantity'] = $quantity;
    }
}

if (isset($_GET['remove_from_cart'])) {
    $product_id = $_GET['remove_from_cart'];
    if (array_key_exists($product_id, $_SESSION['cart'])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

$cart_total = 0;
foreach ($_SESSION['cart'] as $product_id => $cart_item) {
    $cart_total += calculateSubtotal($cart_item['product'], $cart_item['quantity']);
}
