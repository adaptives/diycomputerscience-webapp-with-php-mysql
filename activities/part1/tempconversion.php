<?php

  $temp_in_fahrenheit = $_POST['temp'];
  if($temp_in_fahrenheit != NULL) {
    $celcius = (5/9) * ($temp_in_fahrenheit - 32);
    echo "<div> $temp_in_fahrenheit Fahrenheit is $celcius Celcius. </div>";
  }
  
  echo '<div>';
  echo '<form method="POST" action="">';
    echo "<div>";
      echo '<input type="text" name="temp" />';
    echo "</div>";
    echo "<div>";
      echo '<input type="submit" name="submit" value="submit" />';
    echo "</div>";
  echo "</form>";
  echo "</div>";

?>
