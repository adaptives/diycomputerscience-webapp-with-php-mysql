<?php
//A simple array of books
$books = array(1 => "Thinking In Java", 2 => "Effective Java", 3 => "PHP MySql Web Development Book");

function print_book($book_ind, $extra_text) {
    if($extra_text) {
        echo $extra_text;
    }
    echo $books[$book_ind];
}
?>

