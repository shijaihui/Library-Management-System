<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- require  framework-->
	<script type="text/javascript" src="/libSys/public/syspkg/vue.js"></script>
	<script type="text/javascript" src="/libSys/public/syspkg/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="/libSys/public/syspkg/jquery-form.js"></script>
	<script type="text/javascript" src="/libSys/public/syspkg/layer/layer.js"></script>
	<script type="text/javascript" src="/libSys/public/syspkg/bootstrap3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/bootstrap3.3.7/css/bootstrap.min.css">
	<!-- require user-defined -->
	<script type="text/javascript" src="/libSys/public/syspkg/js/jsonStrToObject.js"></script>
	<link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/css/add.css">
	<title>index</title>
</head>
<body>

<!-- html中尽量不要写样式，也不要写属性，html只用来布局框架，css写入public/syspkg/css文件夹下，使用vue后js大部分由vue承担，若需额外js，写到pbulic/syspkg/js文件夹下 -->
	<div class="homeadd" id="home">
			<div class="line">
				<label>ISBN</label>
				<span><input class="inp" type="text" id="ISBN" ></span>
			</div>
			<div class="line">
				<button class="btnadd" id="query" >Query</button>
			</div>			
			<div class="line">
				<label>Title</label>
				<span><input  class="inp" type="text" id="title" ></span>
			</div>			
			<div class="line">
				<label>Author</label>
				<span><input class="inp"  type="text" id="author" ></span>
			</div>
			<div class="line">
				<label>Press</label>
				<span><input  class="inp" type="text" id="press" ></span>
			</div>
			<div class="line">
				<label>Category</label>
				<span><select id="category" name="" style="width:220px;">

					</select></span>
			</div>
			<div class="line">
				<label>PubDate</label>
				<span><input class="inp"  type="text" id="pub_date" ></span>
			</div><div class="line">
				<label>Price</label>
				<span><input  class="inp" type="text" id="price" ></span>
			</div>
			<div class="line">
				<label >Floor</label>
				<span><select id="floor" name="" v-model="floor" style="width:220px;">
					<option v-for="(floorShelf,index) in floorShelfs" v-bind:value="index">{{floorShelf.floor}}</option>
				</select></span>
			</div>			
			<div class="line">
				<label>Bookshelf</label>
				<span>
					<select id="bookshelf" name="" style="width:220px;">
						<option v-for="n in shelf">{{n}}</option>
					</select>
				</span>
			</div>
			<div class="line">
				<label>Area Code</label>
				<span><select id="area_code" name="" style="width:220px;">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select></span>
			</div>
			<div class="line">
				<label>number</label>
				<span><input class="inp"  type="text" id="number" ></span>
			</div>
			<div class="line">
				<button class="btnadd" id="submit" >submit</button>
			</div>
	</div>
	<script>




		
		var app = new Vue({
			el : "#home",
			data : {
				floor : 0,
				shelf : 0,
				floorShelfs : [],
			},
			created : function(){
				var that = this

				$.ajax({
					url : "<?php echo U('Index/getFloorShelf');?>",
					type : "post",
					contentType : "application/x-www-form-urlencoded;charset=utf-8",
					dataType : "json",
					success : function(data){
						that.floorShelfs = jsonStrToObject(data.data)
						that.shelf = parseInt(that.floorShelfs[0].bookshelf)
					}
				})
			},
			watch : {
				floor : function(){
					this.shelf = parseInt(this.floorShelfs[this.floor].bookshelf)
				}
			}


		})




var jsonStr = sessionStorage.getItem('categlist');
var cclist = [];
//去掉字符串中的空格
jsonStr = jsonStr.replace(" ", "");
//typeof https://www.cnblogs.com/liu-fei-fei/p/7715870.html
if (typeof jsonStr != 'object') {
    //去掉饭斜杠
    jsonStr = jsonStr.replace(/\ufeff/g, "")
    var jsonObj = JSON.parse(jsonStr)
    cclist = jsonObj
}
for (var i=0;i<cclist.length;i++){
    var opt = document.createElement("option");
	opt.value = cclist[i];
	opt.innerText = cclist[i];
//    var svgg=document.createElement("img");
    //var node=document.createTextNode(codelist[i]);
    //svgg.appendChild(node);
//    JsBarcode(svgg, cclist[i]);
//    divv.appendChild(svgg);
    //svgg.JsBarcode(cclist[i]);

    var element=document.getElementById("category");
    element.appendChild(opt);
}




		
	</script>
</body>
</html>