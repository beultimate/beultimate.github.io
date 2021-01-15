<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <form action="" method="POST">
    <input type="text" name="str">
    <select name="num">
      <option value="0">Count vowels</option>
      <option value="1">Count consonants</option>
    </select>
    <input type="submit" value="Count">
  </form>

  <?php
  if (!empty($_POST)) {
  // your code once the form is submitted
    $str = $_POST['str'];
    $type = $_POST['num'];
    $type_str = "";

    if ($type == 0) {
      $type_str = "vowels";
    } else if ($type == 1) {
      $type_str = "consonants";
    }

    # $type_type = $type == 0 ? "vowels" : "consonants"; 

    echo "The string is: <strong>$str</strong><br>";
    echo "Counting: <strong>$type_str</strong><br>";
    echo "The number of $type_str is: <strong>" . countCharType($str, $type) . "</strong>";
  }

  //SAMPLE TEXT TO TRY
  //hello world!@!#!$!@%!($@!@#$%^&*()_+}{":<>?|~1234567890)!#!#(!#(!#!><#!"@#!}!~~~~
  
  // your function here
  function countCharType($word, $type) {

    $counter = 0;
    $new_word = strtolower($word);
    $letters; #vowels or consonant

    if ($type == 0) {
      $letters = ["a", "e", "i", "o", "u"];
    } else if ($type == 1) {
      $letters = ["b", "c", "d", "f", "g", "h", "j", "k", "l", "m", "n", "p", "q", 
                  "r", "s", "t", "v", "w", "x", "y", "z"];
    }
    
    for ($i = 0; $i < strlen($new_word); $i++) {
      $char = substr($new_word, $i, 1);
      # $char = $new_word[$i];
      if (in_array($char, $letters) === true) {
        $counter++;
      }
    }

    return $counter;
  }

  // your function here
  /* function countCharType($word, $type) {

    $counter = 0;
    $length = strlen($word);
    $vowels = ["a", "e", "i", "o", "u"]; #vowels
    
    for ($i = 0; $i < $length; $i++) {
      $char = substr($word, $i, 1); # $char = $new_word[$i];  
      
      if (in_array($char, $vowels) === true) {
        $counter++;
      }

      if (!($char >= "a" && $char <= "z")) {
        $length--;
      }
    }

    if ($type == 0) {
      return $counter;
    } else if ($type == 1) {
      return $length - $counter;
    }

    # return $type == 0 ? $counter : $length - $counter;
  } */

?>

</body>
</html>