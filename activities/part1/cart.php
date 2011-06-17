<?php

if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

function add_books_to_cart($books_to_add) {
    if($books_to_add) {
        $cart = & $_SESSION['cart'];
        foreach($books_to_add as $book_to_add) {
            $cart[] = $book_to_add;
        }
    }
}

function print_cart($item_arr) {
    foreach($_SESSION['cart'] as $cart_item) {
        echo $item_arr[$cart_item]."<br/>";
    }
}

function get_clear_cart_form() {
   return "<form method=\"POST\"> <input type=\"hidden\" name=\"shopping_cart\" value=\"clearr\" /> <input type=\"submit\" name=\"clear\" value=\"Clear\" /> </form>";
}

function get_checkout_form() {
    $cart = & $_SESSION['cart'];
    if(count($cart) == 0) {
        return "";
    } else {
        return
        '<form method="POST"><input type="hidden" name="shopping_cart" value="checkout" /><input type="submit" name="checkout" value="Checkout" /></form>';
    }
}

function cart_contains($item) {
    $cart = & $_SESSION['cart'];
    if(in_array($item, $cart)) {
        return true;
    } else {
        return false;
    }
}

function checkout($books) {
    echo "<p>Thank you for shopping with us<br/>";
    echo "The following items will be shipped to you.</p>";
    $cart = & $_SESSION['cart'];
    echo "<ul>";
    foreach($cart as $cart_item) {
        echo "<li>".$books[$cart_item]."</li>";
    }
    echo "</ul>";
    session_unset();
}
?>
