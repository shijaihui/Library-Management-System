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
	<script type="text/javascript" src="/libSys/public/syspkg/js/jsonStrToObject.js"></script>
	<title>personal</title>
	<style type="text/css">
		#header{
			z-index: 1;
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
	 		margin-left: 5px;
	 	}
	 	.header-text{
			margin-left: 380px;
			width: 40px;
			height: 20px;
			font-size: 13px;
			color : black;
			text-align: center;
		}
		.button_cp{
			margin-left: 80%;
		
		}
		#personal{
			margin : 100px auto;
		}
		#BorRet{
			width: 1000px;
			min-height: 700px;
			/*background: red;*/
			margin : 50px auto;
			border: 1px solid #ddd;
		}
		#nav{
			display: flex;
			height: 58px;
			width: 100%;
			background: #F8F9Fa;
			border-bottom: 1px solid #ddd;
		}
		#nav-logo{
			margin: 18px 15px 0 21px;
		    line-height: 24px;
		    height: 24px;
		    padding-right: 15px;
			font-size: 16px;
			font-weight: 700;
			border-right: 1px dashed #ddd;
		}
		#nav-label{
			height: 58px;
			display: flex;
			font-size: 12px;
			font-weight: 700;
		}
		#label{
    		height: 54px;
			line-height: 60px;
		    margin-right: 18px;
		    text-align: center;
		    border-bottom: 3px solid #f8f9fa;
		}
		/*personaldata*/
		.personaldata{
		  position: relative;
		  height: 279px;
		  width: 1000px;
		  background: white;
		  margin : 100px auto;
		  border: 1px solid #ddd;
		  
		}

		.touxiang{
		  padding : 60px 50px 20px 50px;
		  float: left;
		  width: 20%;
		  height: 277px;
		  background: white;
		  border-right: 1px solid #ddd;
		}

		.data{
		  background: white;
		  float:right;
		  width: 80%;
		  height: 240px;
		  margin: 30px 0 0 0;
		}

		.part1{
		  height: 40%;
		  margin: 0 0 0 10%;
		}

		.part2{
		  height: 40%;
		  margin: 0 0 0 10%;
		}

		.button{
		  height: 20%;
		  float:right;
		  margin-right: 10%;
		  
		}

		.btt{
		  width:122px; 
			height:32px; 
			color:rgb(83, 194, 214); 
			background: white;
			box-shadow: none;
			border: 1px solid #ddd;
		}

		.nickname{
		  float: left;
		  width: 50%;

		}

		.address{
		  float: right;
		  width: 50%;
		  margin: 0 0 0 0;
		}

		.email{
		  float: left;
		  width: 50%;
		}

		.balance{
		  float: right;
		  width: 50%;
		  margin: 0 0 0 0;
		}
		#ball{
			z-index: 100;
			cursor: move;
			position: fixed;
			background: linear-gradient(to top,rgb(156, 245, 208),#EBF5FC);
			top :  80px;
			right: 60px ;
			width: 70px;
			height: 70px;
			box-shadow: 0px 0px 5px 2px #ECF3F7;
			border-radius: 100%;
			padding-top : 20px;
			text-align: center;
			font-size: 20px;
			/*color : #6996FF;*/
			color : #DB4B15;
		}
	</style>
</head>
<body>
    
<!-- html中尽量不要写样式，也不要写属性，html只用来布局框架，css写入public/syspkg/css文件夹下，使用vue后js大部分由vue承担，若需额外js，写到pbulic/syspkg/js文件夹下 -->
	<div class="home" id="home">
		<div onselectstart="return false" id="ball" v-on:mousedown="startMove" v-on:mousemove="runMove" v-on:mouseup="endMove" v-on:mouseout="endMove" v-bind:style="{top : Y,right : X}">
			{{costs}}
		</div>
		<div id="header">
			<div id="header-logo">
				<a  href="<?php echo U('Index/browse');?>">
					<img src="/libSys/Public/syspkg/images/logo1.png" width="101" height="45">
				</a>
			</div>
			<div class="button_cp">
				<button class="btn btn-default" v-on:click="changePassword">Change Password</button>
			</div>

	</div>
		<div class="personaldata">
			<div class="touxiang">
				<img src="/libSys/Public/syspkg/images/head.jpg" width="100" height="100">
				<div style="font-size: 18px;text-align: center;margin-top: 10px">
					{{account}}
				</div>
				<div style="text-align: center;margin-top: 10px">
					{{card_id}}
				</div>
			</div>
			<div class="data" v-bind:style="{display:activeSave}">
				<div class="part1">
					<div class="nickname">
						<h3> Nickname </h3>
						<input type="text" class="usernameText" v-model="nickname">
					</div>
					<div class="address">
						<h3> Address </h3>
						<input type="text" class="addressText" v-model="address">
					</div>
				</div>
				<div class="part2">
					<div class="email">
						<h3>Email</h3>
						<input type="email"   class="emailText" v-model="email">
					</div>
					<div class="balance">
						<h3>Balance</h3>
						<input type="text" readonly="true" class="balanceText" v-model="balance">
					</div>
				</div>	
				<div class="button">
					<button class="btn btn-default" v-on:click="updateInfo">Save</button>
				</div>
			</div>
			<div class="data" v-bind:style="{display:activeModify}">
				<div class="part1">
					<div class="nickname">
						<h3> Nickname </h3>
						<div>{{nickname}}</div>
					</div>
					<div class="address">
						<h3>Address</h3>
						<div>{{address}}</div>
					</div>
				</div>
				<div class="part2">
					<div class="email">
						<h3> Email</h3>
						<div>{{email}}</div>
					</div>
					<div class="balance">
						<h3>Balance</h3>
						<div>{{balance}}</div>
					</div>
				</div>	
				<div class="button">
					<button class="btn btn-default" v-on:click="toSave">Modify Info</button>
				</div>
			</div>
		</div>

		<div id="BorRet">
			<div id="nav">
				<div id="nav-logo">Bibliosoft</div>
				<div id="nav-label">
					<div id="label" v-bind:style="{borderBottom : activeBorder[0]}"><a href="javascript:void(0)" v-on:click="toPanel(1)" style="text-decoration: none" v-bind:style="{color:activeColor[0]}">My Borrowed</a></div>
					<div id="label" v-bind:style="{borderBottom : activeBorder[1]}"><a href="javascript:void(0)" v-on:click="toPanel(2)" style="text-decoration: none" v-bind:style="{color:activeColor[1]}">My Returned</a></div>
					<div id="label" v-bind:style="{borderBottom : activeBorder[2]}"><a href="javascript:void(0)" v-on:click="toPanel(3)" style="text-decoration: none" v-bind:style="{color:activeColor[2]}">My Ordered</a></div>
				</div>
			</div>
			<div id="panel1" v-bind:style="{display : activeP1}">

				<table class="table table-striped">
					<thead>
						<tr>
							<th>BookId</th>
							<th>Title</th>
							<th>Borrow Date</th>
							<th>Borrow Period</th>
							<th>Cost</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="item in borrowlist">
							<td>{{item.book_id}}</td>
							<td>{{item.title}}</td>
							<td>{{item.bor_time}}</td>
							<td>{{item.bor_length}}</td>
							<td>{{item.cost}}</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div id="panel2" v-bind:style="{display : activeP2}">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>BookId</th>
							<th>Title</th>
							<th>Return Date</th>
							<th>Fine</th>
						</tr>
					</thead>
					<tbody>
					<tr v-for="item in returnlist">
							<td>{{item.book_id}}</td>
							<td>{{item.title}}</td>
							<td>{{item.ret_time}}</td>
							<td>{{item.fine}}</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div id="panel3" v-bind:style="{display : activeP3}">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ISBN</th>
							<th>Title</th>
							<th>Order Time</th>
						</tr>
					</thead>
					<tbody>
					<tr v-for="item in orderlist">
							<td>{{item.isbn}}</td>
							<td>{{item.title}}</td>
							<td>{{item.ord_time}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<!-- vue写到body结束标签的前面，因为vue需要挂载dom，所以必须写到dom结构的后面，vue用来做数据绑定，可以绑定数据、事件、dom属性等功能强大，异步数据访问用jquery ajax来做，路由由tp框架做，可以保证我们的项目是处于一个统一的路由下 -->
	<script type="text/javascript">
		/*vue*/
		var app = new Vue({
			el : '#home',
			data : {
				costs : "￥"+0,
				account : "",
				nickname: "",
				address : "",
				email : "",
				balance : "",
				card_id : "",
				booklist : [],
                borrowlist : [],
                returnlist : [],
                orderlist : [],
				text : "",
				activeP1 : 'none',
				activeP2 : 'none',
				activeP3 : 'none',
				activeColor : ['#333','#333','#333'],
				activeBorder : ['','',''],
				activeSave : 'none',
				activeModify : '',
				Y : "80px",
				X : "60px",
				isMove : false
			},
			created : function(){
				//
				var that = this
					$.ajax({
						url : "<?php echo U('Index/getInfo');?>",
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
                                    that.account = jsonObj[0].user_id
                                    that.nickname = jsonObj[0].name
                                    that.address = jsonObj[0].address
                                    that.email = jsonObj[0].email
                                    that.balance = jsonObj[0].balance
									that.card_id = jsonObj[0].card_id
                                  }
							}
							if(data.code == 'fail'){
								window.location.href = "<?php echo U('Index/index');?>"
							}
						}
					})
					$.ajax({
						url : "<?php echo U('Index/getCosts');?>",
						dataType : "json",
						success : function(data){
							if(data.code == 'success'){
								that.costs = "$"+data.data
							}
							if(data.code == 'fail'){
								window.location.href = "<?php echo U('Index/index');?>"
							}
						}
					})

			},
			methods : {
				startMove: function(event){
					this.isMove = true
				},
				runMove : function(event){
					if(this.isMove){
						var clientWidth = document.body.clientWidth
						var clientX = (clientWidth-event.clientX-35)+"px"
						var clientY = (event.clientY-35)+"px"
						this.X = clientX
						this.Y = clientY
					}
				},
				endMove : function(event){
					this.isMove = false
				},
				toSave : function(){
					this.activeSave = ''
					this.activeModify = 'none'
				},
				// M
				changePassword : function(){
					var that = this
					layer.open({
						type: 2,
						title: 'update',
						shadeClose: true,
						shade: 0.8,
						area: ['400px', '530px'],
						content: "<?php echo U('Index/modify');?>",//iframe的url
						success: function (layero, index) {
							var submit = layer.getChildFrame('#submit', index);
							submit.click(function () {
								var op = layer.getChildFrame('#op', index).val();
								var np = layer.getChildFrame('#np', index).val();
								var rp = layer.getChildFrame('#rp', index).val();
								$.ajax({
									url: "<?php echo U('Index/changePW');?>",
									type: "post",
									contentType: "application/x-www-form-urlencoded;charset=utf-8",
									data: {
										op: op,
										np: np,
										rp: rp,
									},
									dataType: "json",
									success: function (data) {
										if (data.code == 'success') {
											layer.close(layer.index)
											//将json字符串转为json对象
											var arr = [
												{
													op: op,
													np: np,
													rp: rp,
												}
											]
											var jsonStr = JSON.stringify(arr)

											//去掉字符串中的空格
											jsonStr = jsonStr.replace(" ", "");
											//typeof https://www.cnblogs.com/liu-fei-fei/p/7715870.html
											if (typeof jsonStr != 'object') {
												//去掉饭斜杠
												jsonStr = jsonStr.replace(/\ufeff/g, "")
												var jsonObj = JSON.parse(jsonStr)
												that.booklist.unshift(jsonObj[0])
											}
											layer.msg(data.msg)
										}
										if (data.code == 'fail') {
											layer.close(layer.index)
											layer.msg(data.msg)
										}
									}
								})
							})
						}
					})
				},
				// M
				updateInfo : function(){
					var that = this
					var canSub = false
					var patt1 = /.+/
					var patt2 = /^[a-z\d]+(\.[a-z\d]+)*@([\da-z](-[\da-z])?)+(\.{1,2}[a-z]+)+$/
					var patt3 = /^[1-9]{1}[0-9]*(?:[0-9]*|\.[0-9]{1,2})$/
					var parr = new Array();
					parr[0] = patt1.test(this.nickname)
					parr[1] = patt1.test(this.address)
					parr[2] = patt2.test(this.email)
					parr[3] = patt3.test(this.balance)
					for(var i=0;i<parr.length;i++){
						if(parr[i]){
							canSub = true
						}else{
							switch(i){
								case 0 : 
									layer.msg("nickname can't empty");
									break;
								case 1 : 
									layer.msg("address can't empty");
									break;
								case 2 :
									layer.msg("Invalid e-mail address");
									break;
								case 3 : 
									layer.msg("Invalid digital input,please input like '350' or '350.12' ");
									break;
								default : 
									layer.msg("fail");
									break;
							}
							canSub =false;
							break;
						}
					}
					if(canSub){
						$.ajax({
							url : "<?php echo U('Index/updateInfo');?>",
							type : "post",
							contentType : "application/x-www-form-urlencoded;charset=utf-8",
							data : {
								nickname : that.nickname,
								address : that.address,
								email : that.email,
								balance : that.balance
							},
							dataType : "json",
							success : function(data){
								if(data.code == 'success'){
									layer.msg('Save success')
								}
								if(data.code == 'fail'){
									layer.msg('Save fail , please try again')
								}
							},
							complete : function(){
								that.activeSave = 'none'
								that.activeModify = ''
							}
						})
					}
				},
				toPanel:function(index){
					var that = this
					this.activeP1 = index == 1? '':'none'
					this.activeP2 = index == 2? '':'none'
					this.activeP3 = index == 3? '':'none'
					this.activeColor[0] = index==1? '#1796f9' : '#333'
					this.activeColor[1] = index==2? '#1796f9' : '#333'
					this.activeColor[2] = index==3? '#1796f9' : '#333'
					this.activeBorder[0] = index==1? '3px solid #1796f9' : ''
					this.activeBorder[1] = index==2? '3px solid #1796f9' : ''
					this.activeBorder[2] = index==3? '3px solid #1796f9' : ''
					if(index == 1){
						$.ajax({
						url : "<?php echo U('Index/getBorrow');?>",
						dataType : "json",
						success : function(data){
							if(data.code == 'success'){
								//将json字符串转为json对象
								that.borrowlist = jsonStrToObject(data.data)
							}
							if(data.code == 'fail'){
								layer.msg(data.msg)
							}
						}
					})
					}
					if(index == 2){
						$.ajax({
						url : "<?php echo U('Index/getReturn');?>",
						dataType : "json",
						success : function(data){
							if(data.code == 'success'){
								//将json字符串转为json对象
								that.returnlist = jsonStrToObject(data.data)
                                  
							}
							if(data.code == 'fail'){
								layer.msg(data.msg)
							}
						}
					})
					}
					if(index == 3){
						$.ajax({
						url : "<?php echo U('Index/getOrder');?>",
						dataType : "json",
						success : function(data){
							if(data.code == 'success'){
								//将json字符串转为json对象
								that.orderlist = jsonStrToObject(data.data)
                                  
							}
							if(data.code == 'fail'){
								layer.msg(data.msg)
							}
						}
					})
					}
				},
				quitSys : function(event){
					var that=this
					$.ajax({
						url : "<?php echo U('Index/quit');?>",
						dataType : "json",
						success : function(data){
							if(data.code == 'success'){
								layer.msg(data.msg)
								window.location.href = "<?php echo U('Index/home');?>"
							}
							if(data.code == 'fail'){
								layer.msg(data.msg)
							}
						}
					})
				},

			}
		})
	</script>
</body>
</html>