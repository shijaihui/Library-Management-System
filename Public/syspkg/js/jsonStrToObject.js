function jsonStrToObject(jsonStr){
	//将json字符串转为json对象
    jsonStr = jsonStr.replace(" ","");
    //typeof https://www.cnblogs.com/liu-fei-fei/p/7715870.html
    if(typeof jsonStr!='object'){
	    //去掉饭斜杠
	    jsonStr = jsonStr.replace(/\ufeff/g,"");
	    var jsonObj = JSON.parse(jsonStr);
	    return jsonObj;    
    }
}