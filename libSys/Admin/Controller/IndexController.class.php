<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller
{

	//这个可以路由到view下的index.html，一个小demo
	public function index()
	{
		$this->display();
	}
	public function test()
	{
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
	public function login()
	{
		$account = $_POST['account'];
		$password = $_POST['password'];
		$sql = "select * from lib_admin where admin_id='{$account}' and password='{$password}'";
		$admin = D('Admin');
		$return = $admin->query($sql);
		if($return)
		{
			cookie('adminAccount', $account, 3600*48);
			$json = json_encode(array(
				'code' => '200'
			));
			echo $json;
		}else{
			$json = json_encode(array(
				'code' => '404'
			));
			echo $json;
		}
		// if ($account == 'admin' && $password == '123456') {
		// 	cookie('adminAccount', $account, 3600*48);
		// 	$json = json_encode(array(
		// 		'code' => '200'
		// 	));
		// 	echo $json;
		// } else {
		// 	$json = json_encode(array(
		// 		'code' => '404'
		// 	));
		// 	echo $json;
		// }
	}
// if (cookie('adminAccount') != '') {
// 			$vipcard = D('Vipcard');
// 			$sql = "select * from lib_vipcard";
// 			$return = $vipcard->query($sql);
// 			if ($return) {
// 				echo json_encode(array(
// 					'code' => 'success',
// 					'data' => $return
// 				));
// 			} else {
// 				$json = json_encode(array(
// 					'code' => 'fail',
// 					'data' => null
// 				));
// 				echo $json;
// 			}
// 		} else {
// 			$json = json_encode(array(
// 				'code' => 'fail',
// 				'data' => null
// 			));
// 			echo $json;
// 		}
	/*
	 * quit 退出系统
	 * 销毁session，并转到登录页
	 */
	public function quit()
	{
		if (cookie('adminAccount') != '') {
			/*注销cookie*/
			cookie('adminAccount', null);
			$json = json_encode(array(
				'code' => 'success',
				'msg' => '退出成功'
			));
			echo $json;
		} else {
			$josn = json_encode(array(
				'code' => 'fail',
				'msg' => 'cookie过期'
			));
			echo $json;
		}
	}
	/*
	 * 函数名 ： addCard
	 * 访问url ： http://localhost/libSys/index.php?s=/Admin/Index/addCard   或者使用tp模板的路由方法 {:U('Admin/Index/addCard')}
	 * POST参数 ： {
	 * 				card_id String
	 * 				vip int
	 * 			}
	 * 返回json ： {
	 * 				code ： "success" / "fail"
	 *          }
	 *          
	 */
	// public function addCard()
	// {
	// 	if (cookie('adminAccount') != '') {
	// 		$cardId = $_POST['card_id'];
	// 		$vip = $_POST['vip'];
	// 		$vipcard = D('Vipcard');
	// 		$sql = "insert into lib_vipcard values('" . $cardId . "','" . $vip . "')";
	// 		$return = $vipcard->execute($sql);
	// 		if ($return) {
	// 			$json = json_encode(array(
	// 				'code' => 'success'
	// 			));
	// 			echo $json;
	// 		} else {
	// 			$json = json_encode(array(
	// 				'code' => 'fail'
	// 			));
	// 			echo $json;
	// 		}
	// 	} else {
	// 		$json = json_encode(array(
	// 			'code' => 'fail'
	// 		));
	// 		echo $json;
	// 	}
	// }

		// $sql


		// 	$login = D('Login');
		// $sql = "select * from lib_login a,lib_vipcard b where a.card_id=b.card_id and a.card_id='{$account}' and a.pwd='{$password}' and b.vip=1 ";
		// $return = $login->query($sql);//execute
		// if ($return) {
		// 	/*cookie*/
		// 	cookie('homeAccount', $account, 10);
		// 	$json = json_encode(array(
		// 		'code' => 'success'
		// 	));
		// 	echo $json;
		// } else {
		// 	$json = json_encode(array(
		// 		'code' => 'fail'
		// 	));
		// 	echo $json;
		// }




		// if (cookie('homeAccount') != '') {
		// 	$name = $_POST['name'];
		// 	$name = $_POST['name'];
		// 	$name = $_POST['name'];
		// 	$name = $_POST['name'];

		// 	// sql
		// 	$user = D('User');
		// 	$sql = "update lib_user set ";
		// 	$return = $user->execute($sql);
		// } else {
		// 	$josn = json_encode(array(
		// 		'code' => 'fail',
		// 		'msg' => 'cookie过期'
		// 	));
		// 	echo $json;
		// }



		// echo json_encode(array(
		// 	"code" => 'jfasdjfd',
		// 	'data' => array(
		// 		'name' => 'skjdfk',
		// 		"age" => "13"
		// 	)
		// ));
	
	/*
	 * 函数名 ： removeCard
	 * 访问url ： http://localhost/libSys/index.php?s=/Admin/Index/removeCard   或者使用tp模板的路由方法 {:U('Admin/Index/removeCard')}
	 * POST参数 : {
	 * 				card_id String
	 * 			}
	 * 	返回json ： {
	 * 				code ： "success" / "fail"
	 * 			}
	 */
	// public function removeCard()
	// {
	// 	if (cookie('adminAccount') != '') {
	// 		$cardId = $_POST['card_id'];
	// 		$vipcard = D('Vipcard');
	// 		$sql = "delete from lib_vipcard where card_id = '" . $cardId . "'";
	// 		$return = $vipcard->execute($sql);
	// 		if ($return) {
	// 			$json = json_encode(array(
	// 				'code' => 'success'
	// 			));
	// 			echo $json;
	// 		} else {
	// 			$json = json_encode(array(
	// 				'code' => 'fail'
	// 			));
	// 			echo $json;
	// 		}
	// 	} else {
	// 		$json = json_encode(array(
	// 			'code' => 'fail'
	// 		));
	// 		echo $json;
	// 	}
	// }
	/*
	 * 函数名 ： lockCard
	 * 访问url ： http://localhost/libSys/index.php?s=/Admin/Index/lockCard   或者使用tp模板的路由方法 {:U('Admin/Index/lockCard')}
	 * POST参数 : {
	 * 				card_id String
	 * 			}
	 * 	返回json ： {
	 * 				code ： "success" / "fail"
	 * 			}
	 */
	// public function lockCard()
	// {
	// 	if (cookie('adminAccount') != '') {
	// 		$cardId = $_POST['card_id'];
	// 		$vipcard = D('Login');
	// 		$sql = "update lib_login set is_block = 1 where card_id = '".$cardId."'";
	// 		$return = $vipcard->execute($sql);
	// 		if ($return) {
	// 			$json = json_encode(array(
	// 				'code' => 'success'
	// 			));
	// 			echo $json;
	// 		} else {
	// 			$json = json_encode(array(
	// 				'code' => 'fail',
	// 			));
	// 			echo $json;
	// 		}
	// 	} else {
	// 		$json = json_encode(array(
	// 			'code' => 'fail',
	// 		));
	// 		echo $json;
	// 	}
	// }
	/* 
	 * getCard  vue钩子函数created中进行调用
	 * http://localhost/libSys/index.php?s=/Home/Index/addBook  或者使用tp模板路由 {:U('Home/Index/addBook')}
	 * {}
	 * {
	 * 		code : "success" / "fail"
	 * 		data : {
	 * 					card_id 
	 * 					vip
	 * 				}
	 * }
	 */
	// public function getCard()
	// {
	// 	if (cookie('adminAccount') != '') {
	// 		$vipcard = D('Vipcard');
	// 		$sql = "select * from lib_vipcard";
	// 		$return = $vipcard->query($sql);
	// 		if ($return) {
	// 			echo json_encode(array(
	// 				'code' => 'success',
	// 				'data' => $return
	// 			));
	// 		} else {
	// 			$json = json_encode(array(
	// 				'code' => 'fail',
	// 				'data' => null
	// 			));
	// 			echo $json;
	// 		}
	// 	} else {
	// 		$json = json_encode(array(
	// 			'code' => 'fail',
	// 			'data' => null
	// 		));
	// 		echo $json;
	// 	}
		// echo json_encode(array(
		// 	"code" => 'jfasdjfd',
		// 	'data' => array(
		// 		'name' => 'skjdfk',
		// 		"age" => "13"
		// 	)
		// ));


	// }
	/*
	 * 函数名 ：addStaff
	 * 访问url ： http://localhost/libSys/index.php?s=/Admin/Index/addStaff   或者使用tp模板的路由方法 {:U('Admin/Index/addStaff')}
	 * POST参数 ： {
	 * 				staff_id String(card_id)
	 * 				password
	 * 				name
	 * 			}
	 * 返回json : {
	 * 			 	code : "success" / "fail"
	 * 			}
	 */
	public function addStaff()
	{
		if (cookie('adminAccount') != '') {
			// $password = "00010001";
			$isblock = 0;
			$vipp = 2;
			$staffId = $_POST['staff_id'];
			$name = $_POST['name'];
			// $work_years = $_POST['work_years'];
			$introduction = $_POST['introduction'];
			$tel = $_POST['tel'];
			$email = $_POST['email'];
			$password = $_POST['pwd'];
			// $staffId = "2016303122";
			// $name = "lvbingxu";
			// $work_years = "45";
			// $introduction = "dsjfksdjf";
			// $tel = "464564";
			
			// $login = D('Login');
			// $sql2 = "insert into lib_login (card_id,pwd) values('" . $staffId . "','" . $password . "')";
			// $vip = D('Vipcard');
			// $sql3 = "insert into lib_vipcard (card_id,vip) values('" . $staffId . "','" . $vipp . "')";
			$staff = D('Staff');
			$sql = "insert into lib_staff (staff_id,password,name,introduction,email,tel) values('" . $staffId . "','" . $password . "','" . $name . "','" . $introduction . "','" . $email . "','" . $tel . "')";
			$return =  $staff->execute($sql);
			// $return = $login->execute($sql2) && $vip->execute($sql3) && $staff->execute($sql1);
			if ($return) {
				$json = json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail'
			));
			echo $json;
		}
	}
	/*
	 * 函数名 ：removeStaff
	 * 访问url ： http://localhost/libSys/index.php?s=/Admin/Index/removeStaff   或者使用tp模板的路由方法 {:U('Admin/Index/removeStaff')}
	 * POST参数 ： {
	 * 				staff_id String(card_id)
	 * 			}
	 * 返回json : {
	 * 			 	code : "success" / "fail"
	 * 			}
	 */
	public function removeStaff()
	{
		if (cookie('adminAccount') != '') {
			$staffId = $_POST['staff_id'];
			$staff = D('Staff');
			$sql = "delete from lib_staff where staff_id = '" . $staffId . "'";
			$return = $staff->execute($sql);
			if ($return) {
				$json = json_encode(array(
					'code' => 'success'
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail'
			));
			echo $json;
		}
	}
	/*
	 * getStaff
	 * http://localhost/libSys/index.php?s=/Admin/Index/getStaff 或者使用tp模板的路由方法{:U('Admin/Index/getStaff')}
	 * {}
	 * {
	 * 		code : "success" / "fail"
	 * 		data : {
	 * 					staff_id 
	 * 					password
	 * 					name
	 * 				}
	 * }
	 */
	public function getStaff()
	{
		if (cookie('adminAccount') != '') {

			$staff = D('Staff');
			$sql = "select staff_id,password,name,introduction,email,tel from lib_staff";
			$return = $staff->query($sql);
			if ($return) {
				echo json_encode(array(
					'code' => 'success',
					'data' => json_encode($return),
					'msg' => '成功'
				));
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'data' => null,
					'msg' => '查询失败'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'data' => null,
				'msg' => 'cookie过期'
			));
			echo $json;
		}
	}
	public function searchStaff()
	{
		$input = $_POST['input'];
		$search = $_POST['search'];
		// $input = "QuZhuohan";
		// $search = "staff_id";select staff_id,password,name,introduction,email,tel from lib_staff where name like '%Quzhuohan%';
		$staff = D('Staff');
		if($search =='name')
		{
		$sql = "select staff_id,password,name,introduction,email,tel from lib_staff where name like '%{$input}%' ";
		}else{
		$sql = "select staff_id,password,name,introduction,email,tel from lib_staff where staff_id like '%{$input}%'";	
		}
		$return = $staff->query($sql);
		if ($return) {
				echo json_encode(array(
					'code' => 'success',
					'data' => json_encode($return),
					'msg' => 'success'
				));
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'data' => null,
					'msg' => 'fail'
				));
				echo $json;
			}
		
	}
    public function updateStaff()
	{
		if (cookie('adminAccount') != '') {
			$staffIdOld = $_POST['staffIdOld'];
			$staffId = $_POST['staff_id'];
			$name = $_POST['name'];
			// $work_years = $_POST['work_years'];
			$introduction = $_POST['introduction'];
			$tel = $_POST['tel'];
			$password = $_POST['pwd'];
			$email = $_POST['email'];
			// $staffIdOld ="123456";
			// // $staffId = "12346542";
			// $name = "shijiahui";
			// $work_years ="333333";
			// $introduction = "332333";
			// $tel = "332322223";
			// $password = "10010212";
			// $login = D('Login');
			// $sql2 = "update lib_login set  pwd = {$password} where card_id = {$staffIdOld}";
			$staff = D('Staff');
			$sql = " update lib_staff set name = '{$name}',password = '{$password}', introduction= '{$introduction}', email = '{$email}',tel = '{$tel}' where staff_id = '{$staffIdOld}' ";
			// $sql = " update (select staff_id,pwd,name,work_years,introduction,tel from lib_staff join lib_login on staff_id = card_id) set card_id = {$staffId}, pwd = {$password},name = {$name}, work_years = {$work_years}, introduction= {$introduction}, tel = {$tel} where card_id = {$staffIdOld}";
			// $return = $staff->execute($sql);
			$return = $staff->execute($sql);
			// $return = $login->execute($sql2);
			if ($return) {
				echo json_encode(array(
					'code' => 'success',
					'data' => json_encode($return),
					'msg' => 'success'
				));
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'data' => null,
					'msg' => 'fail'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'data' => null,
				'msg' => 'cookie过期'
			));
			echo $json;
		}
	}
	public function getValue()
	{
		
			$value = D('Setting');
			$sql = "select security_deposit,borrow_length,daily_fine from lib_setting ";
			$return = $value->query($sql);
			if ($return) {
				echo json_encode(array(
					'code' => 'success',
					'data' => json_encode($return),
					'msg' => 'success'
				));
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'data' => null,
					'msg' => 'fail'
				));
				echo $json;
			}


	}
	public function changeFine()
	{
			

			$fine = $_POST['daily_fine'];
			// $fine = 1.2;
			$value = D('Setting');
			$sql = "update lib_setting set daily_fine = '{$fine}' ";
			$return = $value->execute($sql) ;
		
			if ($return) {
				$json = json_encode(array(
					'code' => 'success'
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail'
				));
				echo $json;
			} 
	}
	public function changeDeposit()
	{
			
			$deposit = $_POST['security_deposit'];
			// $deposit = 23;
			$value = D('Setting');
			$sql = "update lib_setting set security_deposit = {$deposit} ";
			$return = $value->execute($sql) ;
			if ($return) {
				$json = json_encode(array(
					'code' => 'success'
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail'
				));
				echo $json;
			} 
	}
	public function changePeriod()
	{

			$period = $_POST['borrow_length'];
			$value = D('Setting');
			$sql = "update lib_setting set borrow_length = {$period} ";
				$return = $value->execute($sql) ;
			// $return = $value4->execute($sql4) && $value3->execute($sql3) && $value2->execute($sql2) && $value1->execute($sql1) ;
			if ($return) {
				$json = json_encode(array(
					'code' => 'success'
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail'
				));
				echo $json;
			} 
	}
// public function getAdmin()
// 	{
// 		$admin = D('Admin');
// 		$account = "admin";
// 		$password ="123456";
// 		$sql = "select * from lib_admin where admin_id = '{$account}' and password = '{$password}'";
		
// 		$return = $admin->query($sql);
// 			if ($return) {
// 				echo json_encode(array(
// 					'code' => 'success',
// 					'data' => json_encode($return),
// 					'msg' => '成功'
// 				));
// 			} else {
// 				$json = json_encode(array(
// 					'code' => 'fail',
// 					'data' => null,
// 					'msg' => '查询失败'
// 				));
// 				echo $json;
// 			}


// 	}
// public function getPassword()
// 	{
// 		$admin = D('Login');
// 		$account = $_POST['account'];
// 		$sql = "select * from lib_login where card_id = '{$account}' ";
// 		$return = $admin->query($sql);
// 			if ($return) {
// 				echo json_encode(array(
// 					'code' => 'success',
// 					'data' => json_encode($return),
// 					'msg' => '成功'
// 				));
// 			} else {
// 				$json = json_encode(array(
// 					'code' => 'fail',
// 					'data' => null,
// 					'msg' => '查询失败'
// 				));
// 				echo $json;
// 			}


// 	}
public function changeAdmin()
	{
			
			$account = "admin";
			$password = $_POST['password'];
			$newPassword = $_POST['newPassword'];
			
			$sql2 = "select * from lib_admin where admin_id='{$account}' and password='{$password}'";
			$admin2 = D('Admin');
			$admin = D('Admin');
			$sql = "update lib_admin set password = '{$newPassword}' where admin_id = '{$account}'";
			$return2 = $admin2->execute($sql2) ;
			if($return2)
			{
				$return = $admin->execute($sql) ;
		
			if ($return) {
				$json = json_encode(array(
					'code' => 'success'
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail'
				));
				echo $json;
			} 
			}else{
				$json = json_encode(array(
					'code' => 'fail2'
				));
				echo $json;
			}
			
	}
}


?>
