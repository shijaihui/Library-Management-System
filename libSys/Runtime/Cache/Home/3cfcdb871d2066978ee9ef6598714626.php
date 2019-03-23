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
	<link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/css/home.css">
	<title>home</title>
</head>
<body>

<!-- html中尽量不要写样式，也不要写属性，html只用来布局框架，css写入public/syspkg/css文件夹下，使用vue后js大部分由vue承担，若需额外js，写到pbulic/syspkg/js文件夹下 -->
	<div class="home" id="home">
		<nav class="navbar navbar-default" role="navigation">
		    <div class="container-fluid">
		    <div class="navbar-header">
		        <a class="navbar-brand" href="">libSys</a>
		    </div>
		    <div>
		        <ul class="nav navbar-nav">
		            <li  v-bind:class="{ active : isActive[0] }" v-on:click="active(0)"><a href="javascript:void(0);">图书管理</a></li>
		            <li v-bind:class="{ active : isActive[1] }" v-on:click="active(1)"><a href="javascript:void(0);">借书处理</a></li>
					<li v-bind:class="{ active : isActive[2] }" v-on:click="active(2)"><a href="javascript:void(0);">还书处理</a></li>
					<li v-bind:class="{ active : isActive[3] }" v-on:click="active(3)"><a href="javascript:void(0);">注册新用户</a></li>
					<li v-bind:class="{ active : isActive[4] }" v-on:click="active(4)"><a href="javascript:void(0);">信息维护</a></li>
					<li><button v-on:click="quitSys">quit</button></li>
		        </ul>
		    </div>
		    </div>
		</nav>
		<!-- 图书管理 -->
		<div  v-bind:class="{ unshow : isShow[0] }">
			<div class="header">
				<div class="search">
					<input v-model="text" type="text" name="search" placeholder="请输入ISBN或者Title">
					<a href="javascript:void(0);"><i v-on:click="searchBook" class="iconfont icon-sousuo"></i></a>
				</div>
				<div class="add">
					<button v-on:click="addBook">add</button>
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
							<th>options   </th>
						</tr>
					</thead>
					<tbody id="add">
						<tr v-for="(book,index) in booklist" v-bind:id='index'>
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
							<td><a href="javascript:void(0);" v-on:click="removeBook(index)">delete</a> | <a href="javascript:void(0);" v-on:click="updateBook(index)">modify</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!-- 借书处理 -->
		<div v-bind:class="{ unshow : isShow[1] }">
		借书处理
		</div>
		<!-- 还书处理 -->
		<div v-bind:class="{ unshow : isShow[2] }">
		还书处理
		</div>
		<!-- 注册新用户 -->
		<div v-bind:class="{ unshow : isShow[3] }">
			<div class="block">
				<div class="line">添加新读者用户</div>
				<div class="line">
					<label>账户</label>
					<span><input type="text" name="account" v-model="account"></span>
				</div>
				<div class="line">
					<label>密码</label>
					<span><input type="password" name="password" v-model="password"></span>
				</div>
				<div class="line">
					<label>邮箱</label>
					<span><input type="email" name="email" v-model="email"></span>
				</div>
				<div class="line">
					<button class="btn" v-on:click="addUser">添加</button>
				</div>
			
			</div>
		</div>
		<!-- 信息维护 -->
		<div v-bind:class="{ unshow : isShow[4] }">
		信息维护
		</div>
	</div>
<!-- vue写到body结束标签的前面，因为vue需要挂载dom，所以必须写到dom结构的后面，vue用来做数据绑定，可以绑定数据、事件、dom属性等功能强大，异步数据访问用jquery ajax来做，路由由tp框架做，可以保证我们的项目是处于一个统一的路由下 -->
	<script type="text/javascript">
		/*vue*/
		var app = new Vue({
			el : '#home',
			data : {
				account : "admin",
				password : "123456",
				email : "245@qq.com",
				booklist : [],
				text : "",
				isActive : [
					true,false,false,false,false
				],
				isShow : [
					false,true,true,true,true
				],
			},
			created : function(){
				//
				var that = this
					$.ajax({
						url : "<?php echo U('Index/getBook');?>",
						dataType : "json",
						success : function(data){
							if(data.code == 'success'){
								
								//将json字符串转为json对象
								var jsonStr = data.data
                                  //去掉字符串中的空格
                                  jsonStr = jsonStr.replace(" ","");
                                  //typeof https://www.cnblogs.com/liu-fei-fei/p/7715870.html
                                  if(typeof jsonStr!='object'){
                                    //去掉饭斜杠
                                    jsonStr = jsonStr.replace(/\ufeff/g,"")
                                    var jsonObj = JSON.parse(jsonStr)
                                    that.booklist = jsonObj
                                  }
							}
							if(data.code == 'fail'){
								layer.msg(data.msg)
							}
						}
					})
			},
			methods : {
				active : function(index){
					
					for(var i=0;i<=4;i++){
						this.isActive.splice(i,1,false)
						this.isShow.splice(i,1,true)
						// this.isActive.$set(i,false)
						// this.isShow.$set(i,true)
					}
					this.isActive.splice(index,1,true)
					this.isShow.splice(index,1,false)
					// this.isActive.$set(index,true)
					// this.isShow.$set(index,false)

				},
				addUser : function(event){
					var that = this

					$.ajax({
						url : "<?php echo U('Index/addUser');?>",
						type : "post",
						contentType : "application/x-www-form-urlencoded;charset=utf-8",
						data : {
							user_id : that.account,
							password : that.password,
							email : that.email
						},
						dataType : "json",
						success : function(data){
							if(data.code == 'success'){
								layer.msg(data.msg)
							}
							if(data.code == 'fail'){
								layer.msg(data.msg)
							}
						}
					})
				},
				addBook : function(event){
					var that = this
					layer.open({
						type : 2,
						title: 'add',
	                    shadeClose: true,
	                    shade: 0.8,
	                    area: ['480px', '540px'],
	                    content: "<?php echo U('Index/add');?>" ,//iframe的url
	                    success : function(layero,index){
	                    	var submit = layer.getChildFrame('#submit',index);
	                    	submit.click(function(){
	                    		var book_id = layer.getChildFrame('#book_id',index).val();
		                    	var ISBN = layer.getChildFrame('#ISBN',index).val();
		                    	var title = layer.getChildFrame('#title',index).val();
		                    	var author = layer.getChildFrame('#author',index).val();
		                    	var theme = layer.getChildFrame('#theme',index).val();
		                    	var category = layer.getChildFrame('#category',index).val();
		                    	var abstract = layer.getChildFrame('#abstract',index).val();
		                    	var publisher = layer.getChildFrame('#publisher',index).val();
		                    	var pub_date = layer.getChildFrame('#pub_date',index).val();
		                    	var language = layer.getChildFrame('#language',index).val();
		                    	
		            
	                    		$.ajax({
									url : "<?php echo U('Index/addBook');?>",
									type : "post",
									contentType : "application/x-www-form-urlencoded;charset=utf-8",
									data : {
										book_id : book_id,
										ISBN : ISBN,
										title : title,
										author : author,
										theme : theme,
										category : category,
										abstract : abstract,
										publisher : publisher,
										pub_date : pub_date,
										language : language,
									},
									dataType : "json",
									success : function(data){
										alert("Sin")
										if(data.code == 'success'){
											alert("in")
											layer.close(layer.index)
											//将json字符串转为json对象
											var arr = [
												{
													book_id : book_id,
													isbn : ISBN,
													title : title,
													author : author,
													theme : theme,
													category : category,
													abstract : abstract,
													publisher : publisher,
													pub_date : pub_date,
													language : language,
												}
											]
											var jsonStr = JSON.stringify(arr)
											alert(jsonStr)
			                                  //去掉字符串中的空格
			                                  jsonStr = jsonStr.replace(" ","");
			                                  //typeof https://www.cnblogs.com/liu-fei-fei/p/7715870.html
			                                  if(typeof jsonStr!='object'){
			                                    //去掉饭斜杠
			                                    jsonStr = jsonStr.replace(/\ufeff/g,"")
			                                    var jsonObj = JSON.parse(jsonStr)
			                                    that.booklist.unshift(jsonObj[0])

			                                  }
			                                  layer.msg(data.msg)
										}
										if(data.code == 'fail'){
											layer.close(layer.index)
											layer.msg(data.msg)
										}
									}
								})
	                    	})
	                     }

					})
				},
				removeBook : function(index){
					var that = this
					var book_id = that.booklist[index].book_id
					$.ajax({
						url : "<?php echo U('Index/removeBook');?>",
						type : "post",
						contentType : "application/x-www-form-urlencoded;charset=utf-8",
						data : {
							book_id : book_id
								},
						dataType : "json",
						success : function(data){
							if(data.code == 'success'){
								$("tr#"+index).hide()
								layer.msg(data.msg)
							}
							if(data.code == 'fail'){
								layer.msg(data.msg)
							}
						}
					})
				},
				updateBook : function(index){

				},
				searchBook : function(event){

					var that = this
					/*
					 * 这里是异步数据访问
					 */
					$.ajax({
						url : "<?php echo U('Index/searchBook');?>",
						type : "post",
						contentType : "application/x-www-form-urlencoded;charset=utf-8",
						data : {
							text : that.text
						},
						dataType : "json",
						success : function(data){
							
							if(data.code == 'success'){
								//将json字符串转为json对象
								var jsonStr = data.data
                                  //去掉字符串中的空格
                                  jsonStr = jsonStr.replace(" ","");
                                  //typeof https://www.cnblogs.com/liu-fei-fei/p/7715870.html
                                  if(typeof jsonStr!='object'){
                                    //去掉饭斜杠
                                    jsonStr = jsonStr.replace(/\ufeff/g,"")
                                    var jsonObj = JSON.parse(jsonStr)
                                    that.booklist = jsonObj
                                  }
							}
							if(data.code == 'fail'){
								layer.msg(data.msg)
							}
						}
					})
				},
				quitSys : function(event){
					var that=this
					$.ajax({
						url : "<?php echo U('Index/quit');?>",
						dataType : "json",
						success : function(data){
							if(data.code == 'success'){
								layer.msg(data.msg)
								window.location.href = "<?php echo U('Index/index');?>"
							}
							if(data.code == 'fail'){
								layer.msg(data.msg)
							}
						}
					})
				},
				toUserInfo : function(event){
					window.location.href = "<?php echo U('Index/info');?>";
				}

			}
		})
	</script>
</body>
</html>