<link rel="stylesheet" href="css/style.css">
<?php  
  if(!empty($_POST)) {  
    $str_input = $_POST['str_input']; 

    $disregard_chars = array (" ", "?", ":", ".", "!", ",", ";", "-", "—", "...", "[", "]", "(", ")", "{", "}", '"', "'");
    $str = $str_input;
    $str = str_replace($disregard_chars, "", $str);
    $str = strtolower($str);
    $reverse_str = strrev($str);  

    if($str == "") {
      echo "Note: You should input a string/number.";
    } else if($str == $reverse_str) {  
      echo "\"<b>$str_input</b>\" is a <strong>palindrome</strong>";     
    } else {   
      echo "\"<b>$str_input</b>\" is <strong>not a palindrome</strong>";
    }  
}    
?>   