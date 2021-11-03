 <input type="radio" id="apple" name="fruit" value="black" onchange="func1()"
 checked>
  <label for="apple">黒</label><br>
  <input type="radio" id="banana" name="fruit" value="white" onchange="func1(
)">
  <label for="banana">白</label><br>
  <input type="radio" id="cherry" name="fruit" value="green" onchange="func1(
)">
  <label for="cherry">緑</label><br>
<input type="radio" id="apple" name="fruit" value="red" onchange="func1()"
 checked>
  <label for="apple">赤</label><br>
  <input type="radio" id="banana" name="fruit" value="blue" onchange="func1(
)">
  <label for="banana">青</label><br>
  <input type="radio" id="cherry" name="fruit" value="yellow" onchange="func1(
)">
  <label for="cherry">黄</label><br>
  <script language="javascript" type="text/javascript">
  function func1() {
    var fruits = document.getElementsByName("fruit");
    for(var i = 0; i < fruits.length; i++){
      if(fruits[i].checked) {
color=fruits[i].value;
        
      }
    }
  }
  func1();
  </script>

<?php

  $count_max = $_POST["post_data"];
  $cols = $_POST["cols"];
  for ($count = 0; $count < $count_max; $count++){
  
    echo "<input onclick=\"buttonClick(this.id)\" type=\"button\" value=\"0\" id=$count></input>";
    if($count%$cols==($cols-1)){
      echo "<br>";
    }
    echo "<script>";


    echo "function buttonClick(count){";
      echo "const button1 = document.getElementById(\"button\");";

      echo "document.getElementById(count).style.backgroundColor = color;";


    echo "}";        
    echo "</script>";

  }

?>
