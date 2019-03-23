<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<!-- Qu Zhuohan -->

<head>
	<meta charset="utf-8">
	<!-- require  framework-->
	<script type="text/javascript" src="/libSys/public/syspkg/vue.js"></script>
	<script type="text/javascript" src="/libSys/public/syspkg/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="/libSys/public/syspkg/jquery-form.js"></script>
	<script type="text/javascript" src="/libSys/public/syspkg/layer/layer.js"></script>
	<script type="text/javascript" src="/libSys/public/syspkg/bootstrap3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/libSys/public/syspkg/bootstrap3.3.7/js/jsbarcode/JsBarcode.all.js"></script>
	<link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/bootstrap3.3.7/css/bootstrap.min.css">
	<!-- require user-defined -->
	<script type="text/javascript" src="/libSys/public/syspkg/js/jsonStrToObject.js"></script>
	<link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/css/home.css">
	<link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/css/librarian_head.css">
	<link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/css/librarian_home.css">
	<title>home</title>
</head>

<body class="body1" id="body1">
	<div class="mostlarge" id="mostlarge">
		<div id="head" class="head">
			<div class="tit">
				Bibliosoft Library Management System
			</div>
			<div class="libavatar" id="drop">
				<div class="user_head dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img_head"
					 src="/libSys/public/syspkg/images/librarian.jpg"></div>
				<div class="headusername">
					<h5 style="line-height:0px;">Welcome</h5>
					<h5 style="line-height:19px;white-space:pre;">{{user_name}}</h5>
				</div>
				<ul class="dropdown-menu" style="width: 100%">
					<!-- <li ><a href="javascript:void(0);" class="admin_ul_li_a" v-on:click="changePassword">change your password</a></li> -->
					<li><a href="javascript:void(0);" class="librarian_ul_li_a" v-on:click="quitSys">❎ Logout</a></li>
				</ul>
			</div>
		</div>
		<div class="top dropdown">
			<img src="/libSys/public/syspkg/images/logo.png" class="timg3">
			<div class="dropdown-content">
					<li style="list-style:none;" style="margin-top:30px;height:50px;font-size:17px;text-align:center;width:190px;">
						   <div style="margin-top:10px;"><img src="/libSys/public/syspkg/images/cont.png" style="width:110px;height:25px">
						   </div>
					   </li>
				<li style="list-style:none;" font-size=20px v-bind:class="{ active : isActive[0] }" v-on:click="active(0)" style="margin-top:30px;height:50px;font-size:17px;text-align:center;width:190px;"><a
					 href="javascript:void(0);">
						<div style="margin-top:5px;"><img src="/libSys/public/syspkg/images/bookmanag.png" style="width:180px;height:40px">
						</div>
					</a></li>

				<li style="list-style:none;" v-bind:class="{ active : isActive[1] }" v-on:click="active(1)" style="margin-top:10px;height:50px;font-size:17px;text-align:center;width:190px;"><a
					 href="javascript:void(0);">
						<div style="margin-top:5px;"><img src="/libSys/public/syspkg/images/borrow.png" style="width:180px;height:40px">
						</div>
					</a></li>

				<li style="list-style:none;" v-bind:class="{ active : isActive[2] }" v-on:click="active(2)" style="margin-top:10px;height:50px;font-size:17px;text-align:center;width:190px;"><a
					 href="javascript:void(0);">
						<div style="margin-top:5px;"><img src="/libSys/public/syspkg/images/return.png" style="width:180px;height:40px">
						</div>
					</a></li>

				<li style="list-style:none;" v-bind:class="{ active : isActive[3] }" v-on:click="active(3)" style="margin-top:10px;height:50px;font-size:17px;text-align:center;width:190px;">
					<a class="managlist" href="javascript:void(0);">
						<div style="margin-top:5px;"> <img src="/libSys/public/syspkg/images/lose.png" style="width:180px;height:40px"></div>
					</a>
				</li>
				<li style="list-style:none;" v-bind:class="{ active : isActive[4] }" v-on:click="active(4)" style="margin-top:10px;height:50px;font-size:17px;text-align:center;width:190px;"><a
					 href="javascript:void(0);">
						<div style="margin-top:5px;"><img src="/libSys/public/syspkg/images/reader.png" style="width:180px;height:40px">
						</div>
					</a></li>
				<li style="list-style:none;" v-bind:class="{ active : isActive[5] }" v-on:click="active(5)" style="margin-top:10px;height:50px;font-size:17px;text-align:center;width:190px;"><a
					 href="javascript:void(0);">
						<div style="margin-top:5px;"> <img src="/libSys/public/syspkg/images/borrecord.png" style="width:180px;height:40px">
						</div>
					</a></li>
				<li style="list-style:none;" v-bind:class="{ active : isActive[6] }" v-on:click="active(6)" style="margin-top:10px;height:50px;font-size:17px;text-align:center;width:190px;"><a
					 href="javascript:void(0);">
						<div style="margin-top:5px;"><img src="/libSys/public/syspkg/images/retrecord.png" style="width:180px;height:40px">
						</div>
					</a></li>
				<li style="list-style:none;" v-bind:class="{ active : isActive[7] }" v-on:click="active(7)" style="margin-top:10px;height:50px;font-size:17px;text-align:center;width:190px;"><a
					 href="javascript:void(0);">
						<div style="margin-top:5px;"> <img src="/libSys/public/syspkg/images/delete.png" style="width:180px;height:40px">
						</div>
					</a></li>
				<li style="list-style:none;" v-bind:class="{ active : isActive[8] }" v-on:click="active(8)" style="margin-top:10px;height:50px;font-size:17px;text-align:center;width:190px;"><a
					 href="javascript:void(0);">
						<div style="margin-top:5px;"> <img src="/libSys/public/syspkg/images/income.png" style="width:180px;height:40px">
						</div>
					</a></li>
				<li style="list-style:none;" v-bind:class="{ active : isActive[9] }" v-on:click="active(9)" style="margin-top:10px;height:50px;font-size:17px;text-align:center;width:190px;"><a
					 href="javascript:void(0);">
						<div style="margin-top:5px;"> <img src="/libSys/public/syspkg/images/notice.png" style="width:180px;height:40px">
						</div>
					</a></li>

				<li style="list-style:none;" v-bind:class="{ active : isActive[10] }" v-on:click="active(10)" style="margin-top:10px;height:50px;font-size:17px;text-align:center;width:190px;"><a
					 class="managlist" href="javascript:void(0);">
						<div style="margin-top:5px;"> <img src="/libSys/public/syspkg/images/cat.png" style="width:180px;height:40px">
						</div>
					</a></li>
				<li style="list-style:none;" v-bind:class="{ active : isActive[11] }" v-on:click="active(11)" style="margin-top:10px;height:50px;font-size:17px;text-align:center;width:190px;">
					<a class="managlist" href="javascript:void(0);">
						<div style="margin-top:5px;"> <img src="/libSys/public/syspkg/images/location.png" style="width:180px;height:40px"></div>
					</a>
				</li>

			</div>
		</div>

		<div class="home" id="home">
			<!-- 图书管理 -->
			<div v-bind:class="{ unshow : isShow[0] }" class="bookmanag">
				<div class="header" style="height:70px">
					 <div class="booklist">
						<h1>★Book Management</h1>
					</div>

					<div id="content-search" style="position: absolute;top:10%;left:400px;">
						<input id="input" type="text" name="inputbook" v-model="inputbook" style="position:relative;top:3px;width:300px;height:29px;">
						<button class="btnadd" style="position:relative;top:3px;left:20px;background-color:rgb(0, 0, 0);border:0px;border-radius: 5px"
						 v-on:click="searchBook">Search</button>
					</div>
					<div id="select" style="position: absolute;top:65%;left:380px;">
						<div class="radio-group">
							<span id="label1"><label><input type="radio" name="searchbook" value="title" v-model="searchbook" checked="checked">Title</label></span>
							<span id="label2"><label><input type="radio" name="searchbook" value="author" v-model="searchbook">Author</label></span>
							<span id="label3"><label><input type="radio" name="searchbook" value="isbn" v-model="searchbook">ISBN</label></span>
							<span id="label4"><label><input type="radio" name="searchbook" value="press" v-model="searchbook">Press</label></span>
							<span id="label5"><label><input type="radio" name="searchbook" value="category" v-model="searchbook">Category</label></span>
							<span id="label55"><label><input type="radio" name="searchbook" value="1" v-model="searchbook">Book ID</label></span>

						</div>
					</div>


					<div class="add">
						<button v-on:click="addBook" class="btnadd" style="margin-right:10px;">Add Book</button>
						<button v-on:click="deleteBook" class="btnadd">Delete Book</button>
					</div>
				</div>
				<div class="content">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>ISBN</th>
								<th style="width:300px;">Title</th>
								<th style="width:400px;">Author</th>
								<th style="width:200px;">Press</th>
								<th>Category</th>
								<th>PubDate</th>
								<th>Price</th>
								<th>Floor</th>
								<th>Bookshelf</th>
								<th>Area</th>
								<th>Number</th>
								<th>options</th>
							</tr>
						</thead>
						<tbody id="add">
							<tr v-for="(book,index) in booklist" v-bind:id='index'>
								<td>{{book.isbn}}</td>
								<td style="width:300px;"> <a href="javascript:void(0);" v-on:click="viewBookId(index)">{{book.title}}</a></td>
								<td style="width:400px;">{{book.author}}</td>
								<td style="width:200px;">{{book.press}}</td>
								<td>{{book.category}}</td>
								<td>{{book.pub_date}}</td>
								<td>{{book.price}}</td>
								<td>{{book.floor}}</td>
								<td>{{book.bookshelf}}</td>
								<td>{{book.area_code}}</td>
								<td> <a href="javascript:void(0);" v-on:click="changeNumber(index)">{{book.number}}</a></td>
								<td> <a href="javascript:void(0);" v-on:click="updateBook(index)"><img src="/libSys/public/syspkg/images/modify.png" style="width:20px;height:20px;"></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>






			<div v-bind:class="{ unshow : isShow[1] }" class="zhuce">

				<div class="block">
					<div class="line1">Borrow Book</div>
					<div class="line">
						<label>Card ID</label>
						<span><input class="in" type="text" name="cardId" v-model="cardId"></span>
					</div>
					<div class="line">
						<label>Book ID</label>
						<span><input class="in" type="text" name="borbookId" v-model="borbookId"></span>
					</div>



					<div class="line">
						<button class="btn" v-on:click="borrowBook">Borrow</button>
					</div>

				</div>


			</div>
			<!-- 还书处理 -->
			<div v-bind:class="{ unshow : isShow[2] }" class="zhuce">
				<div class="block">
					<div class="line1">Return Book</div>

					<div class="line">
						<label>BookId</label>
						<span><input class="in" type="text" name="retbookId" v-model="retbookId"></span>
					</div>
					<div class="line">
						<button class="btn" v-on:click="fine">Query</button>
					</div>
					<div class="line">

					</div>

					<div class="line">
						<label>Card ID</label>
						<span><input class="in" type="text" name="borUser" v-model="borUser" readonly="readonly"></span>
					</div>

					<div class="line">
						<label>Penal Sum</label>
						<span><input class="in" type="text" name="penalSum" v-model="penalSum" readonly="readonly"></span>
					</div>
					<!-- <div class="line">
						<button class="btn" v-on:click="backBook">Payed</button>
					</div> -->
					<div class="line">
						<label>Borrow Time</label>
						<span><input class="in" type="date" name="borTime" v-model="borTime" readonly="readonly"></span>
					</div>




					<div class="line">
						<button class="btn" v-on:click="backBook">Return</button>
					</div>

				</div>
			</div>
			<!-- 注册新用户 -->


			<div v-bind:class="{ unshow : isShow[3] }" class="zhuce">
				<div class="block">
					<div class="line1">Compensation</div>

					<div class="line">
						<label>BookId</label>
						<span><input class="in" type="text" name="paybookId" v-model="paybookId"></span>
					</div>
					<div class="line">
						<button class="btn" v-on:click="payBook">Query</button>
					</div>
					<div class="line">
					</div>
					<div class="line">
						<label>User ID</label>
						<span><input class="in" type="text" name="payborUser" v-model="payborUser" readonly="readonly"></span>
					</div>
					<div class="line">
						<label>Book Price</label>
						<span><input class="in" type="text" name="originsl" v-model="originsl" readonly="readonly"></span>
					</div>
					<div class="line">
						<label>Penal Sum</label>
						<span><input class="in" type="text" name="paySum" v-model="paySum" readonly="readonly"></span>
					</div>
					<div class="line">
						<label>Borrow Time</label>
						<span><input class="in" type="date" name="payborTime" v-model="payborTime" readonly="readonly"></span>
					</div>
					<div class="line">
						<button class="btn" v-on:click="Pay">Pay</button>
					</div>
				</div>
			</div>


			<div v-bind:class="{ unshow : isShow[4] }" class="bookmanag">
				<div class="header" style="height:70px">
					<div class="booklist">
						<h1>★Reader Management</h1>
					</div>

					<div id="content-search" style="position: absolute;top:10%;left:400px;">
						<input id="input" type="text" name="inputreader" v-model="inputreader" style="position:relative;top:3px;width:300px;height:29px;">
						<button class="btnadd" style="position:relative;top:3px;left:20px;background-color:rgb(0, 0, 0);border:0px;border-radius: 5px"
						 v-on:click="searchReader">Search</button>
					</div>
					<div id="selectuser" style="position: absolute;top:70%;left:405px;">
						<div class="radio-group">
							<span id="label6"><label><input type="radio" name="searchreader" value="user_id" v-model="searchreader" checked="checked">Account</label></span>
							<span id="label7"><label><input type="radio" name="searchreader" value="name" v-model="searchreader">Name</label></span>
							<span id="label8"><label><input type="radio" name="searchreader" value="card_id" v-model="searchreader">Card ID</label></span>
						</div>
					</div>


					<div class="add">
						<button v-on:click="addUser" class="btnadd" style="margin-right:0px; position:absolute;right:0px;">Add Reader</button>
						<!-- <button v-on:click="deleteReader" class="btnadd">Delete User</button> -->
					</div>
				</div>
				<div class="content">
					<table class="table table-striped" class="usertable">
						<thead>
							<tr>
								<th style="width:200px;">UserId</th>
								<th style="width:200px;">Name</th>
								<th style="width:200px;">Email</th>
								<th style="width:200px;">Address</th>
								<th style="width:200px;">Balance</th>
								<th style="width:200px;">RegisterTime</th>
								<th style="width:200px;">CardId</th>

								<th>options </th>
							</tr>
						</thead>
						<tbody id="add">
							<tr v-for="(user,index) in rederlist" v-bind:id='index'>
								<td>{{user.user_id}}</td>
								<td>{{user.name}}</td>
								<td>{{user.email}}</td>
								<td>{{user.address}}</td>
								<td>{{user.balance}}</td>
								<td>{{user.register_time}}</td>
								<td>{{user.card_id}}</td>

								<td><a href="javascript:void(0);" v-on:click="updateUser(index)"><img src="/libSys/public/syspkg/images/modify.png" style="width:20px;height:20px;"></a> <a href="javascript:void(0);"
									 v-on:click="removeUser(index)"><img src="/libSys/public/syspkg/images/deleteico.png" style="width:20px;height:20px;"></a></td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>

			<div v-bind:class="{ unshow : isShow[5] }" class="bookmanag">
				<div class="header" style="height:70px">
					<div class="booklist">
						<h1>★Borrowing Record</h1>
					</div>
					<div id="content-search" style="position:relative;top:10%;left:400px;">
						<input id="input" type="text" name="inputborrow" v-model="inputborrow" style="position:relative;top:3px;width:300px;height:29px;">
						<button class="btnadd" style="position:relative;top:3px;left:20px;background-color:rgb(0, 0, 0);border:0px;border-radius: 5px"
						 v-on:click="searchBorrowing">Search</button>
					</div>
					<div id="selectborrow" style="position:relative;top:20%;left:405px;">
						<div class="radio-group">
							<span id="label9"><label><input type="radio" name="searchborrow" value="user_id" v-model="searchborrow" checked="checked">Account</label></span>
							<span id="label10"><label><input type="radio" name="searchborrow" value="card_id" v-model="searchborrow">Card ID</label></span>
							<span id="label101"><label><input type="radio" name="searchborrow" value="book_id" v-model="searchborrow">Book ID</label></span>
						</div>
					</div>

				</div>
				<div class="content">
					<table class="table table-striped">
						<thead>
							<tr>
								<th style="width:100px;">Name</th>
								<th style="width:150px;">User ID</th>
								<th style="width:150px;">Card ID</th>
								<th style="width:200px;">Book Title</th>
								<th style="width:200px;">Book ID</th>
								<th style="width:200px;">Borrow Date</th>
								<th style="width:200px;">Borrow Length</th>
								<th style="width:200px;">Current Cost</th>
								<th style="width:200px;">Operator</th>
							</tr>
						</thead>
						<tbody id="borrowlist">
							<tr v-for="(book,index) in borrowlist" v-bind:id='index'>
								<td>{{book.name}}</td>
								<td>{{book.user_id}}</td>
								<td>{{book.card_id}}</td>
								<td>{{book.title}}</td>
								<td>{{book.book_id}}</td>
								<td>{{book.bor_time}}</td>
								<td>{{book.bor_length}}</td>
								<td>{{book.cost}}</td>
								<td>{{book.staff_id}}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div v-bind:class="{ unshow : isShow[6] }" class="bookmanag">
				<div class="header" style="height:70px;">
					<div class="booklist">
						<h1>★Return Record</h1>
					</div>
					<div id="content-search" style="position:relative;top:10%;left:400px;">
						<input id="input" type="text" name="inputreturn" v-model="inputreturn" style="position:relative;top:3px;width:300px;height:29px;">
						<button class="btnadd" style="position:relative;top:3px;left:20px;background-color:rgb(0, 0, 0);border:0px;border-radius: 5px"
						 v-on:click="searchReturn">Search</button>
					</div>
					<div id="selectreturn" style="position:relative;top:20%;left:405px;">
						<div class="radio-group">
							<span id="label11"><label><input type="radio" name="searchreturn" value="user_id" v-model="searchreturn" checked="checked">Account</label></span>
							<span id="label12"><label><input type="radio" name="searchreturn" value="card_id" v-model="searchreturn">Card ID</label></span>
							<span id="label121"><label><input type="radio" name="searchreturn" value="book_id" v-model="searchreturn">Book ID</label></span>
						</div>
					</div>

				</div>
				<div class="content">
					<table class="table table-striped">
						<thead>
							<tr>
								<th style="width:100px;">Name</th>
								<th style="width:150px;">User ID</th>
								<th style="width:150px;">Card ID</th>
								<th style="width:200px;">Book Title</th>
								<th style="width:200px;">Book ID</th>
								<th style="width:200px;">Borrow Date</th>
								<th style="width:200px;">Return Date</th>
								<th style="width:200px;">Fine</th>
								<th style="width:200px;">Operator</th>
							</tr>
						</thead>
						<tbody id="returnlist">
							<tr v-for="(book,index) in returnlist" v-bind:id='index'>
								<td>{{book.name}}</td>
								<td>{{book.user_id}}</td>
								<td>{{book.card_id}}</td>
								<td>{{book.title}}</td>
								<td>{{book.book_id}}</td>
								<td>{{book.bor_time}}</td>
								<td>{{book.ret_time}}</td>
								<td>{{book.fine}}</td>
								<td>{{book.staff_id}}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>


			<div v-bind:class="{ unshow : isShow[7] }" class="bookmanag">
				<div class="header">
					<div class="booklist">
						<h1>★Delete History</h1>
					</div>

				</div>
				<div class="content">
					<table class="table  table-striped">
						<thead>
							<tr>
								<th style="width:250px;">Book Name</th>
								<th style="width:250px;">Book ID</th>
								<th style="width:250px;">Delete Reason</th>
								<th style="width:250px;">Delete Time</th>
								<th style="width:250px;">Operator</th>
							</tr>
						</thead>
						<tbody id="returnlist">
							<tr v-for="(book,index) in deletelist" v-bind:id='index'>
								<td>{{book.title}}</td>
								<td>{{book.book_id}}</td>
								<td>{{book.reason}}</td>
								<td>{{book.remove_time}}</td>
								<td>{{book.staff_id}}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div v-bind:class="{ unshow : isShow[8] }" class="bookmanag" style="margin-top:0px;padding-top:0px;border-top:0px;">
				<div style="width:400px;float:left;margin-top:0px;padding-top:0px;border-top:0px;position: absolute;top:-20px;">
					<div class="header" style="padding-top:0px">
						<!-- <div class="incomelist"> -->
							<h1>★Daily Income</h1>

						<!-- <div class="add">
					<button v-on:click="addBook" class="btnadd">Add Book</button>
				</div> -->
					</div>
					<div class="content" style="width:100%;">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Date</th>
									<th>Fine</th>
									<th>Deposit</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody id="returnlist">
								<tr v-for="(book,index) in dayincomelist" v-bind:id='index'>
									<td>{{book.date}}</td>
									<td>{{book.fine}}</td>
									<td>{{book.security_deposit}}</td>
									<td>{{book.total}}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>



				<div style="width:400px;float:left;margin-left:20px;position: absolute;left:425px;top:-20px;">
					<div class="header">
						<div class="incomelist">
							<h1>★Weekly Income</h1>
						</div>
						<!-- <div class="add">
					<button v-on:click="addBook" class="btnadd">Add Book</button>
				</div> -->
					</div>
					<div class="content" style="width:100%;">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Date</th>
									<th>Fine</th>
									<th>Deposit</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody id="returnlist">
								<tr v-for="(book,index) in weekincomelist" v-bind:id='index'>
									<td>{{book.date}}</td>
									<td>{{book.fine}}</td>
									<td>{{book.deposit}}</td>
									<td>{{book.total}}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div style="width:400px;float:left;margin-left:20px;position: absolute;left:875px;top:-20px;">

					<div class="header">
						<div class="incomelist">
							<h1>★Monthly Income</h1>
						</div>
						<!-- <div class="add">
					<button v-on:click="addBook" class="btnadd">Add Book</button>
				</div> -->
					</div>
					<div class="content" style="width:100%;">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Date</th>
									<th>Fine</th>
									<th>Deposit</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody id="returnlist">
								<tr v-for="(book,index) in monthincomelist" v-bind:id='index'>
									<td>{{book.date}}</td>
									<td>{{book.fine}}</td>
									<td>{{book.deposit}}</td>
									<td>{{book.total}}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>


			<div v-bind:class="{ unshow : isShow[9] }" class="bookmanag">
				<div class="header">
					<div class="noticelist">
						<h1 style="display:inline;">★Notice Management</h1>

						<button v-on:click="addNotice" class="btnadd" style="position:relative;top:3px;left:600px;">Add Notice</button>

					</div>

				</div>
				<div class="content">
					<table class="table table-striped">
						<thead>
							<tr>
								<th style="width:250px">Release Time</th>
								<th style="width:250px">Notice Title</th>
								<th style="width:250px">Notice Body</th>
								<th style="width:250px">Notice ID</th>
								<th style="width:250px">Operator</th>
								<th style="width:250px">options</th>
							</tr>
						</thead>
						<tbody id="noticelist">
							<tr v-for="(book,index) in noticelist" v-bind:id='index'>
								<td>{{book.release_time}}</td>
								<td>{{book.notice_title}}</td>
								<td>{{book.notice_body}}</td>
								<td>{{book.notice_id}}</td>
								<td>{{book.staff_id}}</td>
								<td>
									<a href="javascript:void(0);" v-on:click="updateNotice(index)"><img src="/libSys/public/syspkg/images/modify.png" style="width:20px;height:20px;"></a>
									<a href="javascript:void(0);" v-on:click="deleteNotice(index)"><img src="/libSys/public/syspkg/images/deleteico.png" style="width:20px;height:20px;"></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<!-- 
			<div v-bind:class="{ unshow : isShow[8] }" class="noticemanag">
				<div class="header">
					<div class="noticelist">
						<h1 style="font-family:serif">Recently Added</h1>
					</div>
					<div class="add">
						<button v-on:click="addNotice" class="btnadd">Add Book</button>
						<button v-on:click="deleteBook" class="btnadd">Delete Book</button>
					</div>
				</div>
				<div class="content">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>ISBN</th>
								<th>Title</th>
								<th>Author</th>
								<th>Press</th>
								<th>Category</th>
								<th>PubDate</th>
								<th>Price</th>
								<th>Floor</th>
								<th>Bookshelf</th>
								<th>Area Code</th>
								<th>Number</th>
								<th>options</th>
							</tr>
						</thead>
						<tbody id="add">
							<tr v-for="(book,index) in booklist" v-bind:id='index'>
								<td>{{book.isbn}}</td>
								<td>{{book.title}}</td>
								<td>{{book.author}}</td>
								<td>{{book.press}}</td>
								<td>{{book.category}}</td>
								<td>{{book.pub_date}}</td>
								<td>{{book.price}}</td>
								<td>{{book.floor}}</td>
								<td>{{book.bookshelf}}</td>
								<td>{{book.area_code}}</td>
								<td>{{book.number}}</td>
								<td> <a href="javascript:void(0);" v-on:click="updateBook(index)">modify</a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div> -->


			<div v-bind:class="{ unshow : isShow[10] }" class="bookmanag">
				<div class="header">
					<div class="booklist">
						<h1>★Category Management</h1>

					</div>
					<div style="position: relative;top: 10px;left:800px;width: 200px;height: 50px;">
						<input style="height:30px;" type="text" id="addcategory" name="addcategory" v-model="addcategory" placeholder="new category">
					</div>
					<div style="position: relative;top: -30px;left:800px;width: 0px;height: 30px;">
						<button v-on:click="addCategory" class="btnadd">Add Category</button>

					</div>
				</div>
				<div class="content">
					<table class="table table-striped">
						<thead>
							<tr>
								<th  style="width:300px">BookCategory</th>
								<th style="width:300px">AddDate</th>
								<th style="width:300px">staffId</th>
								<th style="width:300px">options</th>
							</tr>
						</thead>
						<tbody id="add">
							<tr v-for="(category,index) in categorylist" v-bind:id='index'>
								<td>{{category.category}}</td>
								<td>{{category.add_date}}</td>
								<td>{{category.staff_id}}</td>
								<td>
									<a href="javascript:void(0);" v-on:click="updateCategory(index)"><img src="/libSys/public/syspkg/images/modify.png" style="width:20px;height:20px;"></a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div v-bind:class="{ unshow : isShow[11] }" class="bookmanag">
				<div class="header">
					<div class="booklist">
						<h1>★Location Management</h1>
					</div>
				</div>
				<div class="content">
					<table class="table table-striped">
						<thead>
							<tr>
								<th style="width:250px">Floor</th>
								<th style="width:250px">Bookshelf</th>
								<th style="width:250px">AddDate</th>
								<th style="width:250px">staffId</th>
								<th style="width:250px">options</th>
							</tr>
						</thead>
						<tbody id="add">
							<tr v-for="(location,index) in locationlist" v-bind:id='index'>
								<td>{{location.floor}}</td>
								<td>{{location.bookshelf}}</td>
								<td>{{location.add_date}}</td>
								<td>{{location.staff_id}}</td>
								<td>
									<a href="javascript:void(0);" v-on:click="updatelocation(index)"><img src="/libSys/public/syspkg/images/modify.png" style="width:20px;height:20px;"></a>
									
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			


		</div>


	</div>






	<!-- vue写到body结束标签的前面，因为vue需要挂载dom，所以必须写到dom结构的后面，vue用来做数据绑定，可以绑定数据、事件、dom属性等功能强大，异步数据访问用jquery ajax来做，路由由tp框架做，可以保证我们的项目是处于一个统一的路由下 -->
	<script type="text/javascript">

		function getNowFormatDate() {
			var date = new Date();
			var seperator1 = "-";
			var year = date.getFullYear();
			var month = date.getMonth() + 1;
			var strDate = date.getDate();
			if (month >= 1 && month <= 9) {
				month = "0" + month;
			}
			if (strDate >= 0 && strDate <= 9) {
				strDate = "0" + strDate;
			}
			var currentdate = year + seperator1 + month + seperator1 + strDate;
			return currentdate;
		}

		/*vue*/
		var app = new Vue({
			el: '#mostlarge',
			data: {
				user_name: "Name",
				introduction: "introduction",
				tel: "tel",
				staffId: "staffId",
				balance: "balance",
				account: "",
				password: "",
				email: "",
				booklist: [],
				categorylist: [],
				locationlist: [],
				borrowlist: [],
				returnlist: [],
				rederlist: [],
				deletelist: [],
				noticelist: [],
				dayincomelist: [],
				weekincomelist: [],
				monthincomelist: [],
				bookquelist: [],
				text: "",
				borTime: "",
				penalSum: "",
				borUser: "",
				//jiahui
				payborTime: "",
				payborUser: "",
				paySum: "",
				originsl: "",

				retTime: "",
				borbookId: "",
				isActive: [
					true, false, false, false, false, false, false, false, false, false, false, false
				],
				isShow: [
					false, true, true, true, true, true, true, true, true, true, true, true
				],
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


				$.ajax({
					url: "<?php echo U('Index/incomeDay');?>",
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
								that.dayincomelist = jsonObj
							}
						}
						if (data.code == 'fail') {
							layer.msg(data.msg)
						}
					}
				})


				$.ajax({
					url: "<?php echo U('Index/incomeWeek');?>",
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
								that.weekincomelist = jsonObj
							}
						}
						if (data.code == 'fail') {
							layer.msg(data.msg)
						}
					}
				})


				$.ajax({
					url: "<?php echo U('Index/incomeMonth');?>",
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
								that.monthincomelist = jsonObj
							}
						}
						if (data.code == 'fail') {
							layer.msg(data.msg)
						}
					}
				})


				$.ajax({
					url: "<?php echo U('Index/getBorrowList');?>",
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
								that.borrowlist = jsonObj
							}
						}
						if (data.code == 'fail') {
							layer.msg(data.msg)
						}
					}
				})

				$.ajax({
					url: "<?php echo U('Index/getUser');?>",
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
								that.rederlist = jsonObj
							}
						}
						if (data.code == 'fail') {
							layer.msg(data.msg)
						}
					}
				})


				$.ajax({
					url: "<?php echo U('Index/getNotice');?>",
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
								that.noticelist = jsonObj
							}
						}
						if (data.code == 'fail') {
							layer.msg(data.msg)
						}
					}
				})


				$.ajax({
					url: "<?php echo U('Index/getBalance');?>",
					type: "post",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
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
								that.balance = jsonObj[0].security_deposit

							}
						}
						if (data.code == 'fail') {
							layer.msg(data.msg)
						}
					}
				})

				$.ajax({
					url: "<?php echo U('Index/getReturnList');?>",
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
								that.returnlist = jsonObj
							}
						}
						if (data.code == 'fail') {
							layer.msg(data.msg)
						}
					}
				})




				$.ajax({
					url: "<?php echo U('Index/getDeleteList');?>",
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
								that.deletelist = jsonObj
							}
						}
						if (data.code == 'fail') {
							layer.msg(data.msg)
						}
					}
				})


				$.ajax({
					url: "<?php echo U('Index/getInfo');?>",
					type: "post",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
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
								that.user_name = jsonObj[0].name
								that.introduction = jsonObj[0].introduction
								that.tel = jsonObj[0].tel
								that.staffId = jsonObj[0].staff_id
							}
						}
						if (data.code == 'fail') {
							layer.msg(data.msg)
						}
					}
				})

				$.ajax({
					url: "<?php echo U('Index/getDate');?>",
					type: "post",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					dataType: "json",
					success: function (data) {
						if (data.code == 'success') {
							//将json字符串转为json对象
							var jsonStr = data.data
							that.retTime = jsonStr
							that.borTime = jsonStr
						}
						if (data.code == 'fail') {
							layer.msg(data.msg)
						}
					}
				})

				//书籍类别列表
				$.ajax({
					url: "<?php echo U('Index/getCategoryList');?>",
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
								that.categorylist = jsonObj
								sessionStorage.setItem('categorylist', data.categorylist);
							}
						}
						if (data.code == 'fail') {
							layer.msg(data.msg)
						}
					}
				})

				//位置，书架列表
				$.ajax({
					url: "<?php echo U('Index/getLocationList');?>",
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
								that.locationlist = jsonObj
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

					for (var i = 0; i < 12; i++) {
						this.isActive.splice(i, 1, false)
						this.isShow.splice(i, 1, true)
						// this.isActive.$set(i,false)
						// this.isShow.$set(i,true)
					}
					this.isActive.splice(index, 1, true)
					this.isShow.splice(index, 1, false)
					// this.isActive.$set(index,true)
					// this.isShow.$set(index,false)

				},
				addUser: function (event) {
					var that = this
					var balance = that.balance
					layer.open({
						type: 2,
						title: 'Register New Reader',
						shadeClose: true,
						shade: 0.8,
						area: ['480px', '630px'],
						content: "<?php echo U('Index/adduuser');?>",//iframe的url
						success: function (layero, index) {
							layer.getChildFrame('#balance', index).val(balance);
							var submit = layer.getChildFrame('#submit', index);
							submit.click(function () {
								var userid = layer.getChildFrame('#account', index).val();
								var password = layer.getChildFrame('#password', index).val();
								var name = layer.getChildFrame('#name', index).val();
								var email = layer.getChildFrame('#email', index).val();
								var balance = layer.getChildFrame('#balance', index).val();
								var card_id = layer.getChildFrame('#card_id', index).val();
								var address = layer.getChildFrame('#address', index).val();


								$.ajax({
									url: "<?php echo U('Index/addUser');?>",
									type: "post",
									contentType: "application/x-www-form-urlencoded;charset=utf-8",
									data: {
										userid: userid,
										password: password,
										email: email,
										balance: balance,
										cardid: card_id,
										address: address,
										uname: name
									},
									dataType: "json",
									success: function (data) {

										if (data.code == 'success') {

											layer.close(layer.index)

											//将json字符串转为json对象
											var arr = [
												{
													user_id: userid,
													password: password,
													email: email,
													balance: balance,
													card_id: card_id,
													address: address,
													register_time: getNowFormatDate(),
													name: name
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
												that.rederlist.unshift(jsonObj[0])

											}
											layer.msg(data.msg)
										}
										if (data.code == 'fail') {
											//layer.close(layer.index)
											layer.msg(data.msg)
										}
									}
								})
							})
						}

					})





				},






				addBook: function (event) {
					var that = this


					$.ajax({
						url: "<?php echo U('Index/getCategoryList');?>",
						type: "post",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						dataType: "json",
						success: function (data) {
							// alert("successs")
							if (data.code == 'success') {
								// layer.msg(data.cat)
								sessionStorage.setItem('categlist', data.cat);

								layer.open({
									type: 2,
									title: 'Add Book',
									shadeClose: true,
									shade: 0.8,
									area: ['480px', '630px'],
									content: "<?php echo U('Index/add');?>",//iframe的url
									success: function (layero, index) {
										var query = layer.getChildFrame('#query', index);
										query.click(function () {

											var ISBN = layer.getChildFrame('#ISBN', index).val();
											$.ajax({
												url: "<?php echo U('Index/getBookInfo');?>",
												type: "post",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												data: {
													ISBN: ISBN
												},
												dataType: "json",
												success: function (data) {

													if (data.code == 'success') {

														//将json字符串转为json对象
														var bookqu = data.data
														//去掉字符串中的空格


														layer.getChildFrame('#title', index).val(bookqu["title"]);
														layer.getChildFrame('#author', index).val(bookqu["author"]);
														layer.getChildFrame('#press', index).val(bookqu["publisher"]);

														layer.getChildFrame('#pub_date', index).val(bookqu["pubdate"]);
														layer.getChildFrame('#price', index).val(bookqu["price"]);




														layer.msg(data.msg)

													}
													if (data.code == 'fail') {

														layer.msg(data.msg)
													}
												}
											})
										})
										var submit = layer.getChildFrame('#submit', index);
										submit.click(function () {

											var ISBN = layer.getChildFrame('#ISBN', index).val();
											var title = layer.getChildFrame('#title', index).val();
											var author = layer.getChildFrame('#author', index).val();
											var press = layer.getChildFrame('#press', index).val();
											var category = layer.getChildFrame('#category', index).val();
											var pub_date = layer.getChildFrame('#pub_date', index).val();
											var price = layer.getChildFrame('#price', index).val();
											var floor = parseInt(layer.getChildFrame('#floor', index).val())+1;
											var bookshelf = layer.getChildFrame('#bookshelf', index).val();
											var area_code = layer.getChildFrame('#area_code', index).val();
											var number = layer.getChildFrame('#number', index).val();

											//alert(press)
											$.ajax({
												url: "<?php echo U('Index/addBook');?>",
												type: "post",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												data: {
													ISBN: ISBN,
													title: title,
													author: author,
													press: press,
													category: category,
													pub_date: pub_date,
													price: price,
													floor: floor,
													bookshelf: bookshelf,
													area_code: area_code,
													number: number,
												},
												dataType: "json",
												success: function (data) {
													// alert("successs")
													if (data.code == 'success') {

														layer.close(layer.index)

														//将json字符串转为json对象
														var arr = [
															{
																isbn: ISBN,
																title: title,
																author: author,
																press: press,
																category: category,
																pub_date: pub_date,
																price: price,
																floor: floor,
																bookshelf: bookshelf,
																area_code: area_code,
																number: number,
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
														sessionStorage.setItem('idlist', data.newbookid);
														//window.open("<?php echo U('Index/barcode');?>");
														layer.open({
															type: 2,
															title: 'Bar Code',
															shadeClose: true,
															shade: 0.8,
															area: ['250px', '630px'],
															content: "<?php echo U('Index/barcode');?>",//iframe的url
															success: function (layero, index) {
																var ok = layer.getChildFrame('#ok', index);
																ok.click(function () {
																	layer.close(layer.index);

																})
															}
														})
													}
													if (data.code == 'fail') {
														layer.close(layer.index)
														layer.msg(data.msg)
													}
												},
												// complete: function () {
												// 	alert("complete")
												// }
											})
										})
									}

								})




							}
							if (data.code == 'fail') {

								layer.msg(data.msg)
							}
						},
						// complete: function () {
						// 	alert("complete")
						// }
					})








				},

				viewBookId: function (index) {
					var that = this
					var isbn13 = that.booklist[index].isbn
					var biaoti = that.booklist[index].title
					var zuozhe = that.booklist[index].author
					var pas = that.booklist[index].press
					var kate = that.booklist[index].category
					var chuban = that.booklist[index].pub_date
					var jiage = that.booklist[index].price
					var louceng = that.booklist[index].floor
					var shujia = that.booklist[index].bookshelf
					var quhao = that.booklist[index].area_code
					var shuliang = that.booklist[index].number

					$.ajax({
						url: "<?php echo U('Index/viewBookId');?>",
						type: "post",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						data: {
							ISBN: isbn13,
						},
						dataType: "json",
						success: function (data) {
							// alert("successs")
							if (data.code == 'success') {
								//layer.msg(data.msg)
								sessionStorage.setItem('viewidlist', data.data);
								//window.open("<?php echo U('Index/barcode');?>");
								layer.open({
									type: 2,
									title: 'Book ID',
									shadeClose: true,
									shade: 0.8,
									area: ['480px', '630px'],
									content: "<?php echo U('Index/viewbarcode');?>",//iframe的url
									success: function (layero, indexs) {
										layer.getChildFrame('#isbn', indexs).val(isbn13)
										layer.getChildFrame('#title', indexs).val(biaoti);
										layer.getChildFrame('#price', indexs).val(jiage);
										layer.getChildFrame('#floor', indexs).val(louceng);
										layer.getChildFrame('#bookshelf', indexs).val(shujia);
										layer.getChildFrame('#area_code', indexs).val(quhao);
										layer.getChildFrame('#number', indexs).val(shuliang);
										var ok = layer.getChildFrame('#ok', indexs);
										ok.click(function () {
											layer.close(layer.indexs);

										})
									}
								})
								//layer.msg(data.msg)
							}
							if (data.code == 'fail') {
								layer.close(layer.index)
								//layer.msg(data.msg)
							}
						},
						// complete: function () {
						// 	alert("complete")
						// }
					})





				},



				changeNumber: function (index) {
					var that = this
					var isbn13 = that.booklist[index].isbn
					var biaoti = that.booklist[index].title
					var zuozhe = that.booklist[index].author
					var pas = that.booklist[index].press
					var kate = that.booklist[index].category
					var chuban = that.booklist[index].pub_date
					var jiage = that.booklist[index].price
					var louceng = that.booklist[index].floor
					var shujia = that.booklist[index].bookshelf
					var quhao = that.booklist[index].area_code
					var shuliang = that.booklist[index].number


					layer.open({
						type: 2,
						title: 'Add New Copies',
						shadeClose: true,
						shade: 0.8,
						area: ['480px', '630px'],
						content: "<?php echo U('Index/changenumber');?>",//iframe的url
						success: function (layero, index) {
							layer.getChildFrame('#ISBN', index).val(isbn13);
							layer.getChildFrame('#title', index).val(biaoti);
							layer.getChildFrame('#author', index).val(zuozhe);
							layer.getChildFrame('#press', index).val(pas);
							layer.getChildFrame('#category', index).val(kate);
							layer.getChildFrame('#pub_date', index).val(chuban);
							layer.getChildFrame('#price', index).val(jiage);
							layer.getChildFrame('#floor', index).val(louceng);
							layer.getChildFrame('#bookshelf', index).val(shujia);
							layer.getChildFrame('#area_code', index).val(quhao);

							var submit = layer.getChildFrame('#submit', index);
							submit.click(function () {
								var newnumber = layer.getChildFrame('#number', index).val();


								$.ajax({
									url: "<?php echo U('Index/changeBookNumber');?>",
									type: "post",
									contentType: "application/x-www-form-urlencoded;charset=utf-8",
									data: {
										isbn : isbn13,
										number : newnumber,
									},
									dataType: "json",
									success: function (data) {

										if (data.code == 'success') {

											layer.close(layer.index)
											that.booklist[index].number = parseInt(that.booklist[index].number) + parseInt(newnumber)

											
											layer.msg(data.msg)
										}
										if (data.code == 'fail') {
											//layer.close(layer.index)
											layer.msg(data.msg)
										}
									}
								})
							})
						}

					})








				},



				deleteBook: function (event) {
					var that = this
					layer.open({
						type: 2,
						title: 'Delete Book',
						shadeClose: true,
						shade: 0.8,
						area: ['480px', '200px'],
						content: "<?php echo U('Index/delete');?>",//iframe的url
						success: function (layero, index) {
							var submit = layer.getChildFrame('#submit', index);
							submit.click(function () {
								var book_id = layer.getChildFrame('#book_id', index).val();
								var reason = layer.getChildFrame('#reason', index).val();


								$.ajax({
									url: "<?php echo U('Index/deleteBook');?>",
									type: "post",
									contentType: "application/x-www-form-urlencoded;charset=utf-8",
									data: {
										book_id: book_id,
										reason: reason,
									},
									dataType: "json",
									success: function (data) {

										if (data.code == 'success') {

											layer.close(layer.index)
											layer.msg(data.msg)
											window.location.href = "<?php echo U('Index/home');?>";
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



				updateBook: function (index) {
					var that = this
					var isbn = that.booklist[index].isbn
					var indexs = index

					var biaoti = that.booklist[index].title
					var zuozhe = that.booklist[index].author
					var pas = that.booklist[index].press
					var kate = that.booklist[index].category
					var chuban = that.booklist[index].pub_date
					var jiage = that.booklist[index].price
					var louceng = that.booklist[index].floor
					var shujia = that.booklist[index].bookshelf
					var quhao = that.booklist[index].area_code
					layer.open({
						type: 2,
						title: 'Update Book',
						shadeClose: true,
						shade: 0.8,
						area: ['480px', '570px'],
						content: "<?php echo U('Index/update');?>",//iframe的url
						success: function (layero, index) {
							layer.getChildFrame('#title', index).val(biaoti);
							layer.getChildFrame('#author', index).val(zuozhe);
							layer.getChildFrame('#press', index).val(pas);
							layer.getChildFrame('#category', index).val(kate);
							layer.getChildFrame('#pub_date', index).val(chuban);
							layer.getChildFrame('#price', index).val(jiage);
							layer.getChildFrame('#floor', index).val(louceng);
							layer.getChildFrame('#bookshelf', index).val(shujia);
							layer.getChildFrame('#area_code', index).val(quhao);
							var submit = layer.getChildFrame('#modify', index);
							submit.click(function () {
								var title = layer.getChildFrame('#title', index).val();
								var author = layer.getChildFrame('#author', index).val();
								var press = layer.getChildFrame('#press', index).val();
								var category = layer.getChildFrame('#category', index).val();
								var pub_date = layer.getChildFrame('#pub_date', index).val();
								var price = layer.getChildFrame('#price', index).val();
								var floor = layer.getChildFrame('#floor', index).val();
								var bookshelf = layer.getChildFrame('#bookshelf', index).val();
								var area_code = layer.getChildFrame('#area_code', index).val();


								$.ajax({
									url: "<?php echo U('Index/updateBook');?>",
									type: "post",
									contentType: "application/x-www-form-urlencoded;charset=utf-8",
									data: {
										ISBN: isbn,
										title: title,
										author: author,
										press: press,
										category: category,
										pub_date: pub_date,
										price: price,
										floor: floor,
										bookshelf: bookshelf,
										area_code: area_code,
									},
									dataType: "json",
									success: function (data) {

										if (data.code == 'success') {

											// layer.close(layer.index)
											// //将json字符串转为json对象
											// var arr = [
											// 	{
											// 		isbn: ISBN,
											// 		title: title,
											// 		author: author,
											// 		press: press,
											// 		category: category,
											// 		pub_date: pub_date,
											// 		price: price,
											// 		floor: floor,
											// 		bookshelf: bookshelf,
											// 		area_code: area_code,
											// 		number: number,
											// 	}
											// ]
											// var jsonStr = JSON.stringify(arr)

											// //去掉字符串中的空格
											// jsonStr = jsonStr.replace(" ", "");
											// //typeof https://www.cnblogs.com/liu-fei-fei/p/7715870.html
											// if (typeof jsonStr != 'object') {
											// 	//去掉饭斜杠
											// 	jsonStr = jsonStr.replace(/\ufeff/g, "")
											// 	var jsonObj = JSON.parse(jsonStr)
											// 	that.booklist.unshift(jsonObj[0])

											// }
											layer.close(layer.index)
											layer.msg(data.msg)
											that.booklist[indexs].title = title
											that.booklist[indexs].author = author
											that.booklist[indexs].press = press
											that.booklist[indexs].category = category
											that.booklist[indexs].pub_date = pub_date
											that.booklist[indexs].price = price
											that.booklist[indexs].floor = floor
											that.booklist[indexs].bookshelf = bookshelf
											that.booklist[indexs].area_code = area_code



											// window.location.href="<?php echo U('Index/home');?>"; 
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


				//////////////////////////////////////////////
				/*
				updateBook: function (index) {
									var that = this
									var isbn = that.booklist[index].isbn
				
									//史仔添加
									var biaoti = that.booklist[index].title
									var zuozhe = that.booklist[index].author
									var pas = that.booklist[index].press
									var kate = that.booklist[index].category
									var chuban = that.booklist[index].pub_date
									var jiage = that.booklist[index].price
									var louceng = that.booklist[index].floor
									var shujia = that.booklist[index].bookshelf
									var quhao = that.booklist[index].area_code
				
				
									layer.open({
										type: 2,
										title: 'update',
										shadeClose: true,
										shade: 0.8,
										area: ['480px', '570px'],
										content: "<?php echo U('Index/update');?>",//iframe的url
										success: function (layero, index) {
				
											//史仔添加
											layer.getChildFrame('#title', index).val(biaoti);
											layer.getChildFrame('#author', index).val(zuozhe);
											layer.getChildFrame('#press', index).val(pas);
											layer.getChildFrame('#category', index).val(kate);
											layer.getChildFrame('#pub_date', index).val(chuban);
											layer.getChildFrame('#price', index).val(jiage);
											layer.getChildFrame('#floor', index).val(louceng);
											layer.getChildFrame('#bookshelf', index).val(shujia);
											layer.getChildFrame('#area_code', index).val(quhao);
				
				
				
											var submit = layer.getChildFrame('#modify', index);
											submit.click(function () {
												var title = layer.getChildFrame('#title', index).val();
												var author = layer.getChildFrame('#author', index).val();
												var press = layer.getChildFrame('#press', index).val();
												var category = layer.getChildFrame('#category', index).val();
												var pub_date = layer.getChildFrame('#pub_date', index).val();
												var price = layer.getChildFrame('#price', index).val();
												var floor = layer.getChildFrame('#floor', index).val();
												var bookshelf = layer.getChildFrame('#bookshelf', index).val();
												var area_code = layer.getChildFrame('#area_code', index).val();
				
				
												$.ajax({
													url: "<?php echo U('Index/updateBook');?>",
													type: "post",
													contentType: "application/x-www-form-urlencoded;charset=utf-8",
													data: {
														ISBN: isbn,
														title: title,
														author: author,
														press: press,
														category: category,
														pub_date: pub_date,
														price: price,
														floor: floor,
														bookshelf: bookshelf,
														area_code: area_code,
													},
													dataType: "json",
													success: function (data) {
				
														if (data.code == 'success') {
				
															// layer.close(layer.index)
															// //将json字符串转为json对象
															// var arr = [
															// 	{
															// 		isbn: ISBN,
															// 		title: title,
															// 		author: author,
															// 		press: press,
															// 		category: category,
															// 		pub_date: pub_date,
															// 		price: price,
															// 		floor: floor,
															// 		bookshelf: bookshelf,
															// 		area_code: area_code,
															// 		number: number,
															// 	}
															// ]
															// var jsonStr = JSON.stringify(arr)
				
															// //去掉字符串中的空格
															// jsonStr = jsonStr.replace(" ", "");
															// //typeof https://www.cnblogs.com/liu-fei-fei/p/7715870.html
															// if (typeof jsonStr != 'object') {
															// 	//去掉饭斜杠
															// 	jsonStr = jsonStr.replace(/\ufeff/g, "")
															// 	var jsonObj = JSON.parse(jsonStr)
															// 	that.booklist.unshift(jsonObj[0])
				
															// }
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
				
				//////////////////////////////////////////////////
				
				*/



				updateNotice: function (index) {
					var that = this
					var notice_id = that.noticelist[index].notice_id
					var indexs = index

					var biaoti = that.noticelist[index].notice_title
					var neirong = that.noticelist[index].notice_body
					// var pas = that.booklist[index].press
					// var kate = that.booklist[index].category
					// var chuban = that.booklist[index].pub_date
					// var jiage = that.booklist[index].price
					// var louceng = that.booklist[index].floor
					// var shujia = that.booklist[index].bookshelf
					// var quhao = that.booklist[index].area_code
					layer.open({
						type: 2,
						title: 'update',
						shadeClose: true,
						shade: 0.8,
						area: ['480px', '570px'],
						content: "<?php echo U('Index/updatenoticec');?>",//iframe的url
						success: function (layero, index) {
							layer.getChildFrame('#notice_title', index).val(biaoti);
							layer.getChildFrame('#notice_body', index).val(neirong);
							var submit = layer.getChildFrame('#Release', index);
							submit.click(function () {
								var notice_title = layer.getChildFrame('#notice_title', index).val();
								var notice_body = layer.getChildFrame('#notice_body', index).val();


								$.ajax({
									url: "<?php echo U('Index/updateNotice');?>",
									type: "post",
									contentType: "application/x-www-form-urlencoded;charset=utf-8",
									data: {
										notice_id: notice_id,
										notice_title: notice_title,
										notice_body: notice_body,
										release_time: getNowFormatDate(),
										staff_id: that.staffId

									},
									dataType: "json",
									success: function (data) {

										if (data.code == 'success') {

											// layer.close(layer.index)
											// //将json字符串转为json对象
											// var arr = [
											// 	{
											// 		isbn: ISBN,
											// 		title: title,
											// 		author: author,
											// 		press: press,
											// 		category: category,
											// 		pub_date: pub_date,
											// 		price: price,
											// 		floor: floor,
											// 		bookshelf: bookshelf,
											// 		area_code: area_code,
											// 		number: number,
											// 	}
											// ]
											// var jsonStr = JSON.stringify(arr)

											// //去掉字符串中的空格
											// jsonStr = jsonStr.replace(" ", "");
											// //typeof https://www.cnblogs.com/liu-fei-fei/p/7715870.html
											// if (typeof jsonStr != 'object') {
											// 	//去掉饭斜杠
											// 	jsonStr = jsonStr.replace(/\ufeff/g, "")
											// 	var jsonObj = JSON.parse(jsonStr)
											// 	that.booklist.unshift(jsonObj[0])

											// }
											layer.close(layer.index)
											layer.msg(data.msg)
											that.noticelist[indexs].notice_title = notice_title
											that.noticelist[indexs].notice_body = notice_body
											that.noticelist[indexs].release_time = getNowFormatDate()
											that.noticelist[indexs].staff_id = that.staffId




											// window.location.href="<?php echo U('Index/home');?>"; 
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
							text: that.inputbook,
							type: that.searchbook
						},
						dataType: "json",
						success: function (data) {

							if (data.code == 'success') {
								//layer.msg(data.msg)
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


				searchReader: function (event) {

					var that = this
					/*
					 * 这里是异步数据访问
					 */
					$.ajax({
						url: "<?php echo U('Index/searchReader');?>",
						type: "post",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						data: {
							text: that.inputreader,
							type: that.searchreader
						},
						dataType: "json",
						success: function (data) {

							if (data.code == 'success') {
								//layer.msg(data.msg)
								//将json字符串转为json对象
								var jsonStr = data.data
								//去掉字符串中的空格
								jsonStr = jsonStr.replace(" ", "");
								//typeof https://www.cnblogs.com/liu-fei-fei/p/7715870.html
								if (typeof jsonStr != 'object') {
									//去掉饭斜杠
									jsonStr = jsonStr.replace(/\ufeff/g, "")
									var jsonObj = JSON.parse(jsonStr)
									that.rederlist = jsonObj
								}
							}
							if (data.code == 'fail') {
								layer.msg(data.msg)
							}
						}
					})
				},



				searchBorrowing: function (event) {

					var that = this
					/*
					 * 这里是异步数据访问
					 */
					$.ajax({
						url: "<?php echo U('Index/searchBorrow');?>",
						type: "post",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						data: {
							text: that.inputborrow,
							type: that.searchborrow
						},
						dataType: "json",
						success: function (data) {

							if (data.code == 'success') {
								//layer.msg(data.msg)
								//将json字符串转为json对象
								var jsonStr = data.data
								//去掉字符串中的空格
								jsonStr = jsonStr.replace(" ", "");
								//typeof https://www.cnblogs.com/liu-fei-fei/p/7715870.html
								if (typeof jsonStr != 'object') {
									//去掉饭斜杠
									jsonStr = jsonStr.replace(/\ufeff/g, "")
									var jsonObj = JSON.parse(jsonStr)
									that.borrowlist = jsonObj
								}
							}
							if (data.code == 'fail') {
								layer.msg(data.msg)
							}
						}
					})
				},




				searchReturn: function (event) {

					var that = this
					/*
					 * 这里是异步数据访问
					 */
					$.ajax({
						url: "<?php echo U('Index/searchReturn');?>",
						type: "post",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						data: {
							text: that.inputreturn,
							type: that.searchreturn
						},
						dataType: "json",
						success: function (data) {

							if (data.code == 'success') {
								//layer.msg(data.msg)
								//将json字符串转为json对象
								var jsonStr = data.data
								//去掉字符串中的空格
								jsonStr = jsonStr.replace(" ", "");
								//typeof https://www.cnblogs.com/liu-fei-fei/p/7715870.html
								if (typeof jsonStr != 'object') {
									//去掉饭斜杠
									jsonStr = jsonStr.replace(/\ufeff/g, "")
									var jsonObj = JSON.parse(jsonStr)
									that.returnlist = jsonObj
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
				},
				modify: function (event) {
					var that = this

					$.ajax({
						url: "<?php echo U('Index/updateInfo');?>",
						type: "post",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						data: {
							user_name: that.user_name,
							introduction: that.introduction,
							tel: that.tel
						},
						dataType: "json",
						success: function (data) {
							if (data.code == 'success') {
								layer.msg(data.msg)
							}

							if (data.code == 'fail') {
								layer.msg(data.msg)
							}
						}
					})
				},
				backBook: function (event) {

					var that = this
					$.ajax({
						url: "<?php echo U('Index/returnBook');?>",
						type: "post",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						dataType: "json",
						data: {

							bookId: that.retbookId,
							penal: that.penalSum,
							staffId: that.staffId,
							userid: that.borUser,
							bortime: that.borTime,
						},
						success: function (data) {

							if (data.code == 'success') {
								layer.msg(data.msg)
							}

							if (data.code == 'fail') {
								layer.msg(data.msg)
							}
						}
					})
					that.penalSum = 0.00;
				},
				borrowBook: function (event) {
					var that = this
					$.ajax({
						url: "<?php echo U('Index/borrowBook');?>",
						type: "post",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						dataType: "json",
						data: {
							cardId: that.cardId,
							borbookId: that.borbookId,
							//BorrowUser:that.BorrowUser,
							staffId: that.staffId
						},
						success: function (data) {

							if (data.code == 'success') {

								// //将json字符串转为json对象
								// var jsonStr = data.data
								// //去掉字符串中的空格
								// jsonStr = jsonStr.replace(" ", "");
								// //typeof https://www.cnblogs.com/liu-fei-fei/p/7715870.html
								// if (typeof jsonStr != 'object') {
								// 	//去掉饭斜杠
								// 	jsonStr = jsonStr.replace(/\ufeff/g, "")
								// 	var jsonObj = JSON.parse(jsonStr)
								// 	that.BorrowUser = jsonObj[0].user_id

								// }

								layer.msg(data.msg)
							}

							if (data.code == 'fail') {
								layer.msg(data.msg)
							}
						}
					})
				},
				fine: function (event) {
					var that = this
					$.ajax({
						url: "<?php echo U('Index/fine');?>",
						type: "post",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						dataType: "json",
						data: {

							bookId: that.retbookId,

						},
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
									that.penalSum = jsonObj[0].cost
									that.borUser = jsonObj[0].card_id
									that.borTime = jsonObj[0].bor_time
								}

							}

							if (data.code == 'fail') {
								layer.msg(data.msg)
							}
						}
					})
				},
				removeUser: function (index) {
					var that = this
					var user_id = that.rederlist[index].user_id
					$.ajax({
						url: "<?php echo U('Index/removeUser');?>",
						type: "post",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						data: {
							user_id: user_id
						},
						dataType: "json",
						success: function (data) {
							if (data.code == 'success') {
								$("tr#" + index).hide()
								that.rederlist.splice(index, 1)
								layer.msg(data.msg)
							}
							if (data.code == 'fail') {
								layer.msg(data.msg)
							}
						}
					})

				},





				// success: function (layero, index) {
				// 							var submit = layer.getChildFrame('#submit', index);
				// 							submit.click(function () {
				// 								var ISBN = layer.getChildFrame('#ISBN', index).val();
				// 								var title = layer.getChildFrame('#title', index).val();
				// 								var author = layer.getChildFrame('#author', index).val();
				// 								var press = layer.getChildFrame('#press', index).val();
				// 								var category = layer.getChildFrame('#category', index).val();
				// 								var pub_date = layer.getChildFrame('#pub_date', index).val();
				// 								var price = layer.getChildFrame('#price', index).val();
				// 								var floor = layer.getChildFrame('#floor', index).val();
				// 								var bookshelf = layer.getChildFrame('#bookshelf', index).val();
				// 								var area_code = layer.getChildFrame('#area_code', index).val();
				// 								var number = layer.getChildFrame('#number', index).val();



				addNotice: function (event) {
					var that = this
					layer.open({
						type: 2,
						title: 'add',
						shadeClose: true,
						shade: 0.8,
						area: ['480px', '340px'],
						content: "<?php echo U('Index/addnotices');?>",//iframe的url
						success: function (layero, index) {
							var submit = layer.getChildFrame('#Release', index);
							submit.click(function () {
								var notice_title = layer.getChildFrame('#notice_title', index).val();
								var notice_body = layer.getChildFrame('#notice_body', index).val();


								$.ajax({
									url: "<?php echo U('Index/addNotice');?>",
									type: "post",
									contentType: "application/x-www-form-urlencoded;charset=utf-8",
									data: {
										notice_title: notice_title,
										notice_body: notice_body,

									},
									dataType: "json",
									success: function (data) {

										if (data.code == 'success') {


											layer.close(layer.index)
											//将json字符串转为json对象
											var arr = [
												{
													notice_title: notice_title,
													notice_body: notice_body,
													notice_id: data["things"][0]["notice_id"],
													release_time: data["things"][0]["release_time"],
													staff_id: data["things"][0]["staff_id"],

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
												that.noticelist.unshift(jsonObj[0])

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




				deleteNotice: function (index) {
					var that = this
					var notice_id = that.noticelist[index].notice_id
					$.ajax({
						url: "<?php echo U('Index/removeNotice');?>",
						type: "post",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						data: {
							notice_id: notice_id
						},
						dataType: "json",
						success: function (data) {
							if (data.code == 'success') {
								$("tr#" + index).hide()
								that.noticelist.splice(index, 1)
								layer.msg(data.msg)
							}
							if (data.code == 'fail') {
								layer.msg(data.msg)
							}
						}
					})

				},




				updateUser: function (index) {
					var that = this
					var user_id = that.rederlist[index].user_id
					var indexs = index

					var mima = that.rederlist[index].password
					var xingming = that.rederlist[index].name
					var youxiang = that.rederlist[index].email
					var kahao = that.rederlist[index].card_id
					var dizhi = that.rederlist[index].address

					layer.open({
						type: 2,
						title: 'update',
						shadeClose: true,
						shade: 0.8,
						area: ['480px', '570px'],
						content: "<?php echo U('Index/updateuserr');?>",//iframe的url
						success: function (layero, index) {
							layer.getChildFrame('#password', index).val(mima);
							layer.getChildFrame('#name', index).val(xingming);
							layer.getChildFrame('#email', index).val(youxiang);
							layer.getChildFrame('#card_id', index).val(kahao);
							layer.getChildFrame('#address', index).val(dizhi);

							var submit = layer.getChildFrame('#submit', index);
							submit.click(function () {
								var password = layer.getChildFrame('#password', index).val();
								var name = layer.getChildFrame('#name', index).val();
								var email = layer.getChildFrame('#email', index).val();
								var card_id = layer.getChildFrame('#card_id', index).val();
								var address = layer.getChildFrame('#address', index).val();



								$.ajax({
									url: "<?php echo U('Index/updateUser');?>",
									type: "post",
									contentType: "application/x-www-form-urlencoded;charset=utf-8",
									data: {
										user_id: user_id,
										password: password,
										name: name,
										email: email,
										address: address,
										card_id: card_id,
									},
									dataType: "json",
									success: function (data) {

										if (data.code == 'success') {

											// layer.close(layer.index)
											// //将json字符串转为json对象
											// var arr = [
											// 	{
											// 		isbn: ISBN,
											// 		title: title,
											// 		author: author,
											// 		press: press,
											// 		category: category,
											// 		pub_date: pub_date,
											// 		price: price,
											// 		floor: floor,
											// 		bookshelf: bookshelf,
											// 		area_code: area_code,
											// 		number: number,
											// 	}
											// ]
											// var jsonStr = JSON.stringify(arr)

											// //去掉字符串中的空格
											// jsonStr = jsonStr.replace(" ", "");
											// //typeof https://www.cnblogs.com/liu-fei-fei/p/7715870.html
											// if (typeof jsonStr != 'object') {
											// 	//去掉饭斜杠
											// 	jsonStr = jsonStr.replace(/\ufeff/g, "")
											// 	var jsonObj = JSON.parse(jsonStr)
											// 	that.booklist.unshift(jsonObj[0])

											// }
											layer.close(layer.index)
											layer.msg(data.msg)
											that.rederlist[indexs].name = name
											that.rederlist[indexs].password = password
											that.rederlist[indexs].email = email
											that.rederlist[indexs].card_id = card_id
											that.rederlist[indexs].address = address



											// window.location.href="<?php echo U('Index/home');?>"; 
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
				//史仔添加
				addCategory: function (event) {

					var that = this

					$.ajax({
						url: "<?php echo U('Index/addCategory');?>",
						type: "post",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						data: {
							category: that.addcategory


						},
						dataType: "json",
						success: function (data) {

							if (data.code == 'success') {

								layer.msg(data.msg)
							}
							if (data.code == 'fail') {

								layer.msg(data.msg)
							}
						}


					})
				},



				updateCategory: function (index) {
					var that = this
					var upcategory_id = that.categorylist[index].category_id
					var upcategory = that.categorylist[index].category

					layer.open({
						type: 2,
						title: 'update',
						shadeClose: true,
						shade: 0.8,
						area: ['450px', '470px'],
						content: "<?php echo U('Index/updatecategory');?>",//iframe的url
						success: function (layero, index) {

							//史仔添加
							layer.getChildFrame('#upcategory', index).val(upcategory);


							var submit = layer.getChildFrame('#upsubmit', index);
							submit.click(function () {

								var upcategory = layer.getChildFrame('#upcategory', index).val();



								$.ajax({
									url: "<?php echo U('Index/updateCate');?>",
									type: "post",
									contentType: "application/x-www-form-urlencoded;charset=utf-8",
									data: {
										upcategory_id: upcategory_id,
										upcategory: upcategory,

									},
									dataType: "json",
									success: function (data) {

										if (data.code == 'success') {


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
				addLocation: function (event) {
					var that = this

					$.ajax({
						url: "<?php echo U('Index/addLocation');?>",
						type: "post",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						data: {
							floor: that.addlocation


						},
						dataType: "json",
						success: function (data) {

							if (data.code == 'success') {

								layer.msg(data.msg)
							}
							if (data.code == 'fail') {

								layer.msg(data.msg)
							}
						}


					})

				},

				deletelocation: function (index) {
					var that = this
					var floor = that.locationlist[index].floor
					$.ajax({
						url: "<?php echo U('Index/deleteLocation');?>",
						type: "post",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						data: {
							floor: floor
						},
						dataType: "json",
						success: function (data) {
							if (data.code == 'success') {
								$("tr#" + index).hide()
								layer.msg(data.msg)
							}
							if (data.code == 'fail') {
								layer.msg(data.msg)
							}
						}
					})
				},

				updatelocation: function (index) {
					var that = this
					var uplocation_id = that.locationlist[index].location_id
					var upfloor = that.locationlist[index].floor
					var upshelf = that.locationlist[index].bookshelf

					layer.open({
						type: 2,
						title: 'update',
						shadeClose: true,
						shade: 0.8,
						area: ['480px', '570px'],
						content: "<?php echo U('Index/updatefloor');?>",//iframe的url
						success: function (layero, index) {

							//史仔添加
							layer.getChildFrame('#upfloor', index).val(upfloor);
							layer.getChildFrame('#upshelf', index).val(upshelf);

							var submit = layer.getChildFrame('#upfsubmit', index);
							submit.click(function () {

								var upfloor = layer.getChildFrame('#upfloor', index).val();
								var upshelf = layer.getChildFrame('#upshelf', index).val();


								$.ajax({
									url: "<?php echo U('Index/updateLocation');?>",
									type: "post",
									contentType: "application/x-www-form-urlencoded;charset=utf-8",
									data: {
										uplocation_id: uplocation_id,
										upfloor: upfloor,
										upshelf: upshelf

									},
									dataType: "json",
									success: function (data) {

										if (data.code == 'success') {


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
				//丢书时查询罚款和书价
				payBook: function (event) {
					var that = this
					$.ajax({
						url: "<?php echo U('Index/payBook');?>",
						type: "post",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						dataType: "json",
						data: {

							bookId: that.paybookId,

						},
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
									that.paySum = jsonObj[0].cost
									that.payborUser = jsonObj[0].user_id
									that.payborTime = jsonObj[0].bor_time
									that.originsl = jsonObj[0].price
								}

							}

							if (data.code == 'fail') {
								layer.msg(data.msg)
							}
						}
					})
				},
				Pay: function (event) {
					var that = this
					$.ajax({
						url: "<?php echo U('Index/Pay');?>",
						type: "post",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						dataType: "json",
						data: {

							bookId: that.paybookId,
							penal: that.paySum,
							staffId: that.staffId,
							userid: that.payborUser,
							//bortime: that.payborTime,
							price: that.originsl,
						},
						success: function (data) {

							if (data.code == 'success') {
								layer.msg(data.msg)
							}

							if (data.code == 'fail') {
								layer.msg(data.msg)
							}
						}
					})

				},
				//jiahui
				clean: function (event) {
					var that = this
					layer.msg("Return Success!")
					
				},









			}

		})
	</script>
</body>

</html>