<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
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
	<link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/css/adhome.css">
	<link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/css/admin_head.css" >
	<link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/css/admin_home.css">
	<title>home</title>
</head>

<body class="body" id="body">

	<!-- html中尽量不要写样式，也不要写属性，html只用来布局框架，css写入public/syspkg/css文件夹下，使用vue后js大部分由vue承担，若需额外js，写到pbulic/syspkg/js文件夹下 -->
	<div id="head" class="head" >
		<div class="tit" ><h> Bibliosoft Library Management System</h> </div>
		<div class="" style="float: right;margin-top: 20px;margin-right: 300px;" id="drop">
			<img src="/libSys/public/syspkg/images/notlogin.png" class="img_head dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<ul class="dropdown-menu" style="position:relative;top:100px;left: 100px; width: 50px;z-index: 2;">
				<li ><a href="javascript:void(0);" class="admin_ul_li_a" v-on:click="changePassword">change password</a></li>
				<li ><a href="javascript:void(0);" class="admin_ul_li_a" v-on:click="quitSys">log out</a></li>
			</ul>
		</div>
	</div>
	<div  id="ddp" class="top dropdown" >
		<img src="/libSys/public/syspkg/images/logo.png" width=90 height=90 class="timg3" >
		<div class="dropdown-content">
			<div class="li" >
					<img src="/libSys/public/syspkg/images/timg2.png" width=40 height=40 >
					<button v-on:click="getPageOne"   id="button1" class="btnn">Set fine </button>
			</div>
			<div class="li" style="margin-top: 40px;">
				<img class="p2" src="/libSys/public/syspkg/images/timg1.png" width=27 height=27>
				<button v-on:click="getPageTwo"  id="button2" class="btnn">Set return period </button>
			</div>
			<div class="li" style="margin-top: 40px;">
				<img class="p3" src="/libSys/public/syspkg/images/timg.png" width=30 height=30>
				<button v-on:click="getPageThree"  id="button3" class="btnn" style="height:40px;">Set Deposit</button>
			</div>
		</div>
	</div>

	

 

    <div class="home" id="home"  style="position: fixed;">
			<div id="header-search" class="searchh"  style="position: fixed;">
				<select name="select" v-model="search" style="height: 40px;width: 100px;">
					<option selected="selected" value="" >Staff ID</option>
					<option value="name">Name</option>
					
				</select>
				<input id="input" type="text" name="" v-model="input" class="searchInput" style="position: relative; ">
				<button v-on:click="searchStaff" class="searchButton">search</button>
			</div>

		<!-- 工作人员管理 -->
		<div  class="admin_home_div"  style="position: fixed;top: 200px;">
			<div class="content">
				<table class="table table-bordered" id="table-1">
					<thead>
						<tr>
							<th>staff_id</th>
							<th>name</th>
							<th>introduction</th>
							<th>tel</th>
							<th>password</th>
                            <th>email </th>
							<th>options </th>
						</tr>
					</thead>
					<tbody id="add">
						<tr v-for="(staff,index) in inputlist" v-bind:id='index'>
							<td>{{staff.staff_id}}</td>
							<td>{{staff.name}}</td>
							<td>{{staff.introduction}}</td>
							<td>{{staff.tel}}</td>
							<td>{{staff.password}}</td>
                            <td>{{staff.email}}</td>
							<td>
								<a href="javascript:void(0);" v-on:click="removeStaff(index)">delete</a>
								<a href="javascript:void(0);" v-on:click="updateStaff(index)">modify</a>
							</td>
							<!--| <a href="javascript:void(0);" v-on:click="updatestaff(index)">modify</a></td>-->
						</tr>
					</tbody>
				</table>

				<div id="button4">
					<button v-on:click="addStaff" class="button">add</button>
				</div>
			</div>
		</div>

	</div>
	<!-- vue写到body结束标签的前面，因为vue需要挂载dom，所以必须写到dom结构的后面，vue用来做数据绑定，可以绑定数据、事件、dom属性等功能强大，异步数据访问用jquery ajax来做，路由由tp框架做，可以保证我们的项目是处于一个统一的路由下 -->
	<script type="text/javascript">
		/*vue*/
        var head=new Vue({
            el: '#drop',
            data:{
            	
            },
     //        created : function(){
     //        	var that = this;
					// $.ajax({
					// 	url: "<?php echo U('Index/getPassword');?>",
					// 	type: "post",
					// 	contentType: "application/x-www-form-urlencoded;charset=utf-8",
					// 	data: {
					// 		account:that.accountGet
					// 	},
					// 	dataType: "json",
					// 	success: function (data) {

					// 		if (data.code == 'success') {
								

					// 			//将json字符串转为json对象
					// 			var jsonStr = data.data
								
					// 			//去掉字符串中的空格
					// 			jsonStr = jsonStr.replace(" ", "");
					// 			//layer.msg(data.msg)
					// 			//typeof https://www.cnblogs.com/liu-fei-fei/p/7715870.html
					// 			if (typeof jsonStr != 'object') {
					// 				//去掉饭斜杠


					// 				jsonStr = jsonStr.replace(/\ufeff/g, "")
					// 				var jsonObj = JSON.parse(jsonStr);

					// 				var passwordlist = jsonObj;

					// 				that.passwordGet = passwordlist[0].pwd;
									
					// 				// layer.msg(jsonObj)
					// 			}
					// 		}
					// 		if (data.code == 'fail') {
					// 			layer.msg(data.msg)
					// 		}
					// 	}
					// })
     //        },
            methods: {
                changePassword: function (event) {
                	var that = this;
                    layer.open({
                        type: 2,
                        title: 'changePassword',
                        shadeClose: true,
                        shade: 0.8,
                        area: ['480px', '540px'],
                        content: "<?php echo U('Index/changePassword');?>",
                        success: function (layero, index) {
                        	var submit = layer.getChildFrame('#submit', index);
                        	submit.click(function(){
                        		var new_password = layer.getChildFrame('#new_password1', index).val();
                                var re_password = layer.getChildFrame('#new_password2', index).val();
                        		var password = layer.getChildFrame('#password', index).val();
                        		if(new_password !== re_password){
                                    layer.confirm('please enter same password', {
                                        btn: ['ok'] //按钮
                                    },function(){
                                        window.location.href = "<?php echo U('Index/home');?>"
                                    }, );
                                    return;
                                }

                        		$.ajax({
									url: "<?php echo U('Index/changeAdmin');?>",
									type: "post",
									contentType: "application/x-www-form-urlencoded;charset=utf-8",
									data: {
										password: password,
										newPassword: new_password,
                                        rePassword: re_password,
									},
									dataType: "json",
									success: function (data) {
										// layer.msg("sad");
										if (data.code == 'success') {
											layer.confirm('change successfully, please login again', {
												  btn: ['ok'] //按钮
												}, function(){			  
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
												}, );
										}
										if (data.code == 'fail') {
											layer.msg("fail")
										}
										if (data.code == 'fail2') {
											layer.msg("the passwordd is not correct")
										}
									}
								})
                        	})
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
								layer.msg("data.msg")
								layer.msg(data.msg)
								window.location.href = "<?php echo U('Index/index');?>"
							}
							if (data.code == 'fail') {
								layer.msg(data.msg)
							}
						}
					})
				}
            }
        })
		var part=new Vue({
			el:'#ddp',
			data:{
				valuelist:[ { "security_deposit": "0", "borrow_length": "0", "daily_fine": "1" } ],
			},
			created :function(){
				var that = this;
				$.ajax({
					url: "<?php echo U('Index/getValue');?>",
					dataType: "json",
					success: function (data) {
						if (data.code == 'success') {
							

							//将json字符串转为json对象
							var jsonStr = data.data
							
							//去掉字符串中的空格
							jsonStr = jsonStr.replace(" ", "");
							//layer.msg(data.msg)
							//typeof https://www.cnblogs.com/liu-fei-fei/p/7715870.html
							if (typeof jsonStr != 'object') {
								//去掉饭斜杠


								jsonStr = jsonStr.replace(/\ufeff/g, "")
								var jsonObj = JSON.parse(jsonStr)
								that.valuelist = jsonObj
								layer.msg(jsonObj)
							}
						}
						if (data.code == 'fail') {
							layer.msg(data.msg)
						}
					}
				})
			},
            methods: {
            getPageOne: function(event) {
            	var that = this;
                layer.open({
                    type: 2,
                    title: 'overduefine',
                    shadeClose: true,
                    shade: 0.8,
                    area: ['480px', '540px'],
                    content: "<?php echo U('Index/overduefine');?>",
                    success : function(layero, index){
                    	layer.getChildFrame('#new_fine', index).val(that.valuelist[0].daily_fine);
                    	var submit = layer.getChildFrame('#submit', index);
                    	submit.click(function(){
                    		var fine = layer.getChildFrame('#new_fine', index).val();
                    		if(isNaN(fine)){
                                layer.confirm('fine must be a number', {
                                    btn: ['ok'] //按钮
                                },function(){
                                    window.location.href = "<?php echo U('Index/home');?>"
                                }, );
                                return;
                            }
                    		$.ajax({
								url: "<?php echo U('Index/changeFine');?>",
								type: "post",
								contentType: "application/x-www-form-urlencoded;charset=utf-8",
								data: {
									daily_fine: fine
								},
								dataType: "json",
								success: function (data) {
									if (data.code == 'success') {
										layer.close(index);
										layer.msg("success")
									}
									if (data.code == 'fail') {
										layer.msg("fail")
									}
								}
							})

                    	})
                    }
                })
            },
            getPageTwo: function(event) {
            	var that = this;
                layer.open({
                    type: 2,
                    title: 'returnperiod',
                    shadeClose: true,
                    shade: 0.8,
                    area: ['480px', '540px'],
                    content: "<?php echo U('Index/returnperiod');?>",
                    success : function(layero, index){
                    	layer.getChildFrame('#new_period', index).val( that.valuelist[0].borrow_length);
                    	var submit = layer.getChildFrame('#submit', index);
                    	submit.click(function(){
                    		var period = layer.getChildFrame('#new_period', index).val();
                            if(isNaN(period)){
                                layer.confirm('period must be a number', {
                                    btn: ['ok'] //按钮
                                },function(){
                                    window.location.href = "<?php echo U('Index/home');?>"
                                }, );
                                return;
                            }
                    		$.ajax({
								url: "<?php echo U('Index/changePeriod');?>",
								type: "post",
								contentType: "application/x-www-form-urlencoded;charset=utf-8",
								data: {
									borrow_length: period
								},
								dataType: "json",
								success: function (data) {
									if (data.code == 'success') {
										layer.close(index);
										layer.msg("success")
									}
									if (data.code == 'fail') {
										layer.msg("fail")
									}
								}
							})

                    	})
                    }
                })
            },
            getPageThree: function(event) {
            	var that = this;
                layer.open({
                    type: 2,
                    title: 'securitydeposit',
                    shadeClose: true,
                    shade: 0.8,
                    area: ['480px', '540px'],
                    content: "<?php echo U('Index/securitydeposit');?>",
                    success : function(layero, index){
                    	layer.getChildFrame('#security_deposit', index).val(that.valuelist[0].security_deposit);
                    	var submit = layer.getChildFrame('#submit', index);
                    	submit.click(function(){
                    		var deposit = layer.getChildFrame('#security_deposit', index).val();
                            if(isNaN(deposit)){
                                layer.confirm('deposit must be a number', {
                                    btn: ['ok'] //按钮
                                },function(){
                                    window.location.href = "<?php echo U('Index/home');?>"
                                }, );
                                return;
                            }
                    		$.ajax({
								url: "<?php echo U('Index/changeDeposit');?>",
								type: "post",
								contentType: "application/x-www-form-urlencoded;charset=utf-8",
								data: {
									security_deposit: deposit
								},
								dataType: "json",
								success: function (data) {
									if (data.code == 'success') {
										layer.close(index);
										layer.msg("success")
									}
									if (data.code == 'fail') {
										layer.msg("fail")
									}
								}
							})
                    		
                    	})
                    }
                })
            },
			}
		})

 
		var app = new Vue({
			el: '#home',
			data: {
				account: "admin",
				password: "123456",
				email: "245@qq.com",
				stafflist: [],
				inputlist:[],
				text: "",
				input:"",
				search:"",
				searchlist:[],
				isActive: [
					true, false, false, false, false
				],
				isShow: [
					false, false, false, true, true
				],
			},

			created: function () {
				//
				var that = this
				$.ajax({
					url: "<?php echo U('Index/getStaff');?>",
					dataType: "json",
					success: function (data) {
						if (data.code == 'success') {

							//将json字符串转为json对象
							var jsonStr = data.data
							
							//去掉字符串中的空格
							jsonStr = jsonStr.replace(" ", "");
							//layer.msg(data.msg)
							//typeof https://www.cnblogs.com/liu-fei-fei/p/7715870.html
							if (typeof jsonStr != 'object') {
								//去掉饭斜杠


								jsonStr = jsonStr.replace(/\ufeff/g, "")
								var jsonObj = JSON.parse(jsonStr)
								that.stafflist = jsonObj
								that.inputlist = that.stafflist
							}
						}
						if (data.code == 'fail') {
							layer.msg(data.msg)
						}
					}
				})
			},
			methods: {
                
				active: function (index) {

					for (var i = 0; i <= 4; i++) {
						this.isActive.splice(i, 1, false)
						/*splice是一种js方法，用来向Array对象删除或添加项目，
						第一个参数是作用的位置，第二个参数1表示会删除原位置项目，0表示不会删除*/
						this.isShow.splice(i, 1, true)
						// this.isActive.$set(i,false)
						// this.isShow.$set(i,true)
					}
					this.isActive.splice(index, 1, true)
					this.isShow.splice(index, 1, false)
					// this.isActive.$set(index,true)
					// this.isShow.$set(index,false)

				},

				addStaff: function (event) {
					var that = this
					layer.open({
						type: 2,
						title: 'add',
						shadeClose: true,
						shade: 0.8,
						area: ['480px', '540px'],
						content: "<?php echo U('Index/add');?>",//iframe的url
						success: function (layero, index) {
							var submit = layer.getChildFrame('#submit', index);
							submit.click(function () {

								var staff_id = layer.getChildFrame('#staff_id', index).val();
								var name = layer.getChildFrame('#name', index).val();
								// var work_years = layer.getChildFrame('#work_years', index).val();
								var introduction = layer.getChildFrame('#introduction', index).val();
								var tel = layer.getChildFrame('#tel', index).val();
                                var email = layer.getChildFrame('#email', index).val();
                                var pwd = layer.getChildFrame('#password', index).val();
                                
                                var zmReg=/^[a-zA-Z]*$/; 
                                var reg = /^[0-9]+$/;
                                var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
                                var tag =1;
                                for(var i=0;i<that.stafflist.length;i++)
                                {
                                	if(that.stafflist[i].staff_id==staff_id)
                                		{tag=0};
                                }
                                if(tag==0)
                                {
                                	alert("the staff id is exist!");
                                }else if(name.length==0)
								{
									alert("please enter your name!");
								}else if(name!=""&&!zmReg.test(name)){ 
								alert("please enter words for name"); 
								}else if(staff_id.length<6||staff_id.length>13){
									alert("please enter staff id for 6 - 13 words"); 
								}else if(tel!=""&&!reg.test(tel)){ 
									alert('please enter number for telnumber'); 
								}else if(pwd.length<6||pwd.length>11)
								{
									alert("please enter password for 6 - 11 words");
								}else if(!myreg.test(email))
								{
								alert('please enter right email！');
								}else {
								
								$.ajax({
									url: "<?php echo U('Index/addStaff');?>",
									type: "post",
									contentType: "application/x-www-form-urlencoded;charset=utf-8",
									data: {
										staff_id: staff_id,
										name: name,
										introduction: introduction,
										tel: tel,
										pwd: pwd,
                                        email: email,
									},
									dataType: "json",

									success: function (data) {

										if (data.code == 'success') {

											layer.close(layer.index)
											//将json字符串转为json对象
											var arr = [
												{
													staff_id: staff_id,
													name: name,
													// work_years: work_years,
													introduction: introduction,
													tel: tel,
													password:pwd,
                                                    email: email,

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
												that.stafflist.unshift(jsonObj[0])
												that.inputlist = that.stafflist

											}
											layer.msg("ok")
										}
										if (data.code == 'fail') {
											layer.close(layer.index)
											layer.msg("fail")
										}
									}
								})
							}

							})
						}

					})
				},
				updateStaff: function(index) {
					var that = this;
			        var sd = that.stafflist[index].staff_id;
                	var namee = that.stafflist[index].name;
                	// var wy = that.stafflist[index].work_years;
                	var inn = that.stafflist[index].introduction;
                	var tl = that.stafflist[index].tel;
                	var pd = that.stafflist[index].password;
                    var emaill = that.stafflist[index].email;
                    layer.open({
                        type: 2,
                        title: 'modify',
                        shadeClose: true,
                        shade: 0.8,
                        area: ['480px', '540px'],
                        content: "<?php echo U('Index/modify');?>",
                        success: function (layero, index) {

                        	layer.getChildFrame('#staff_id', index).val(sd);
                        	layer.getChildFrame('#name', index).val(namee);
                        	// layer.getChildFrame('#work_years', index).val(wy);
                        	layer.getChildFrame('#introduction', index).val(inn);
                        	layer.getChildFrame('#tel', index).val(tl);
                        	layer.getChildFrame('#pwd', index).val(pd);
                            layer.getChildFrame('#email', index).val(emaill);
                            var submit = layer.getChildFrame('#submit', index);
                            submit.click(function () {
								
                                var staff_id = layer.getChildFrame('#staff_id', index).val();
                                var name = layer.getChildFrame('#name', index).val();
                                // var work_years = layer.getChildFrame('#work_years', index).val();
                                var introduction = layer.getChildFrame('#introduction', index).val();
                                var tel = layer.getChildFrame('#tel', index).val();
                                var pwd = layer.getChildFrame('#pwd', index).val();
                                var email = layer.getChildFrame('#email', index).val();
                               
                               	var zmReg=/^[a-zA-Z]*$/; 
                                var reg = /^[0-9]+$/;
                                var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
                                if(staff_id==sd&&name==namee&&introduction==inn&&tel==tl&&pwd==pd&&email==emaill)
                            	{
                            			alert("please enter  item different  from befroe")
                            	}else if(name.length==0)
								{
									alert("please enter your name!");
								}else if(name!=""&&!zmReg.test(name)){ 
								alert("please enter words for name"); 
								}else if(staff_id.length<6||staff_id.length>13){
									alert("please enter staff id for 6 - 13 words"); 
								}else if(tel!=""&&!reg.test(tel)){ 
									alert('please enter number for telnumber'); 
								}else if(pwd.length<6||pwd.length>11)
								{
									alert("please enter password for 6 - 11 words");
								}else if(!myreg.test(email))
								{
								alert('please enter right email！');
								}else {
                                $.ajax({
                                    url: "<?php echo U('Index/updateStaff');?>",
                                    type: "post",
                                    contentType: "application/x-www-form-urlencoded;charset=utf-8",
                                    data: {
                                    	staffIdOld : sd,
                                        staff_id: staff_id,
                                        name: name,
                                        // work_years: work_years,
                                        introduction: introduction,
                                        tel: tel,
                                        pwd:pwd,
                                        email:email,
                                    },
                                    dataType: "json",
                                    success: function (data) {
                                    	$.ajax({
												url: "<?php echo U('Index/getStaff');?>",
												dataType: "json",
												success: function (data) {
													if (data.code == 'success') {

														//将json字符串转为json对象
														var jsonStr = data.data
														
														//去掉字符串中的空格
														jsonStr = jsonStr.replace(" ", "");
														//layer.msg(data.msg)
														//typeof https://www.cnblogs.com/liu-fei-fei/p/7715870.html
														if (typeof jsonStr != 'object') {
															//去掉饭斜杠


															jsonStr = jsonStr.replace(/\ufeff/g, "")
															var jsonObj = JSON.parse(jsonStr)
															that.stafflist = jsonObj
															that.inputlist = that.stafflist
														}
													}
													if (data.code == 'fail') {
														layer.msg(data.msg)
													}
												}
											})
                                    	layer.close(layer.index)
                                        if (data.code == 'success') {
                                            layer.msg("success")
                                        }
                                        if (data.code == 'fail') {
                                            layer.close(layer.index)
                                            layer.msg("fail")
                                        }
                                    }
                                })
                            }


                            })
                        }
                    })
                },
				removeStaff: function (index) {
					var that = this
					var staff_id = that.stafflist[index].staff_id
					$.ajax({
						url: "<?php echo U('Index/removeStaff');?>",
						type: "post",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						data: {
							staff_id: staff_id
						},
						dataType: "json",
						success: function (data) {
							if (data.code == 'success') {
								$("tr#" + index).hide()
								layer.msg("success")
							}
							if (data.code == 'fail') {
								layer.msg("fail")
							}
						}
					})
				},


				toUserInfo: function (event) {
					window.location.href = "<?php echo U('Index/info');?>";
				},
				searchStaff: function (event) {
                    var that = this
                    /*
                     * 这里是异步数据访问
                     */
                  
                     if(that.input !="")
                     {
                    $.ajax({
                        url: "<?php echo U('Index/searchStaff');?>",
                        type: "post",
                        contentType: "application/x-www-form-urlencoded;charset=utf-8",
                        data: {
                           input:that.input,
                           search:that.search

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
                                    that.searchlist = jsonObj
                                    that.inputlist = that.searchlist
                                }
                            }
                            if (data.code == 'fail') {
                            	that.inputlist = [];
                                layer.msg("the staff does not exist")
                            }
                        }
                    })
                   
                   
                }else{
                	that.inputlist = that.stafflist
                }

                },

			}
		})

        // var $button = document.querySelector('.button4');
        // $button.addEventListener('click', function() {
        //     var duration = 0.3,
        //         delay = 0.08;
        //     TweenMax.to($button, duration, {scaleY: 1.6, ease: Expo.easeOut});
        //     TweenMax.to($button, duration, {scaleX: 1.2, scaleY: 1, ease: Back.easeOut, easeParams: [3], delay: delay});
        //     TweenMax.to($button, duration * 1.25, {scaleX: 1, scaleY: 1, ease: Back.easeOut, easeParams: [6], delay: delay * 3 });
        // });
	</script>
    <script type="text/javascript" id="c_n_script"  src="/libSys/public/syspkg/js/canvas.js" color="240,230,140" opacity="0.5" zindex="-2" count="200"></script>
</body>

</html>