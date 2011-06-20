<?php
session_start();

include('book.php');
include('oo_cart.php');

$books = array("102"=>new Book("102", "Thinking In Scala"), 
              "103"=>new Book("103", "Thinking In Java"),
              "104"=>new Book("104", "Effective Java")); 

if($_SESSION['cart'] == NULL) {
    $cart = new ShoppingCart();
    $_SESSION['cart'] = serialize($cart);
}

$cart = unserialize($_SESSION['cart']);
$checkout_clear = $_POST['checkout_clear'];

if($checkout_clear == 'Clear') {
  session_unset();
}
	
$selected_books = $_POST['book'];
if($selected_books) {
    $books_to_add = array();
    foreach($selected_books as $book_isbn) {
        $books_to_add[] = $books[$book_isbn];
    }
    $cart->add_to_cart($books_to_add);
    $_SESSION['cart'] = serialize($cart);
}

echo "<p><h1>Book Shop</h1></p>";
echo "<p><h2>Book List</h2></p>";

echo '<form method="POST">';
echo '<div>';
    foreach($books as $i => $val) {
        $dis = "";
        if($cart->contains($i)) {
            $dis = "disabled";
        }
        echo "<input type=\"checkbox\" name=\"book[]\" value=\"$i\" $dis/> $val->_title <br>";
    }
echo '</div>';
echo '<div>';
    echo '<input type="submit" name="submit" value="submit" />';
echo '</div>';
echo '</form>';

if($checkout_clear == 'Checkout'){
    echo "<h2>Thank you for shopping with us. The following items will be shipped to your address.</h2>";
    print_cart();
    session_unset();
} else {
    echo "<h2>Shopping Cart</h2>";
    print_cart();
    echo '<form method="POST">';
    echo '<input type="submit" name="checkout_clear" value="Clear">';
    echo '<input type="submit" name="checkout_clear" value="Checkout">';
    echo '</form>';
}

function print_cart() {
    $cart = unserialize($_SESSION['cart']);
    $cart_items = $cart->get_cart();
    foreach($cart_items as $k=>$v) {
        echo "<div>";
        echo $v->_title;
        echo "</div>";
    }
}
?>
