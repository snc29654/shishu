<br>
<div style="height:200px; margin:0px 0px 10px 0px; border:10px #0a0 solid; background:#4f4; display:none;"  id="element_06" ></div>

<div style="margin:0px 0px 5px 0px;">
左ボタン:<input id="edit_06_left" style="width:60px; margin:0px 20px 0px 5px;">
右ボタン:<input id="edit_06_right" style="width:60px; margin:0px 20px 0px 5px;">
中央ボタン:<input id="edit_06_center" style="width:60px; margin:0px 20px 0px 5px;">
</div>
<input type=button id="count" value=" " style="background-color:white;" >


<script language="javascript" type="text/javascript">


    document.getElementById("count").addEventListener("mouseout", () => {

        if(document.getElementById("edit_06_left").value=="true"){
        document.getElementById("count").style.backgroundColor = "blue";
        }

    });
  
      document.getElementById("count").addEventListener("mouseover", () => {
        document.getElementById("count").style.backgroundColor = "orange";
        });
  
</script>





<input id="edit_06_result" style="width:100%;">

<script type="text/javascript">
<!--
// 匿名関数内で実行
(function (){

	// 各エレメントを取得
	var element = document.getElementById("element_06");
	var element_left = document.getElementById("edit_06_left");
	var element_right = document.getElementById("edit_06_right");
	var element_center = document.getElementById("edit_06_center");
	var element_result = document.getElementById("edit_06_result");

	// ------------------------------------------------------------
	// マウスボタンの入力状態を調べるコンストラクタ
	// ------------------------------------------------------------
	function InputMouseButton(window_obj){

		// ------------------------------------------------------------
		// 初期化
		// ------------------------------------------------------------
		var self = this;
		var document_obj = window_obj.document;
		var mouse_handler;
		var blur_handler;
		var button_tbl = [0,2,1,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];
		var event_type_down = { "mousedown":true , "dragstart":true };
		var event_type_move = { "mousemove":true , "drag":true      };
		var event_type_up   = { "mouseup":true   , "dragend":true   };
		self.buttons = 0;

		// ------------------------------------------------------------
		// イベント
		// ------------------------------------------------------------
		blur_handler = function(e){
			self.buttons = 0;
		};
		if(window_obj.addEventListener){
			mouse_handler = function(e){
				if(event_type_down[e.type]){
					self.buttons |=  (0x1 << button_tbl[e.button]);
				}else if(event_type_up[e.type]){
					self.buttons &= ~(0x1 << button_tbl[e.button]);
				}else if(event_type_move[e.type]){
					if(e.buttons !== undefined){ self.buttons = e.buttons; }
				}
			};
			window_obj.addEventListener("mousedown",mouse_handler,true);
			window_obj.addEventListener("mouseup",mouse_handler,false);
			window_obj.addEventListener("mousemove",mouse_handler,true);
			window_obj.addEventListener("dragstart",mouse_handler,true);
			window_obj.addEventListener("dragend",mouse_handler,false);
			window_obj.addEventListener("drag",mouse_handler,true);
			window_obj.addEventListener("blur",blur_handler);

		}else if(window_obj.attachEvent){
			mouse_handler = function(e){
				if(event_type_up[e.type]){
					self.buttons &= ~(e.button);
				}else{
					self.buttons  =  (e.button);
				}
			};
			document_obj.attachEvent("onmousedown",mouse_handler);
			document_obj.attachEvent("onmouseup",mouse_handler);
			document_obj.attachEvent("onmousemove",mouse_handler);
			document_obj.attachEvent("ondragstart",mouse_handler);
			document_obj.attachEvent("ondragend",mouse_handler);
			document_obj.attachEvent("ondrag",mouse_handler);
			window_obj.attachEvent("onblur",blur_handler);
		}

		// ------------------------------------------------------------
		// buttons 形式で取得
		// ------------------------------------------------------------
		this.getButtons = function (){
			return (this.buttons);
		};

		// ------------------------------------------------------------
		// マウス左ボタンの押下状態を調べる
		// ------------------------------------------------------------
		this.isDownLeft = function (){
			return (this.buttons & (0x1)) ? true : false;
		};

		// ------------------------------------------------------------
		// マウス右ボタンの押下状態を調べる
		// ------------------------------------------------------------
		this.isDownRight = function (){
			return (this.buttons & (0x2)) ? true : false;
		};

		// ------------------------------------------------------------
		// マウス中央ボタンの押下状態を調べる
		// ------------------------------------------------------------
		this.isDownCenter = function (){
			return (this.buttons & (0x4)) ? true : false;
		};

		// ------------------------------------------------------------
		// 解放する
		// ------------------------------------------------------------
		this.release = function (){
			if(window_obj.removeEventListener){
				window_obj.removeEventListener("mousedown",mouse_handler,true);
				window_obj.removeEventListener("mouseup",mouse_handler,false);
				window_obj.removeEventListener("mousemove",mouse_handler,true);
				window_obj.removeEventListener("dragstart",mouse_handler,true);
				window_obj.removeEventListener("dragend",mouse_handler,false);
				window_obj.removeEventListener("drag",mouse_handler,true);
				window_obj.removeEventListener("blur",blur_handler);
			}else if(window_obj.detachEvent){
				document_obj.detachEvent("onmousedown",mouse_handler);
				document_obj.detachEvent("onmouseup",mouse_handler);
				document_obj.detachEvent("onmousemove",mouse_handler);
				document_obj.detachEvent("ondragstart",mouse_handler);
				document_obj.detachEvent("ondragend",mouse_handler);
				document_obj.detachEvent("ondrag",mouse_handler);
				window_obj.detachEvent("onblur",blur_handler);
			}
		};

	}

	// ------------------------------------------------------------
	// InputMouseButton オブジェクトを作成
	// ------------------------------------------------------------
	var input_mouse_button = new InputMouseButton(window);

	// ------------------------------------------------------------
	// 表示更新
	// ------------------------------------------------------------
	function update(){
		// マウス左ボタンの押下状態
		element_left.value = input_mouse_button.isDownLeft();
		// マウス右ボタンの押下状態
		element_right.value = input_mouse_button.isDownRight();
		// マウス中央ボタンの押下状態
		element_center.value = input_mouse_button.isDownCenter();
	}

	// ------------------------------------------------------------
	// マウス関連のコールバック関数
	// ------------------------------------------------------------
	function MouseEventFunc(e){

		if(document.addEventListener){
			update();
		}else if(document.attachEvent){
			setTimeout(update,1);
		}

		element_result.value = "buttons:" + e.buttons + " button:" + e.button + " which:" + e.which + " type:\"" + e.type + "\"";
	}

	// ------------------------------------------------------------
	// イベントのリッスンを開始する
	// ------------------------------------------------------------
	// イベントリスナーに対応している
	if(window.addEventListener){

		// マウスボタンを押すと実行されるイベント
		window.addEventListener("mousedown" , MouseEventFunc);
		// マウスカーソルを移動するたびに実行されるイベント
		window.addEventListener("mousemove" , MouseEventFunc);
		// マウスボタンを離すと実行されるイベント
		window.addEventListener("mouseup" , MouseEventFunc);

	// アタッチイベントに対応している
	}else if(document.attachEvent){

		// マウスボタンを押すと実行されるイベント
		document.attachEvent("onmousedown" , MouseEventFunc);
		// マウスカーソルを移動するたびに実行されるイベント
		document.attachEvent("onmousemove" , MouseEventFunc);
		// マウスボタンを離すと実行されるイベント
		document.attachEvent("onmouseup" , MouseEventFunc);

	}

	// ------------------------------------------------------------
	// マウスボタンを押すと実行されるイベント
	// ------------------------------------------------------------
	element.onmousedown = function (e){
		// デフォルトの動作をキャンセル
		return false;
	};

	// ------------------------------------------------------------
	// コンテキストメニューが表示される直前に実行されるイベント
	// ------------------------------------------------------------
	element.oncontextmenu = function (e){
		// デフォルトの動作をキャンセル
		return false;
	};

})();
//-->
</script>


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
<style>
    body {
    background-color: lightskyblue;
  }  

.example2{
    border: none;
    color: white;
}
</style>

<?php
  $button_color = $_POST["button_color"];
  $count_max = $_POST["post_data"];
  $cols = $_POST["cols"];
  for ($count = 0; $count < $count_max; $count++){
    echo "<input type=\"button\" id=$count value=\" \" style=\"background-color:$button_color;\" class=\"example2\" >";
  
    echo "<script language=\"javascript\" type=\"text/javascript\">";
  
    echo "document.getElementById($count).addEventListener(\"mouseout\", () => {";
      echo "if(document.getElementById(\"edit_06_left\").value==\"true\"){";

      echo "document.getElementById($count).style.backgroundColor = color;";

      echo "}";

      echo "});";
  
      echo "document.getElementById($count).addEventListener(\"mouseover\", () => {";
        echo "if(document.getElementById(\"edit_06_left\").value==\"true\"){";
          echo "document.getElementById($count).style.backgroundColor = color;";
          echo "}";
          echo "});";
  
        echo "</script>";
  
        if($count%$cols==($cols-1)){
          echo "<br>";
        }
          }
  


?>
