<?php

session_start();
include 'books.php';
include 'cart.php';

if($_POST['shopping_cart'] == 'clearr') {
  session_unset();
}

?>
<html>
<head></head>
<body>
<h2>Book Shop</h2>
    <?php
	//books selected by the user
	$selected_books = $_POST['book'];
	if($selected_books) {
	    add_books_to_cart($selected_books);
	}
    ?>

    <!-- Books -->
    <div>
    <h3>Books</h3>
    <form method="POST">
    <div>
        <?php
            foreach($books as $i => $val) {
                $disabled = (cart_contains($i) ? "disabled" : "");
                echo "<input type=\"checkbox\" name=\"book[]\" value=\"$i\" $disabled/> $val <br>";
            }
        ?>
    </div>
    <div>
        <input type="submit" name="submit" value="submit" />
    </div>
    </form>
    </div>
    <!-- End books -->
    <!-- Start shopping cart -->
    <div>
       <h2>Shopping Cart</h2>
        <?php
           echo get_clear_cart_form()."<br/>";
           if($_POST['shopping_cart'] == 'checkout') {
               checkout($books);
           } else {
               print_cart($books);
               echo get_checkout_form();
           }
       ?>

 
    </div>
    <!-- End shopping cart -->

</body>
</html>

