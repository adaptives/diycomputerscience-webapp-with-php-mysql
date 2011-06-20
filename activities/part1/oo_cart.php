<?php
class ShoppingCart {
    private $cart;
    
    function __construct() {
        $this->cart = array();
    }

    function add_to_cart($books_to_add) {
        if($books_to_add) {
            foreach($books_to_add as $book_to_add) {
                $this->cart[] = $book_to_add;
            }
        }
    }

    function get_cart() {
        return $this->cart;
    }

    function print_cart() {
        foreach($this->cart as $cart_item) {
            echo var_dump($cart_item);
        }
    }

    function contains($the_item) {
        $ret_val = false;
        foreach($this->cart as $item) {
            if($item->_isbn == $the_item) {
                $ret_val = true;
                break;
            }
        }
        return $ret_val;
    }

    function clear_cart() {
        foreach($this->cart as $k => $v) {
            unset($this->cart[$k]);
        }
    }
    
}


?>
