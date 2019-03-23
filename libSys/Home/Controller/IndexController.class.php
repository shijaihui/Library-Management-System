<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

	//这个可以路由到view下的index.html，一个小demo
	public function index(){
		$this->display();
	}
	public function home(){
		$this->display();
	}
	public function test(){
		$this->display();
	}
	public function info(){
		$this->display();
	}
	public function personal(){
		$this->display();
	}
	//这是异步访问的数据服务接口，这要返回json数据，ajax既可以接受的到后台的数据参数
	/*
	 * login
	 * {
	 * 	 account[card_id]
	 * 	 password
	 * }
	 * {
	 * 		code : "success" / "fail"
	 * }
	 */
	public function login(){
		$account = $_POST['account'];
		$password = $_POST['password'];
		/*
		 * sql 
		 * 在lib_login中查找
		 */
		$login = D('User');
		$sql = "select * from lib_user where user_id='{$account}' and password='{$password}' ";
		$return = $login->query($sql);
		if($return){
			/*cookie*/
			cookie('homeAccount',$account,3600*24);
			$json = json_encode(array(
					'code' => 'success'
				));
			echo $json;
		}else{
			$json = json_encode(array(
					'code' => 'fail'
				));
			echo $json;
		}
	}
	public function isLogin(){
		if(cookie('homeAccount') != ''){
			$json = json_encode(array(
					'code' => 'success',
					'msg' => 'login'
				));
			echo $json;
		}else{
			$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'unlogin'
				));
			echo $json;
		}
	}
	/*
	 * quit 退出系统
	 * 销毁session，并转到登录页
	 */
	public function quit(){
		if(cookie('homeAccount') != ''){
			/*注销cookie*/
			cookie('homeAccount',null);
			$json = json_encode(array(
					'code' => 'success',
					'msg' => 'exit successful'
				));
			echo $json;
		}else{
			$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'overdue cookie'
				));
			echo $json;
		}
	}
	public function changePW(){
		if(cookie('homeAccount')!=''){
			$user_id = cookie('homeAccount');
			$op = $_POST['op'];
			$np = $_POST['np'];
			$rp = $_POST['rp'];
			$password = D('User');
			$sql2 = "select password from lib_user where user_id = '{$user_id}' ";
			$return2 = $password->query($sql2);
			if($return2[0]['password'] == $op){
				$sql1 = "update lib_user set password = '{$np}' where user_id = '{$user_id}' ";
				$return1 = $password->execute($sql1);
				if($return1){
					$json = json_encode(array(
						'code' => 'success',
						'msg' => 'Change successful'
					));
					echo $json;
				}else{	
					$json = json_encode(array(
						'code' => 'fail',
						'msg' => "please input the password you haven't used"
					));
					echo $json;
				}
			}else{
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => "Your old password is wrong!"
				));
				echo $json;
			}
		}else{
			$json = json_encode(array(
					'code' => 'fail',
					'msg' => "cookie exprie!"
				));
			echo $json;
		}
	}
	/*
	 * updateInfo
	 * http://localhost/libSys/index.php?s=/Home/Index/updateInfo  或者使用tp模板路由 {:U('Home/Index/updateInfo')}
	 * {
	 * 		name
	 * 		avatar
	 * 		tel
	 * 		address
	 * }
	 * {
	 * 		code : "success" / "fail"
	 * }
	 */
	public function updateInfo(){
		if(cookie('homeAccount') != ''){
			$user_id = cookie('homeAccount');
			$nickname = $_POST['nickname'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$balance = $_POST['balance'];
			// $nickname = 'shepi';
			// $address = 'aksdjfdk';
			// $email = 'test@163.com';
			// $balance = '354';
			$reader = D('User');
			$sql1 = "select * from lib_user where user_id = '{$user_id}' ";
			$return = $reader->query($sql1);
			if($return[0]['name']!=$nickname || $return[0]['address']!=$address || $return[0]['email']!=$email || $return[0]['balance']!=$balance){
				$sql2 = "update lib_user set name='{$nickname}',address='{$address}',email='{$email}',balance='{$balance}' where user_id = '{$user_id}' ";
				$return1 = $reader->execute($sql2);
				if($return1) {
					$json = json_encode(array(
						'code' => 'success'
					));
					echo $json;
				} else {
					$json = json_encode(array(
						'code' => 'fail1'
					));
					echo $json;
				}
			}else{
				$json = json_encode(array(
						'code' => 'fail2'
				));
				echo $json;
			}
		}else{
			$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'cookie exprie'
				));
			echo $json;
		}

	}
	/*
	 * getInfo
	 * http://localhost/libSys/index.php?s=/Home/Index/getInfo  或者使用tp模板路由 {:U('Home/Index/getInfo')}
	 * {}
	 * {
	 * 		code : "success" / "fail"
	 * 		data : {
	 * 				user_id
	 * 				name
	 * 				avatar
	 * 				email
	 * 				tel
	 * 				address
	 * 			}
	 * }
	 */
	public function getInfo(){
		if(cookie('homeAccount') != ''){
			$reader = D('User');
			$sql = "select * from lib_user where user_id = '".cookie('homeAccount')."'";
			$return = $reader->query($sql);
			if ($return) {
				echo json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
			} else {
				$json = json_encode(array(
					'code' => 'fail',
				));
				echo $json;
			}
		}else{
			$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'overdue cookie'
				));
			echo $json;
		}

	}
	/*
	 * searchBook
 	* http://localhost/libSys/index.php?s=/Home/Index/searchBook  或者使用tp模板路由 {:U('Home/Index/searchBook')}
 	* {
 	* 	text [ISBN/title]
 	* }
 	* {
 	* 	code : "success" / "fail"
 	* 	data : {
 	*  				book_id [图书唯一码]
	 * 		   		ISBN 
	 * 		     	title
	 * 		      	author
	 * 		       	theme
	 * 		        category
	 * 		        abstract
	 * 		        publisher
	 * 		        pub_date
	 * 		        language [使用国际标准语言缩写，如中国=>zh_CN]
 	* 			}
 	*  }
	*/
 	public function searchBook(){
 			$text = $_POST['text'];
 			$type = $_POST['type'];
 			// $text = "深入";
 			// $type = "Title";
 			$return = array();
 			if($type == 'BookId'){
		 		$sql = "select * from lib_book_species a,lib_book_unique b where a.isbn=b.isbn and b.book_id='{$text}' ";
 			}else{
 				if($type == 'Title'){
	 				$type = "title like '%{$text}%' ";
	 			}else if($type == 'ISBN'){
	 				$type = "isbn='{$text}' ";
	 			}else if($type == 'Author'){
	 				$type = "author like '%{$text}%' ";
	 			}else if($type == 'Press'){
	 				$type = "press like '%{$text}%' ";
	 			}else if($type == 'Category'){
	 				$type = "category like '%{$text}%'";
	 			}else if($type == 'Summary'){
	 				$type = "summary like '%{$text}%'";
	 			}
		 		$sql = "select * from lib_book_species where {$type} ";
 			}
 			$book = D('BookSpecies');
 			$return = $book->query($sql);
	 		
	 		if($return){
					$json = json_encode(array(
							 'code' => 'success',
							 'data' => json_encode($return),
							 'num' => count($return)
						));
					echo $json;
				}else{
					$json = json_encode(array(
							'code' => 'fail',
							'msg' => 'No search results'
						));
					echo $json;
				}
 	}
	/*
	 * getBook
	 * {
	 * 
	 * }
 	* {
 	* 	code : "success" / "fail"
 	* 	data : {
 	*  				book_id [图书唯一码]
	 * 		   		ISBN 
	 * 		     	title
	 * 		      	author
	 * 		       	theme
	 * 		        category
	 * 		        abstract
	 * 		        publisher
	 * 		        pub_date
	 * 		        language [使用国际标准语言缩写，如中国=>zh_CN]
 	* 			}
 	*  }
	 */
	public function getBook(){
		if(cookie('homeAccount') != ''){
			// sql
			$book = D('Book');
			$sql = "select * from lib_book";
			$return = $book->query($sql);
			if($return){
				$json = json_encode(array(
						 'code' => 'success',
						 'data' => json_encode($return)
					));
				echo $json;
			}else{
				$json = json_encode(array(
						'code' => 'fail',
						'msg' => 'no book'
					));
			}
		}else{
			$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'cookie过期'
				));
			echo $json;
		}

	}

	public function getBookByISBN(){
		$isbn = $_POST['isbn'];
		$book = D('BookSpecies');
		$sql = "select * from lib_book_species where isbn ='{$isbn}' ";
		$return = $book->query($sql);
		if($return){
			$json = json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
			));
				echo $json;
		}else{
			$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'No Book'
			));
		}
	}
	public function getBorrow(){
		if(cookie('homeAccount')){
			// sql
			$user_id = cookie('homeAccount');
			$borrow = D('Borrow');
			$sql = "select c.book_id,b.title,a.bor_time,a.bor_length,a.cost from lib_borrow a,lib_book_species b,lib_book_unique c where a.book_id=c.book_id and b.isbn=c.isbn and a.user_id='{$user_id}' ";
			$return = $borrow->query($sql);
			if($return){
				$json = json_encode(array(
						 'code' => 'success',
						 'data' => json_encode($return)
					));
				echo $json;
			}else{
				$json = json_encode(array(
						'code' => 'fail',
						'msg' => 'No Record'
					));
				echo $json;
			}
		}else{
			$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'Overdue cookie'
				));
			echo $json;
		}
	}

	public function getReturn(){
		if(cookie('homeAccount')){
			// sql
			$user_id = cookie('homeAccount');
			$return = D('Return');
			$sql = "select c.book_id,b.title,a.ret_time,a.fine from lib_return a,lib_book_species b,lib_book_unique c where a.book_id=c.book_id and b.isbn = c.isbn and a.user_id='{$user_id}' ";
			$return = $return->query($sql);
			if($return){
				$json = json_encode(array(
						 'code' => 'success',
						 'data' => json_encode($return)
					));
				echo $json;
			}else{
				$json = json_encode(array(
						'code' => 'fail',
						'msg' => 'No Record'
					));
				echo $json;
			}
		}else{
			$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'Overdue cookie'
				));
			echo $json;
		}
	}
	public function getNotice(){

		$notice = D('Notice');
		$sql = "select * from lib_notice";
		$return = $notice->query($sql);
		if($return){
			$json = json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
			));
				echo $json;
		}else{
			$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'No Notice'
			));
		}
	}
	public function getNoticebyID(){
		$noticeid = $_POST['noticeid'];
		$sql = "select * from lib_notice where notice_id='{$noticeid}' ";
		$notice = D('Notice');
		$return = $notice->query($sql);
		if($return){
			$json = json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
					));
			echo $json;
		}else{
			$json = json_encode(array(
					'code' => 'fail',
					));
			echo $json;
		}
	}
	public function order(){
		if(cookie('homeAccount')){
			 $user_id = $_POST['user_id'];
			 $isbn = $_POST['isbn'];
			// $user_id = '13182981275';
			// $isbn = '9787111551058';

			$order = D('Order');
			$unique = D('BookUnique');
			
			$sql2 = "select count(*) from lib_borrow where user_id='{$user_id}' ";
			$sql3 = "select count(*) from lib_order where user_id = '{$user_id}' ";
			$sql4 = "select book_id from lib_book_unique where isbn = '{$isbn}' and book_id not in (select book_id from lib_borrow) and book_id not in (select book_id from lib_remove) and book_id not in (select book_id from lib_order)";
			$return2 = $unique->query($sql2);
			$return3 = $order->query($sql3);
			$return4 = $unique->query($sql4);
			if($return2[0]['count(*)']+$return3[0]['count(*)'] >= 3){
				// $sql1 = "select * from lib_order where user_id='{$user_id}' and isbn='{$isbn}' ";
				// $return1 = $order->query($sql1);
				// if($return1){
					$json = json_encode(array(
						'code' => 'fail',
						'msg' => 'You can not borrow more books!'
					));
					echo $json;
				}else if($return4){
					$time = date("Y-m-d H:i:s");
					$sql5 = "insert into lib_order values('{$user_id}','".$return4[0]['book_id']."','{$time}')";
					$return2 = $order->execute($sql5);
					if($return2){
						$json = json_encode(array(
								'code' => 'success',
								'msg' => 'Order successfully'
							));
						echo $json;
					}else{
						$json = json_encode(array(
								'code' => 'fail',
								'msg' => 'Order Failed'
							));
						echo $json;
					}
				}else{
				$json = json_encode(array(
						'code' => 'fail',
						'msg' => 'No book is available'
					));
				echo $json;
			}
		
		}else{
			$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'Overdue cookie'
				));
			echo $json;
		}
	}
	//Lv
	public function getOrder(){
		if(cookie('homeAccount')){
			$user_id = cookie('homeAccount');
			$sql = "select * from lib_order a,lib_book_species b,lib_book_unique c where a.book_id=c.book_id and c.isbn=b.isbn and a.user_id='{$user_id}' ";
			$order = D('Order');
			$return = $order->query($sql);
			if($return){
				$json = json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
				echo $json;
			}else{
				$json = json_encode(array(
					'code' => 'fail',
				));
				echo $json;
			}
		}else{
			$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'cookie failed'
				));
			echo $json;
		}
	}
	//Lv
	public function resetPwd(){
		$user_id = $_POST['account'];
		$pwd = $_POST['password'];
		$user = D('User');
		$sql = "update lib_user set password = '{$pwd}' where user_id='{$user_id}' ";
		$return  = $user->execute($sql);
		if($return){
			$json = json_encode(array(
					'code' => 'success',
					'msg' => 'reset successful'
				));
			echo $json;
		}else{	
			$json = json_encode(array(
					'code' => 'fail',
					'msg' => "please input the password you haven't used"
				));
			echo $json;
		}
	}
	public function getCosts(){
		if(cookie('homeAccount')!=''){
			$user_id = cookie('homeAccount');
			$borrow = D('Borrow');
			$sql = "select cost from lib_borrow where user_id='{$user_id}' ";
			$return = $borrow->query($sql);
			$costs = 0;
			for($i=0;$i<count($return);$i++){
				$costs += $return[$i]['cost'];
			}
			$json = json_encode(array(
					'code' => 'success',
					'data' => $costs
				));
			echo $json;
		}else{
			$json = json_encode(array(
					'code' => 'fail',
					'data' => 'not login'
				));
			echo $json;
		}
	}
	/*
	 * runAuto
	 */
	public function runAuto(){
		$user = D('User');
		$return = $user->execute("update lib_user set email='7984451512@qq.com' ");
		if($return){
			echo "it's ok";
		}else{
			echo "it's fail";
		}
	}
}
?>

