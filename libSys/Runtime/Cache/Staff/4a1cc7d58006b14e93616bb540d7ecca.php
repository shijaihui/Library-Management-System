<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- require  framework-->
	<script type="text/javascript" src="/shijiahui/public/syspkg/vue.js"></script>
	<script type="text/javascript" src="/shijiahui/public/syspkg/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="/shijiahui/public/syspkg/jquery-form.js"></script>
	<script type="text/javascript" src="/shijiahui/public/syspkg/layer/layer.js"></script>
	<script type="text/javascript" src="/shijiahui/public/syspkg/bootstrap3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/shijiahui/public/syspkg/bootstrap3.3.7/css/bootstrap.min.css">
	<!-- require user-defined -->
	<script type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="/shijiahui/public/syspkg/css/index.css">
	<title>index</title>
</head>
<body style="background:/shijiahui/public/syspkg/images/background">

<!-- html中尽量不要写样式，也不要写属性，html只用来布局框架，css写入public/syspkg/css文件夹下，使用vue后js大部分由vue承担，若需额外js，写到pbulic/syspkg/js文件夹下 -->
	<div class="home" id="home">
		<div class="block">
			<div class="line"><h2>Librarian</h2></div>
			<div class="line">
				<label>Account</label>
				<span><input class="inp" type="text" name="account" v-model="account"></span>
			</div>
			<div class="line">
				<label>Password</label>
				<span><input class="inp" type="password" name="password" v-model="password"></span>
			</div>
			<div class="line">
				<button class="btn" v-on:click="submit">Login</button>
			</div>
			
		</div>
	</div>
<!-- vue写到body结束标签的前面，因为vue需要挂载dom，所以必须写到dom结构的后面，vue用来做数据绑定，可以绑定数据、事件、dom属性等功能强大，异步数据访问用jquery ajax来做，路由由tp框架做，可以保证我们的项目是处于一个统一的路由下 -->
	<script type="text/javascript">
		/*vue*/
		var app = new Vue({
			el : '#home',
			data : {
				account : "",
				password : ""
			},
			methods : {
				submit : function(event){
					var that = this
					/*
					 * 这里是异步数据访问
					 */
					$.ajax({
						url : "<?php echo U('Index/login');?>",
						type : "post",
						contentType : "application/x-www-form-urlencoded;charset=utf-8",
						data : {
							account : that.account,
							password : that.password
						},
						dataType : "json",
						success : function(data){
							if(data.code == 'success'){
								window.location.href = "<?php echo U('Index/home');?>"
							}
							if(data.code == 'fail'){
								layer.msg("fail")
							}
						}
					})
				}
			}
		})
	</script>
</body>
</html>