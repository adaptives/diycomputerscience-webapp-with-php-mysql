<?php
class Book {
    public $_isbn;
    public $_title;

    function __construct($isbn, $title) {
        $this->_isbn = $isbn;
        $this->_title = $title;
    }
}
?>
