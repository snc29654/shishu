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

  <input type="radio" id="xxxx" name="fruit" value="copy" onchange="func1(
)">
  <label for="xxxx">コピー</label>

  <input type="radio" id="xxxx" name="fruit" value="paste" onchange="func1(
)">
  <label for="xxxx">貼り付け</label>

  <input  type="button" value="コピーした色" id=999999 ></input><br>

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
<style>
  body {
    background-color: lightskyblue;
  }  
.example2{
    border: none;
}
</style>
<?php

  $button_color = $_POST["button_color"];
  $row = $_POST["row"];
  $cols = $_POST["cols"];
  $count_max=$row*$cols;
  define("TESTFILE","./color_code.txt");
  $fh = fopen(TESTFILE, "r");

  //echo "fgets関数n";
  //while (($line = fgets($fh))) {
  //  echo $line;
  //}

  //fclose($fh);


  for ($count = 0; $count < $count_max; $count++){
    $line = fgets($fh);
    echo "<input onclick=\"buttonClick(this.id)\" type=\"button\" value=\" \" id=$count style=\"background-color:$line;\" class=\"example2\"></input>";
    if($count%$cols==($cols-1)){
      echo "<br>";
    }
    echo "<script>";


    echo "function buttonClick(count){";
      echo "if (color==\"copy\"){";
        echo "color_copy=document.getElementById(count).style.backgroundColor;";
        echo "document.getElementById(999999).style.backgroundColor = color_copy;";
      echo "}else if (color==\"paste\") {";      

        echo "document.getElementById(count).style.backgroundColor = color_copy;";

      echo "}else{";      
          echo "document.getElementById(count).style.backgroundColor = color;";
        echo "}";

    echo "}";        
    echo "</script>";

  }

?>
