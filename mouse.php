<input type="radio" id="xxxx" name="fruit" value="beige" onchange="func1()"
 checked>
  <label for="xxxx">肌</label>

  <input type="radio" id="xxxx" name="fruit" value="burlywood" onchange="func1()"
 checked>
  <label for="xxxx">薄茶</label>
 
  <input type="radio" id="xxxx" name="fruit" value="lightskyblue" onchange="func1()"
 checked>
  <label for="xxxx">スカイブルー</label>

  <input type="radio" id="xxxx" name="fruit" value="aquamarine" onchange="func1()"
 checked>
  <label for="xxxx">アクアマリン</label>


  <input type="radio" id="xxxx" name="fruit" value="brown" onchange="func1()"
 checked>
  <label for="xxxx">茶</label>


  <input type="radio" id="xxxx" name="fruit" value="gray" onchange="func1()"
 checked>
  <label for="xxxx">灰</label>

  <input type="radio" id="xxxx" name="fruit" value="pink" onchange="func1()"
 checked>
  <label for="xxxx">桃</label><br>


<input type="radio" id="xxxx" name="fruit" value="black" onchange="func1()"
 checked>
  <label for="xxxx">黒</label>

  <input type="radio" id="xxxx" name="fruit" value="orange" onchange="func1()"
 checked>
  <label for="xxxx">オレンジ</label>



<input type="radio" id="xxxx" name="fruit" value="white" onchange="func1(
)">
  <label for="xxxx">白</label>
  <input type="radio" id="xxxx" name="fruit" value="green" onchange="func1(
)">
  <label for="xxxx">緑</label>
<input type="radio" id="xxxx" name="fruit" value="red" onchange="func1()"
 checked>
  <label for="xxxx">赤</label>
  <input type="radio" id="xxxx" name="fruit" value="blue" onchange="func1(
)">
  <label for="xxxx">青</label>
  <input type="radio" id="xxxx" name="fruit" value="yellow" onchange="func1(
)">
  <label for="xxxx">黄</label><br>
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
    echo "<input type=\"button\" id=$count value=\" \" style=\"background-color:white;\" >";
  
    echo "<script language=\"javascript\" type=\"text/javascript\">";
  
    echo "document.getElementById($count).addEventListener(\"mouseout\", () => {";
      echo "document.getElementById($count).style.backgroundColor = color;";
      echo "});";
  
      echo "document.getElementById($count).addEventListener(\"mouseover\", () => {";
        echo "document.getElementById($count).style.backgroundColor = \"orange\";";
        echo "});";
  
        echo "</script>";
  
        if($count%$cols==($cols-1)){
          echo "<br>";
        }
          }
  


?>
