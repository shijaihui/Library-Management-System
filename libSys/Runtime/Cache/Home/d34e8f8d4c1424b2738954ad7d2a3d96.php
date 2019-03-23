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
	<script type="text/javascript"></script>
	
	<title>index</title>
	<style type="text/css">
	.homeadd{
 		width: 400px;
  		height: 488px;
  		margin: 0 auto;
  		/* background-color: rgb(180, 225, 231); */
		position: relative;
		background: hsla(0, 9%, 83%, 0.705);
		display: flex; 
		align-items: center;
		/* box-shadow: 0px 3px 5px #EBEBEB; */
	}
	/* .input{
		margin-top: 50%;
	} */
	/* #line1{
		padding-top: 25%;
	} */
	.line{
		width : 300px;
		height: 50px;
  		text-align: center;
  		position: relative;
  		left: 55px;
	}	
	.inp{
  		position: relative;
  		width: 220px;
  		right:0px;
	}
	.btnadd{
		width : 280px;
  		height: 35px;
  		color: #ffffff;
  		background-color: #000000;
  		font-size: 20px;
  		border: #000000;
	}
	#submit{
		margin-top: 10%;
	}
	</style>
</head>
<body>

<!-- html中尽量不要写样式，也不要写属性，html只用来布局框架，css写入public/syspkg/css文件夹下，使用vue后js大部分由vue承担，若需额外js，写到pbulic/syspkg/js文件夹下 -->
	<div class="homeadd" id="home">
		<div class="input">
			<div class="line" id="line1">
				<label>Old Password</label>
				<span><input class="inp" type="text" id="op" ></span>
			</div>			
			<div class="line">
				<label>New Password</label>
				<span><input  class="inp" type="password" id="np" ></span>
			</div>			
			<div class="line">
				<label>Repeat Password</label>
				<span><input class="inp"  type="password" id="rp" ></span>
			</div>
			<div class="line">
				<button class="btnadd" id="submit" >submit</button>
			</div>
		</div>
	</div>
</body>
</html>