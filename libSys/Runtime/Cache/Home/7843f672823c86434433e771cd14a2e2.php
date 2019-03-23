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
	<script type="text/javascript" src="/libSys/public/syspkg/jquery.cookie.js"></script>
	<!-- require user-defined -->
	<script type="text/javascript" src="/libSys/public/syspkg/js/GetQueryString.js"></script>
	<script type="text/javascript" src="/libSys/public/syspkg/js/jsonStrToObject.js"></script>

	<title>search</title>
	<style type="text/css">
		body{
			background: #F8F8F8;
		}
		#header{
			position: fixed;
			top:0px;
			width: 100%;
			height: 55px;
			padding: 0 0 0 10px;
			background: white;
			display: flex;
			align-items: center;
			box-shadow: 0px 3px 5px #EBEBEB;
			
		}
	 	#header-search{
	 		display: flex;
	 		justify-content: center;
	 		margin-left: 20px;
	 	}
	 	input{
	 		width: 539px;
	 		height: 34px;
	 	}
	 	button{
	 		width: 100px;
	 		height: 34px;
	 		background: #3385ff;
	 		border-left:none ;
	 		border-top: none;
	 		border-right: none;
	 		border-bottom: 1px solid #2d78f4;
	 		box-shadow: none;
	 		color : #fff;
	 		font-size: 15px;
	 	}
	 	.header-text{
			margin-left: 10px;
			width: 40px;
			height: 20px;
			font-size: 13px;
			color : black;
			text-align: center;
		}
		#content{
			margin-top:65px;
		}
		#content-left{
			width: 60%;
			min-height: 600px;
			padding:0 121px 0 121px;
			background: white;
			display: inline-block;
		}
		#content-right{
			float: right;
			width: 39.5%;
			min-height: 600px;
			margin-left: 3px;
			background: white;
			display: inline-block;
		}
		#count{
			font-size : 12px;
			color : #999;
			margin : 10px 0 10px 0;
		}
		#booklist{
			margin-bottom: 30px;
		}
		#book-title{
			font-weight: 400;
			font-size: medium;
		}
		#book-content{
			font-size: 13px;
			line-height: 1.54;
			color: #666666;
			word-wrap: break-word;
		}

		#content-board{
	 		margin : 45px 50px 0 50px;
	 	}
	 	#board-body{
	 		width: 400px;
	 	/*	height: 500px;*/
	 		background: white;
	 	}
	 	#board-text{
	 		margin-top: 10px;
	 		padding-top: 4px;
	 		background: #9a9da2;
	 		color: white;
	 		font-weight: bold;
	 		font-size: 18px;
	 		width: 150px;
	 		height: 35px;
	 		text-align: center;
	 	}
	 	#board-link{
			position: relative;
			width: 400px;
			height: auto;
			padding: 0 25px 0 25px;
			border: 1px solid #E9E9E9;
			background: white;
	 	}
	 	#message{
	 		position: relative;
	 	}
	 	#date{
	 		position: relative;
	 		float: right;
	 	}
	 	#text{
	 		width: 300px;
	 	}
	 	.dropdown-menu{
	 		min-width:40px;
	 	}
		 .touxiang{
			 margin: 0 50px 0 0;
			 margin-left: 400px;
			 /* background: white; */
		 }
	</style>
</head>
<body class="body">

<!-- html中尽量不要写样式，也不要写属性，html只用来布局框架，css写入public/syspkg/css文件夹下，使用vue后js大部分由vue承担，若需额外js，写到pbulic/syspkg/js文件夹下 -->
	<div class="home" id="home">
		<div id="header">
			<div id="header-logo">
				<a href="<?php echo U('Index/browse');?>">
				<img src="/libSys/Public/syspkg/images/logo1.png" width="99" height="45">
				</a>
			</div>
			<div id="header-search">
				<select name="select" v-model="search">
					<option value="ISBN">ISBN</option>
					<option value="Title">Title</option>
					<option value="Author">Author</option>
					<option value="Press">Press</option>
					<option value="Category">Category</option>
					<option value="Summary">Summary</option>
					<option value="BookId">BookId</option>
				</select>
				<input id="input" type="text" name="" v-model="input">
				<button v-on:click="searchBook">Search</button>
			</div>
			<div class="touxiang">
					<img src="/libSys/Public/syspkg/images/head.jpg" width="60" height="58">
			</div>
			<div id="header-text1" class="header-text" style="font-size: 16px" v-bind:style="{display:activeSearch}">
				<a href="<?php echo U('index/index?back=search');?>">Login</a>
			</div>
			<div id="header-text2" class="header-text" v-bind:style="{display:activeLogin}">
				<div class="dropdown">
					<a href="#" class="dropdown-toggle" style="font-size: 16px" data-toggle="dropdown">
					{{account}}
	                </a>
	                <ul class="dropdown-menu">
	                    <li><a href="<?php echo U('Index/personal');?>" target="_blank">My Page</a></li>
	                    <li><a href="javascript:void(0)" v-on:click="quitSys">Exit</a></li>
	                </ul>
				</div>
			</div>
		</div>
		<div id="content">
			<div id="content-left">
				<div id="count">{{num}} results for you</div>
				<div id="booklist" v-for="book in booklist" >
					<div id="book-title"><a :href=" 'http://localhost/libSys/index.php?s=/Home/Index/book/isbn/'+book.isbn+'.htm' " target="_blank">{{book.title}}</a></div>
					<div id="book-content">{{book.summary}}</div>
				</div>

			</div>
			<div id="content-right">
				<div id="content-board">
				 	<div id="board-body">
				 		<div id="board-text">Announcement</div>
						<div id="board-link">
							<div id="message" v-for="notice in notices">
								<hr/>
								<div id="text"><a :href=" 'http://localhost/libSys/index.php?s=/Home/Index/notice/noticeid/'+notice.notice_id+'.html' " target="_blank">{{notice.notice_title}}</a></div>
								<div id="date"><b>{{notice.release_time}}</b></div>
							</div>
							<hr/>
						</div>
				 	</div>
				</div>
			</div>
		</div>
	</div>
<!-- vue写到body结束标签的前面，因为vue需要挂载dom，所以必须写到dom结构的后面，vue用来做数据绑定，可以绑定数据、事件、dom属性等功能强大，异步数据访问用jquery ajax来做，路由由tp框架做，可以保证我们的项目是处于一个统一的路由下 -->
	<script type="text/javascript">
		/*vue*/
		var app = new Vue({
			el : '#home',
			data : {
				activeSearch : '',
				activeLogin : 'none',
				account : '',
				num : 0,
				input : "",
				search : "",
				booklist : [],
				notices : []
			},
			created:function(){
				this.input = GetQueryString("input","?s=/Home/Index/search/")
				this.search = GetQueryString("search","?s=/Home/Index/search/") 
				if(this.search == ''){
					this.search = 'ISBN'
				}
				var that = this
					/*
					 * 这里是异步数据访问
					 */
					$.ajax({
						url: "<?php echo U('Index/searchBook');?>",
						type: "post",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						data: {
							text: that.input,
							type : that.search
						},
						dataType: "json",
						success: function (data) {

							if (data.code == 'success') {
								//将json字符串转为json对象
								that.booklist = jsonStrToObject(data.data)
								that.num = data.num
							}
							if (data.code == 'fail') {
								layer.msg(data.msg)
							}
						},
						complete : function(){
							$.ajax({
								url : "<?php echo U('Index/isLogin');?>",
								contentType : "application/x-www-form-urlencoded;charset=utf-8",
								dataType : "json",
								success : function(data){
									if(data.code == 'success'){
										that.activeLogin = ''
										that.activeSearch = 'none'
										that.account = $.cookie('homeAccount')
										layer.msg('login successful')
									}
								}
							})
							$.ajax({
								url : "<?php echo U('Index/getNotice');?>",
								contentType : "application/x-www-form-urlencoded;charset=utf-8",
								dataType : "json",
								success : function(data){
									if(data.code == 'success'){
										that.notices = jsonStrToObject(data.data)
										}
									}
							})
						}
					})
			},
			methods : {

				quitSys: function (event) {
					var that = this
					$.ajax({
						url: "<?php echo U('Index/quit');?>",
						dataType: "json",
						success: function (data) {
							if (data.code == 'success') {
								that.activeSearch = ''
								that.activeLogin = 'none'
							}
							if (data.code == 'fail') {
								layer.msg(data.msg)
							}
						}
					})
				},
				searchBook : function(){
					var that = this
					/*
					 * 这里是异步数据访问
					 */
					$.ajax({
						url: "<?php echo U('Index/searchBook');?>",
						type: "post",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						data: {
							text: that.input,
							type : that.search
						},
						dataType: "json",
						success: function (data) {

							if (data.code == 'success') {
								//将json字符串转为json对象
								that.booklist = jsonStrToObject(data.data)
								that.num = data.num
							}
							if (data.code == 'fail') {
								layer.msg(data.msg)
							}
						}
					})
				}
			}
		})
	</script>
</body>
</html>