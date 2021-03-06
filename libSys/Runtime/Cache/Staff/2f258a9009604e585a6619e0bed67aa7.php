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
	<link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/bootstrap/css/bootstrap.min.css">
	<!-- require user-defined -->
	<script type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="/libSys/public/syspkg/css/index.css">

	<title>test</title>
</head>
<body>

<!-- html中尽量不要写样式，也不要写属性，html只用来布局框架，css写入public/syspkg/css文件夹下，使用vue后js大部分由vue承担，若需额外js，写到pbulic/syspkg/js文件夹下 -->
	<div  id="home">
		{{data}}
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
			el : '#home',
			data : {
data : "",
			},
			created : function(){
				var that = this
				//
					$.ajax({
						url : "<?php echo U('Index/getCategoryList');?>",
						type : "post",
						contentType : "application/x-www-form-urlencoded;charset=utf-8",
						data : {

bookId : '00035',
cardId : '0441388198',
ISBN : '9787302423287'
						},
						dataType : "json",
						success : function(data){
							
							that.data = data.cat
						}
					})
			}

		})
	</script>
</body>
</html>