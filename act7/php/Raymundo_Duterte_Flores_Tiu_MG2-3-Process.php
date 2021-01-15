<link rel="stylesheet" href="css/style.css">
<?php
  
  if (!empty($_POST)) {

    $input = $_POST['num'];
  
    for($i = 1; $i <= $input; $i++) {
      if (strpos($i, 4) !== FALSE || strpos($i, 8) !== FALSE|| strpos($i, 9) !== FALSE) {
        echo "<b>Web</b>";
      } else {
        echo $i;
      }

      if ($i!=$input) {
        echo "-";
      }
    }
  
  }


?>