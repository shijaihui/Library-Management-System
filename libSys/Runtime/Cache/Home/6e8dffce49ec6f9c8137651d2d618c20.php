<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- require  framework-->
	<!-- <script type="text/javascript" src="/libSys/public/syspkg/vue.js"></script> -->
	<script src="https://unpkg.com/vue/dist/vue.js"></script>
	<script src="https://unpkg.com/vue-i18n/dist/vue-i18n.js"></script>
	<script type="text/javascript" src="/libSys/public/syspkg/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="/libSys/public/syspkg/jquery-form.js"></script>
	<script type="text/javascript" src="/libSys/public/syspkg/layer/layer.js"></script>
	<script type="text/javascript" src="/libSys/public/syspkg/bootstrap3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/bootstrap3.3.7/css/bootstrap.min.css">
	<!-- require user-defined -->
	<script type="text/javascript" src="/libSys/public/syspkg/js/jsonStrToObject.js"></script>
	<script type="text/javascript" src="/libSys/public/syspkg/jquery.cookie.js"></script>
	<!-- <script type="text/javascript" src="/libSys/public/syspkg/languages/zh.js"></script> -->

	<title>browse</title>
	<style type="text/css">
		#header{
			position: relative;
			height: 100px;
			width: 100%;
			/*background: blue;*/
		}
		#header-text{
			margin-right: 10%;
			float:right;
			padding: 20px 40px 0 0;
			font-size: 13px;
			color : black;
			display: flex;
			align-items: center;
			flex-wrap: wrap;
		}
		#content{
			width: 700px;
			/*height: 850px;*/
			margin: 0 auto;
			background: white;
			/*display: flex;*/
			/*justify-content: center;*/
			/*align-items: center;*/
		}
	 	#content-logo{
	 		display: flex;
	 		justify-content: center;
	 		height: 120px;
	 		background: white;
	 	}
	 	#content-search{
	 		display: flex;
	 		justify-content: center;
	 	}
	 	input#input{
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
	 	#content-board{
	 		display: flex;
	 		justify-content: center;
	 	}
	 	#board-body{
	 		width: 639px;
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
	 		width: 160px;
	 		height: 35px;
	 		text-align: center;
	 	}
	 	#board-link{
			position: relative;
			width: 639px;
			height: 318px;
			padding: 0 25px 0 25px;
			border: 1px solid #E9E9E9;
			background: white;
	 	}
	 	#message{
	 		position: relative;
	 	}
	 	#date{
	 		position: relative;
	 		left: 200px;
	 	}
	 	#text{
	 		width: 439px;
	 	}
	 	#pagination{
	 		position: absolute;
	 		right: 30px;
	 		bottom: -10px;
	 	}
	 	#select{
	 		margin-top:3px;
	 		margin-left: 32px;
	 	}
	 	#label{
	 		margin-left: 30px;
	 	}
	 	.dropdown-menu{
	 		min-width:40px;
	 	}
		 .touxiang{
			 margin: 0 30px 0 0;
			 background: white;
		 }
	</style>
</head>
<body class="body">

<!-- html中尽量不要写样式，也不要写属性，html只用来布局框架，css写入public/syspkg/css文件夹下，使用vue后js大部分由vue承担，若需额外js，写到pbulic/syspkg/js文件夹下 -->
	<div class="home" id="home">
		<div id="header">
			<!-- <div><h1 v-text="$t('message.title')"></h1></div> -->
			<div id="header-text" v-bind:style="{display:activeBrowse}">
			<a href="<?php echo U('index/index?back=browse');?>" style="font-size: 16px">Reader Login</a>
			<a href="<?php echo U('Staff/index/index');?>" style="font-size: 16px;margin-left: 40px;">Librarian Login</a>
			</div>
			<div id="header-text" v-bind:style="{display:activeLogin}">
				<div class="touxiang">
					<img src="/libSys/Public/syspkg/images/head.jpg" width="80" height="80">
				</div>
				<div class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="font-size: 16px">
					{{account}}
	                </a>
	                <ul class="dropdown-menu">
	                    <li><a href="<?php echo U('Index/personal');?>" target="_blank">My Page</a></li>
	                    <li><a href="javascript:void(0)" v-on:click="quitSys">exit</a></li>
	                </ul>
				</div>
			</div>
		</div>
		<div id="content">
			<div id="content-logo">
				<img src="/libSys/Public/syspkg/images/logo1.png" width="400" height="80">
			</div>
			<div id="content-search">
				<input id="input" type="text" name="input" v-model="input">
				<button v-on:click="searchC">Search</button>
			</div>
			<div id="select">
				<div class="radio-group">
					<span><label><input type="radio" name="search" value="ISBN" v-model="search">ISBN</label></span>
					<span id="label"><label><input type="radio" name="search" value="Title" v-model="search">Title</label></span>
					<span id="label"><label><input type="radio" name="search" value="Author" v-model="search">Author</label></span>
					<span id="label"><label><input type="radio" name="search" value="Press" v-model="search">Press</label></span>
					<span id="label"><label><input type="radio" name="search" value="Category" v-model="search">Category</label></span>
					<span id="label"><label><input type="radio" name="search" value="Summary" v-model="search">Summary</label></span>
					<span id="label"><label><input type="radio" name="search" value="BookId" v-model="search">BookId</label></span>

				</div>
			</div>
			<div id="content-board">
			 	<div id="board-body">
			 		<div id="board-text">Announcement</div>
					<div id="board-link">
						<div id="message" v-for="notice in notices">
							<hr/>
							<span id="text"><a :href=" 'http://localhost/libSys/index.php?s=/Home/Index/notice/noticeid/'+notice.notice_id+'.html' " target="_blank">{{notice.notice_title}}</a></span>
							<span id="date" style="float:right;margin-right:200px;"><b>{{notice.release_time}}</b></span>
						</div>
						<div id="pagination"> 
							<ul class="pagination pagination-sm">
							    <li><a href="javascript:void(0)" v-on:click="pageFront">&laquo;</a></li>
							    <li v-for="n in pages"><a v-on:click="pageto(n)" href="javascript:void(0)">{{n}}</a></li>
							    <li><a href="javascript:void(0)" v-on:click="pageBehind">&raquo;</a></li>
							</ul>
						</div>
					</div>
			 	</div>
			</div>
		</div>
	</div>
	<footer style="text-align: center;margin-top: 130px;">Email zhenxi@yeah.net</footer>
<!-- vue写到body结束标签的前面，因为vue需要挂载dom，所以必须写到dom结构的后面，vue用来做数据绑定，可以绑定数据、事件、dom属性等功能强大，异步数据访问用jquery ajax来做，路由由tp框架做，可以保证我们的项目是处于一个统一的路由下 -->
	<script type="module">
		import {zh} from '/libSys/public/syspkg/languages/zh.js'
		import {en} from '/libSys/public/syspkg/languages/en.js'
		console.log(zh.message.title)
		console.log(en.message.title)
	
	// alert(test)
		// import {test} from "zh.js";
		// alert(test);
		// import en from "/libSys/Public/syspkg/languages/en.js"
		Vue.use(VueI18n)

		// const messages = {
		// 	zh : {
		// 		message : {
		// 			hello : '这是一个测试'
		// 		}
		// 	},
		// 	en : {
		// 		message : {
		// 			hello : 'this is a test'
		// 		}
		// 	}
		// }
		const i18n = new VueI18n({
			locale : 'zh',
			messages : {
				'zh' : zh,
				'en' :en
			}
		})
		/*vue*/
		var app = new Vue({
			el : '#home',
			i18n,
			data : {
				activeBrowse : '',
				activeLogin : 'none',
				account : "",
				password : "",
				input : "",
				search : "",
				notices : [],
				noticePlus : [],
				pages : 0,
				currentPage : 0,
			},
			created:function(){
				var that = this
				// this.$i18n.locale = 'en'
				$.ajax({
					url : "<?php echo U('Index/isLogin');?>",
					contentType : "application/x-www-form-urlencoded;charset=utf-8",
					dataType : "json",
					success : function(data){
						if(data.code == 'success'){
							that.activeLogin = ''
							that.activeBrowse = 'none'
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
							var notices = jsonStrToObject(data.data)
							var length = notices.length
							var pageNum = length%4 == 0 ?  length/4 : parseInt(length/4)+1
							// layer.msg(length + ";"+pageNum)
							var noticePlus = new Array()
							for(var n=0;n<pageNum;n++){
								noticePlus[n]=new Array()
								var border = n==(pageNum-1) ? length%4:4 
								for(var m=0;m<border;m++){
									noticePlus[n][m] = notices[4*n+m]
								}
							}
							that.noticePlus = noticePlus
							that.pages = pageNum
							that.currentPage = 1
							that.notices = that.noticePlus[0]
						}
					}
				})
			},
			methods : {
				pageto :function(n){
					this.notices = this.noticePlus[n-1]
					this.currentPage = n
					
				},
				pageFront: function(){
					if(this.currentPage >1){
						this.notices = this.noticePlus[this.currentPage-2]
						this.currentPage = this.currentPage-1
					}
					
				},
				pageBehind : function(){
					if(this.currentPage < this.pages){
						this.notices = this.noticePlus[this.currentPage]
						this.currentPage = this.currentPage+1
					}
				},
				quitSys: function (event) {
					var that = this
					$.ajax({
						url: "<?php echo U('Index/quit');?>",
						dataType: "json",
						success: function (data) {
							if (data.code == 'success') {
								that.activeBrowse = ''
								that.activeLogin = 'none'
							}
							if (data.code == 'fail') {
								layer.msg(data.msg)
							}
						}
					})
				},
				searchC : function(){
					var that=this
					var str = "<?php echo U('Index/search?input=input1&search=search1');?>"
					str = str.replace("input1",that.input)
					str = str.replace("search1",that.search)
					window.location.href = str;
				},
			}
		})
	</script>
</body>
</html>