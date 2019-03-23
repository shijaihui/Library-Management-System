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
	<link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/css/head.css">
	<!-- require user-defined -->
	<script type="text/javascript" src="/libSys/public/syspkg/js/jsonStrToObject.js"></script>
	<link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/css/home.css">
	<title>home</title>
</head>

<body>

		<div class="tubiao1">
				<img src="/libSys/public/syspkg/images/logo.png" width=80 height=80 class="timg3">
			</div>

	<div id="head" class="head">
		<div class="tit">
			<p> Bibliosoft Library Management System</p>
		</div>
		<div class="tubiao">
				<img  v-on:click="toIndex" src="/libSys/public/syspkg/images/notlogin.png" class="img_head dropdown-toggle" data-toggle="dropdown"
				 aria-haspopup="true" aria-expanded="false">
		</div>
	</div>

	

	<!-- html中尽量不要写样式，也不要写属性，html只用来布局框架，css写入public/syspkg/css文件夹下，使用vue后js大部分由vue承担，若需额外js，写到pbulic/syspkg/js文件夹下 -->
	<div class="home" id="home">
		<div class="header">
			<div class="search">
				<input v-model="text" type="text" name="search" placeholder="Please enter the title">
				<a href="javascript:void(0);"><i v-on:click="searchBook" class="iconfont icon-sousuo"></i></a>
			</div>
		</div>
		<div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>book_id</th>
						<th>ISBN</th>
						<th>Title</th>
						<th>Author</th>
						<th>Theme</th>
						<th>Category</th>
						<th>Abstract</th>
						<th>Publisher</th>
						<th>PubDate</th>
						<th>Language</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="book in booklist">
						<td>{{book.book_id}}</td>
						<td>{{book.isbn}}</td>
						<td>{{book.title}}</td>
						<td>{{book.author}}</td>
						<td>{{book.theme}}</td>
						<td>{{book.category}}</td>
						<td>{{book.abstract}}</td>
						<td>{{book.publisher}}</td>
						<td>{{book.pub_date}}</td>
						<td>{{book.language}}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<!-- vue写到body结束标签的前面，因为vue需要挂载dom，所以必须写到dom结构的后面，vue用来做数据绑定，可以绑定数据、事件、dom属性等功能强大，异步数据访问用jquery ajax来做，路由由tp框架做，可以保证我们的项目是处于一个统一的路由下 -->
	<script type="text/javascript">
		/*vue*/
		var app1 = new Vue({
			el:"#head",
			methods : {
				toIndex: function(){
					window.location.href = "<?php echo U('Index/index');?>"
				},
			}
		})
		var app = new Vue({
			el: '#home',
			data: {
				booklist: [],
				text: "",
			},
			created: function () {
				//
				var that = this
				$.ajax({
					url: "<?php echo U('Index/getBook');?>",
					dataType: "json",
					success: function (data) {
						if (data.code == 'success') {

							//将json字符串转为json对象
							var jsonStr = data.data
							//去掉字符串中的空格
							jsonStr = jsonStr.replace(" ", "");
							//typeof https://www.cnblogs.com/liu-fei-fei/p/7715870.html
							if (typeof jsonStr != 'object') {
								//去掉饭斜杠
								jsonStr = jsonStr.replace(/\ufeff/g, "")
								var jsonObj = JSON.parse(jsonStr)
								that.booklist = jsonObj
							}
						}
						if (data.code == 'fail') {
							layer.msg(data.msg)
						}
					}
				})
			},
			methods: {
				searchBook: function (event) {

					var that = this
					/*
					 * 这里是异步数据访问
					 */
					$.ajax({
						url: "<?php echo U('Index/searchBook');?>",
						type: "post",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						data: {
							text: that.text
						},
						dataType: "json",
						success: function (data) {

							if (data.code == 'success') {
								//将json字符串转为json对象
								var jsonStr = data.data
								//去掉字符串中的空格
								jsonStr = jsonStr.replace(" ", "");
								//typeof https://www.cnblogs.com/liu-fei-fei/p/7715870.html
								if (typeof jsonStr != 'object') {
									//去掉饭斜杠
									jsonStr = jsonStr.replace(/\ufeff/g, "")
									var jsonObj = JSON.parse(jsonStr)
									that.booklist = jsonObj
								}
							}
							if (data.code == 'fail') {
								layer.msg(data.msg)
							}
						}
					})
				},
				quitSys: function (event) {
					var that = this
					$.ajax({
						url: "<?php echo U('Index/quit');?>",
						dataType: "json",
						success: function (data) {
							if (data.code == 'success') {
								layer.msg(data.msg)
								window.location.href = "<?php echo U('Index/index');?>"
							}
							if (data.code == 'fail') {
								layer.msg(data.msg)
							}
						}
					})
				},
				toUserInfo: function (event) {
					window.location.href = "<?php echo U('Index/info');?>";
				}

			}
		})
	</script>
</body>

</html>