		function GetQueryString(name,prefix)
		{
			 var str = window.location.search;
			 if(str.indexOf(prefix)!= -1){
			 	str = str.substring(prefix.length);
			 	if(str.indexOf('.')){
			 		str = str.substring(0,str.indexOf('.'));
			 	}
			 	strArr = str.split('/');
			 	for(var i=0;i<strArr.length;i++){
			 		if(strArr[i]==name){
			 			str = strArr[i+1];
			 		}
			 	}
			 }else{
			 	str = "";
			 }
		   return str;
		}
