<?php
namespace Staff\Controller;

use Think\Controller;

class IndexController extends Controller
{


	public function index()
	{
		$this->display();
	}
	public function home()
	{
		$this->display();
	}


	//qu zhuohan
	//login by 
	public function login()
	{
		$account = $_POST['account'];
		$password = $_POST['password'];
		$staff = D('Staff');
		$sql = "select * from lib_staff where staff_id = '{$account}' and password='{$password}'";
		$return = $staff->query($sql);
		if ($return) {

			cookie('staffAccount', $account, 3600 * 24);
			$json = json_encode(array(
				'code' => 'success',
				'msg' => 'Welcome!'
			));
			echo $json;
		} else {
			$json = json_encode(array(
				'code' => 'fail'
			));
			echo $json;
		}
	}

	//qu zhuohan
	//quit by 
	public function quit()
	{
		if (cookie('staffAccount') != '') {
			/*注销cookie*/
			cookie('staffAccount', null);
			$json = json_encode(array(
				'code' => 'success',
				'msg' => 'Quit successfully!'
			));
			echo $json;
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login!'
			));
			echo $json;
		}
	}

	//qu zhuohan
	//get current user's information by
	public function getInfo()
	{
		if (cookie('staffAccount') != '') {
			$staff = D('Staff');
			$sql = "select * from lib_staff where staff_id = '" . cookie('staffAccount') . "'";
			$return = $staff->query($sql);
			if ($return) {
				echo json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'data' => null
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'data' => null
			));
			echo $json;
		}
	}

	//qu zhuohan
	//search book by multi keywords by 
	//Notice:book search result can not in the lib_remove table
	public function searchBook()
	{
		if (cookie('staffAccount') != '') {
			$text = $_POST['text'];
			$type = $_POST['type'];
	 		//$return = array();
			$book = D('Book_species');
			$sql = "SELECT * FROM lib_book_species as a join
					(SELECT COUNT(*) as number, isbn FROM lib_book_unique 
			 		where book_id not in(select book_id from lib_remove)
			 		GROUP BY isbn) AS b using(isbn)
			 		where {$type} like '%{$text}%' and number!=0 ORDER BY species_id DESC;";
			if ($type == 1) {
				$bkid = intval($text);
				$sql = "select * from lib_book_species join (select isbn,count(*)
				 		as number from lib_book_unique group by isbn) as a using(isbn) 
						where isbn in (select isbn from lib_book_unique 
						where book_id = {$bkid}) and {$bkid} not in 
						(select book_id from lib_remove)";
			}


			$return = $book->query($sql);
			if ($return) {
				$json = json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'No result!'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login!'
			));
			echo $json;
		}

	}
	 
	 //qu zhuohan
	 //search reader 
	public function searchReader()
	{
		if (cookie('staffAccount') != '') {
			$text = $_POST['text'];
			$type = $_POST['type'];
			//$return = array();
			$book = D('User');

			$sql = "SELECT * FROM lib_user
					   where {$type} like '%{$text}%' ORDER BY register_time DESC;";
			$return = $book->query($sql);
			if ($return) {
				$json = json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'No Result'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login!'
			));
			echo $json;
		}

	}


	//search reader's borrow record
	//quzhuohan
	public function searchBorrow()
	{
		if (cookie('staffAccount') != '') {
			$text = $_POST['text'];
			$type = $_POST['type'];
			$book = D('Book_species');
			if($type == 'book_id'){
				$text = intval($text);
				$sql = "SELECT * FROM lib_borrow join lib_user using(user_id)
						join lib_book_unique using(book_id) 
						join lib_book_species using(isbn) 
						where {$type} = {$text} ORDER BY species_id DESC;";
			}else{
				$sql = "SELECT * FROM lib_borrow join lib_user using(user_id)
				 		join lib_book_unique using(book_id) 
				 		join lib_book_species using(isbn) 
				 		where {$type} like '%{$text}%' ORDER BY species_id DESC;";
			}
			$return = $book->query($sql);
			if ($return) {
				for($k=0;$k<count($return);$k++){
					$return[$k]['book_id'] = substr($return[$k]['book_id']+100000,1,5);
				}
				$json = json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'No result!'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login!'
			));
			echo $json;
		}

	}

	//search return record
	//qu zhuohan
	public function searchReturn()
	{
		if (cookie('staffAccount') != '') {
			$text = $_POST['text'];
			$type = $_POST['type'];
			$book = D('Book_species');
			$sql="a";
			if($type == 'book_id'){
				$text = intval($text);
				$sql = "SELECT * FROM lib_return join lib_book_unique 
				using(book_id) join lib_book_species using (isbn) join lib_user using (user_id)
				where {$type} = {$text} ORDER BY species_id DESC;";
			}else{
				$sql = "SELECT * FROM lib_return join lib_book_unique 
						using(book_id) join lib_book_species using (isbn) join lib_user using (user_id)
						where {$type} like '%{$text}%' ORDER BY species_id DESC;";
			}
			$return = $book->query($sql);
			if ($return) {
				for($k=0;$k<count($return);$k++){
					$return[$k]['book_id'] = substr($return[$k]['book_id']+100000,1,5);
				}
				$json = json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'No result!'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login!'
			));
			echo $json;
		}

	}

	//add book and automatically generate the book_id
	//qu zhuohan
	public function addBook()
	{
		if (cookie('staffAccount') != '') {
			$ISBN = $_POST['ISBN'];
			$title = $_POST['title'];
			$author = $_POST['author'];
			$press = $_POST['press'];
			$category = $_POST['category'];
			$pub_date = $_POST['pub_date'];
			$price = $_POST['price'];
			$floor = $_POST['floor'];
			$bookshelf = $_POST['bookshelf'];
			$area_code = $_POST['area_code'];
			$number = $_POST['number'];
			$book = D('Book_species');
			$sql1 = "select count(*) as a from lib_book_unique";
			$return23 = $book->query($sql1);
			$num = $return23[0]['a'];
			$newbookid = array();
			for ($k = 1; $k <= $number; $k++) {
				$numnew = $k + $num;
				$temp_num = 100000;
				$new_num = $numnew + $temp_num;
				array_push($newbookid, substr($new_num, 1, 5));
			}
			$sql2333 = "select * from lib_book_species where isbn = '{$ISBN}';";
			$return2333 = $book->query($sql2333);
			$sql = "insert into lib_book_species(isbn,title,author,press,
					category,pub_date,price,floor,bookshelf,area_code) 
					values('{$ISBN}','{$title}','{$author}',
					'{$press}','{$category}','{$pub_date}',
					'{$price}','{$floor}','{$bookshelf}','{$area_code}');";
			if(!$return2333){
				$return = $book->execute($sql);
			}
			$return = true;
			$sql1 = "insert into lib_book_unique(isbn) values('{$ISBN}');";
			for ($i = 0; $i < $number; $i++) {
				$return1 = $book->execute($sql1);
				$return = $return && $return1;
			}

			if ($return) {
				$json = json_encode(array(
					'code' => 'success',
					'msg' => 'Add successfully!',
					'newbookid' => json_encode($newbookid)
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'SQL Error!'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login!'
			));
			echo $json;
		}
	}

	//delete book
	//qu zhuohan
	public function deleteBook()
	{
		if (cookie('staffAccount') != '') {
			$bookid = $_POST['book_id'];
			$reason = $_POST['reason'];
			$staff_id = cookie('staffAccount');
			$remove_time = date('Y-m-d');
			$book_id = intval($bookid);
			$book = D('Remove');

			$sql1 = "select * from lib_book_unique where book_id = {$book_id};";
			$ret1 = $book->query($sql1);
			if ($ret1) {
				$sql2 = "select * from lib_remove where book_id = {$book_id};";
				$ret2 = $book->query($sql2);
				if ($ret2) {
					$json = json_encode(array(
						'code' => 'fail',
						'msg' => 'It has been deleted!'
					));
					echo $json;
				} else {
					$sql3 = "select * from lib_borrow where book_id = {$book_id};";
					$ret3 = $book->query($sql3);
					if ($ret3) {
						$json = json_encode(array(
							'code' => 'fail',
							'msg' => 'It has been borrowed!'
						));
						echo $json;
					} else {
						$sql = "insert into lib_remove 
								values('{$book_id}','{$reason}','{$remove_time}','{$staff_id}');";
						$return = $book->execute($sql);
						if ($return) {
							$json = json_encode(array(
								'code' => 'success',
								'msg' => 'Delete successfully!'
							));
							echo $json;
						} else {
							$json = json_encode(array(
								'code' => 'fail',
								'msg' => 'SQL Error!'
							));
							echo $json;
						}
					}
				}

			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'This book is not exist!'
				));
				echo $json;
			}



		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login!'
			));
			echo $json;
		}
	}

	//Update book
	//qu zhuohan
	public function updateBook()
	{
		if (cookie('staffAccount') != '') {
			$ISBN = $_POST['ISBN'];
			$title = $_POST['title'];
			$author = $_POST['author'];
			$press = $_POST['press'];
			$category = $_POST['category'];
			$pub_date = $_POST['pub_date'];
			$price = $_POST['price'];
			$floor = $_POST['floor'];
			$bookshelf = $_POST['bookshelf'];
			$area_code = $_POST['area_code'];

			$book = D('Book_species');
			$sql = "update lib_book_species set title = '{$title}',author='{$author}',press='{$press}',
				   	category='{$category}',pub_date='{$pub_date}',price='{$price}',
				   	floor='{$floor}',bookshelf='{$bookshelf}',area_code='{$area_code}'
				   	where isbn = '{$ISBN}'";
			$return = $book->execute($sql);

			if ($return) {
				$json = json_encode(array(
					'code' => 'success',
					'msg' => 'Modify successfully!'
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'SQL Error!'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login！'
			));
			echo $json;
		}
	}


	//updateNotice
	//qu zhuohan
	public function updateNotice()
	{
		if (cookie('staffAccount') != '') {
			$notice_id = $_POST['notice_id'];
			$notice_title = $_POST['notice_title'];
			$notice_body = $_POST['notice_body'];
			$staff_id = $_POST['staff_id'];
			$release_time = $_POST['release_time'];


			$book = D('Book_species');
			$sql = "update lib_notice set notice_title = '{$notice_title}',
					notice_body='{$notice_body}',staff_id='{$staff_id}',
				   	release_time='{$release_time}'
				   	where notice_id = '{$notice_id}'";
			$return = $book->execute($sql);

			if ($return) {
				$json = json_encode(array(
					'code' => 'success',
					'msg' => 'Modify successfully!'
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'SQL Error!'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login！'
			));
			echo $json;
		}
	}

	//get book list 
	//notice: only select the top 20
	//qu zhuohan
	public function getBook()
	{
		if (cookie('staffAccount') != '') {
			
			$book = D('Book_species');
			$sql = "SELECT * FROM lib_book_species as a, 
			        (SELECT COUNT(*) as number, isbn as isbn2 FROM lib_book_unique 
					where book_id not in(select book_id from lib_remove) GROUP BY isbn) AS b 
			        where a.isbn = b.isbn2 and number!=0 ORDER BY species_id DESC LIMIT 0,20;";
			$return = $book->query($sql);
			if ($return) {
				$json = json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'Nothing, please add book!'
				));
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login！'
			));
			echo $json;
		}
	}


	//click the book title so that you can view bookIDs of this book!
	//qu zhuohan
	public function viewBookId()
	{
		if (cookie('staffAccount') != '') {
			// sql
			$isbn = $_POST['ISBN'];
			$book = D('Book_species');
			$sql = "SELECT book_id FROM lib_book_unique where isbn = '{$isbn}' and
					book_id not in (select book_id from lib_remove);";
			$return = $book->query($sql);

			if ($return) {

				$return1 = array();
				for ($k = 0; $k < count($return); $k++) {
					$iid = $return[$k]['book_id'];
					$temp_num = 100000;
					$bkid = $iid + $temp_num;
					array_push($return1, substr($bkid, 1, 5));
				}

				$json = json_encode(array(
					'code' => 'success',
					'data' => json_encode($return1),
					'msg' => 'success'
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'query error'
				));
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login！'
			));
			echo $json;
		}
	}

	//get date of today
	//shi jiahui
	public function getDate()
	{

		echo json_encode(array(
			'code' => 'success',
			'data' => date('Y-m-d')
		));
	}


	//get the book's information by scan the isbn
	//qu zhuohan
	public function getBookInfo()
	{
		$isbn = $_POST['ISBN'];
		$url = "https://api.douban.com/v2/book/isbn/" . $isbn;
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		$result = curl_exec($curl);
		curl_close($curl);
		$result = json_decode($result, true);


		if ($result["code"] != 6000) {
			$json = json_encode(array(
				'code' => 'success',
				'data' => $result
			));
			echo $json;
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Can not get its information!'
			));
			echo $json;
		}
	}


	public function changeBookNumber()
	{
		if (cookie('staffAccount') != '') {
			$isbn = $_POST['isbn'];
			$number = $_POST['number'];
			$book = D('Book_species');
			$sql11 = "select count(*) as a from lib_book_unique";
			$return23 = $book->query($sql11);
			$num = $return23[0]['a'];
			$newbookid = array();
			for ($k = 1; $k <= $number; $k++) {
				$numnew = $k + $num;
				$temp_num = 100000;
				$new_num = $numnew + $temp_num;
				array_push($newbookid, substr($new_num, 1, 5));
			}
			$sql1 = "insert into lib_book_unique(isbn) values('{$isbn}');";
			$return = true;
			for ($i = 0; $i < $number; $i++) {
				$return1 = $book->execute($sql1);
				$return = $return && $return1;
			}

			if ($return) {
				$json = json_encode(array(
					'code' => 'success',
					'msg' => 'Add successfully!',
					'newbookid' => json_encode($newbookid)
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'SQL Error!'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login!'
			));
			echo $json;
		}
	}
	//get the borrowing record
	//qu zhuohan

	//cunyi!!!
	public function getBorrowList()
	{
		if (cookie('staffAccount') != '') {
			// sql
			$book = D('Borrow');
			$sql = "SELECT * FROM lib_borrow left join lib_book_unique using(book_id) join lib_book_species using (isbn) join lib_user using (user_id);";
			$return = $book->query($sql);
			if ($return) {
				for($k=0;$k<count($return);$k++){
					$return[$k]['book_id'] = substr($return[$k]['book_id']+100000,1,5);
				}
				$json = json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'query error'
				));
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login！'
			));
			echo $json;
		}
	}


	//cunyi!!!
	public function getReturnList()
	{
		if (cookie('staffAccount') != '') {
			// sql
			$book = D('Return');
			$sql = "SELECT * FROM lib_return left join lib_book_unique using(book_id) 
					join lib_book_species using (isbn) join lib_user using (user_id);";
			$return = $book->query($sql);
			if ($return) {
				for($k=0;$k<count($return);$k++){
					$return[$k]['book_id'] = substr($return[$k]['book_id']+100000,1,5);
				}
				$json = json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'query error'
				));
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login！'
			));
			echo $json;
		}
	}

	//cunyi!!!
	public function getDeleteList()
	{
		if (cookie('staffAccount') != '') {
		// sql
			$book = D('Remove');
			$sql = "SELECT * FROM lib_remove left join lib_book_unique using(book_id) join lib_book_species using (isbn) Order by remove_time DESC;";
			$return = $book->query($sql);
			if ($return) {
				for($k=0;$k<count($return);$k++){
					$return[$k]['book_id'] = substr($return[$k]['book_id']+100000,1,5);
				}
				$json = json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'query error'
				));
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login！'
			));
			echo $json;
		}
	}

	//cunyi!!!
	public function getInformList()
	{
		if (cookie('staffAccount') != '') {
		// sql
			$book = D('Notice');
			$sql = "SELECT * FROM lib_notice Order by release_time DESC;";
			$return = $book->query($sql);
			if ($return) {
				$json = json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'query error'
				));
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login！'
			));
			echo $json;
		}
	}

	//get the security deposit
	//shi jiahui
	public function getBalance()
	{
		if (cookie('staffAccount') != '') {
			$setting = D('Setting');
			$sql = "select * from lib_setting ";
			$return = $setting->query($sql);
			if ($return) {
				echo json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'data' => null
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'data' => null
			));
			echo $json;
		}
	}


	//add reader
	//qu zhuohan
	//cunyi!!!
	public function addUser()
	{
		if (cookie('staffAccount') != '') {
			$userId = $_POST['userid'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$card = $_POST['cardid'];
			$name = $_POST['uname'];
			$address = $_POST['address'];
			$balance = $_POST['balance'];
			$date = date('Y-m-d');

			$reader = D('User');
			
			$sql111= "select * from lib_user where user_id = {$userId};";
			$return11=$reader->query($sql111);
			if($return11){
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'This phone number has been already registered!'
				));
				echo $json;
			}else{
				$sql1 = "insert into lib_user (user_id,password,name,email,address,balance,register_time,card_id) 
						values('" . $userId . "','" . $password . "','" . $name . "',
						'" . $email . "','" . $address . "','" . $balance . "','" . $date . "','" . $card . "');
						update lib_daily_income set security_deposit = security_deposit+
						(select security_deposit from lib_setting),total = total+(select security_deposit from lib_setting)
						where date='{$date}';";

				$return = $reader->execute($sql1);
				if ($return) {
					$json = json_encode(array(
						'code' => 'success',
						'msg' => 'add successful'
					));
					echo $json;
				} else {
					$json = json_encode(array(
						'code' => 'fail',
						'msg' => 'add fail'
					));
					echo $json;
				}
			}
			// }else{
			// 	$json = json_encode(array(
			// 		'code' => 'fail',
			// 		'msg' => 'vipcard not found'
			// 	));
			// 	echo $json;
			// }

		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'cookie exprie'
			));
			echo $json;
		}
	}

	
	//remove user
	//notice : if he has book borrowed, he can not be removed!
	//shi jiahui
	public function removeUser()
	{
		if (cookie('staffAccount') != '') {
			$userId = $_POST['user_id'];
			$user = D('User');
			$borrow = D('Borrow');
			$sql1 = "delete from lib_user where user_id = '" . $userId . "'";
			$sql2 = " select * from lib_borrow where user_id='{$userId}' ";
			$return1 = $borrow->query($sql2);
			if ($return1 == null) {
				$return = $user->execute($sql1);
				if ($return) {
					$json = json_encode(array(
						'code' => 'success',
						'msg' => 'Delete successfully!'
					));
					echo $json;
				} else {
					$json = json_encode(array(
						'code' => 'fail',
						'msg' => 'This reader is not exist!'
					));
					echo $json;
				}
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'Some book has not been returned yet!'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login!'
			));
			echo $json;
		}
	}

	//get reader list
	//qu zhuohan
	public function getUser()
	{
		if (cookie('staffAccount') != '') {
			$user = D('User');
			$sql = "select * from lib_user order by register_time desc";
			$return = $user->query($sql);
			if ($return) {
				echo json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'sql error'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login！'
			));
			echo $json;
		}
	}

	//return book
	//shi jiahui
	public function returnBook()
	{
		if (cookie('staffAccount') != '') {


			$user_id = $_POST['userid'];
			$sqllll = "select * from lib_user where card_id = '{$user_id}'"; 
			$borrowTime = $_POST['bortime'];
			$bookid = $_POST['bookId'];
			$bookid = intval($bookid);

			$book_id = intval($bookid);
			$ret_time = date('Y-m-d');
			$staff_id = $_POST['staffId'];
			$penal = $_POST['penal'];


			$back = D('Return');
			$returnn = $back->query($sqllll);
			$user_id = $returnn[0]['user_id'];
			$sql1 = "insert into lib_return (user_id,book_id,bor_time,ret_time,fine,staff_id)  
					values('" . $user_id . " ','" . $book_id . " ','" . $borrowTime . "',
					'" . $ret_time . "','" . $penal . "','" . $staff_id . " ');
					update lib_daily_income set fine = fine+{$penal},total = total+{$penal} where date = '{$ret_time}';";
			$borrow = D('Borrow');
			$sql2 = "delete from lib_borrow where book_id = '" . $book_id . "' ";

			$return = $back->execute($sql1) && $borrow->execute($sql2);
			if ($return) {
				$json = json_encode(array(
					'code' => 'success',
					'msg' => 'Return successfully!'
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'SQL Error!'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login!'
			));
			echo $json;
		}

	}

	//borrow book
	//notice : book must be exist and not be borrowed by other readers!
	//shi jiahui
	// public function borrowBook(){
	// 	if (cookie('staffAccount') != '') {


	// 		$card_id = $_POST['cardId'];
	// 		$book_id = $_POST['borbookId'];
	// 		$bor_time = date('Y-m-d');
	// 		$bor_length = 0;
	// 		$cost = 0.00;
	// 		$staff_id = $_POST['staffId'];
	// 		$user_id;
	// 		$sql0 = " select user_id from lib_user where card_id='" . $card_id . "' ";
	// 		$user = D('User');
	// 		$return0 = $user->query($sql0);//检查用户是否存在

	// 		if ($return0) {


	// 			$user_id = $return0[0]['user_id'];
	// 			$borrow = D('Borrow');
	// 			$book = D('Book_unique');
	// 			$order = D('Order');
	// 			$del = D('Remove');
	// 			$sql2 = "insert into lib_borrow (user_id,book_id,bor_time,bor_length,cost,staff_id) 
	// 					values( '" . $user_id . "','" . $book_id . "','" . $bor_time . "',
	// 					'" . $bor_length . "','" . $cost . "','" . $staff_id . "' ) ";
	// 			$sql1 = "select * from lib_borrow where book_id='{$book_id}' ";
	// 			$sql3 = "select sum(cost) as fine from lib_borrow where user_id='{$user_id}'";
	// 			$sql4 = " select count(user_id) as user  from lib_borrow where user_id='{$user_id}' ";
	// 			$sql5 = " select * from lib_book_unique where book_id='" . $book_id . "'";
	// 			$sql6 = " select * from lib_order where book_id='{$book_id}' ";
	// 			$sql7 = " select * from lib_remove where book_id='{$book_id}' ";
	// 			$return = $borrow->query($sql1);//检查该书号是否已经被借
	// 			$return3 = $borrow->query($sql3);//检查该用户欠款是否为零
	// 			$return4 = $borrow->query($sql4);//检查该用户借书数量
	// 			$return5 = $book->query($sql5);//检查是否存在这本书
	// 			$return6 = $order->query($sql6);//检查是否被预约
	// 			$return7 = $del->query($sql7);//检查书籍是否被删除
	// 			$fine = $return3[0]['fine'];
	// 			$booksum = $return4[0]['user'];
				

	// 			if ($fine <= 0.001) {

	// 				if ($booksum < 3) {
	// 					if ($return5) {
	// 						if ($return6 == null) {
	// 							if ($return == null) {
	// 								if ($return7 == null) {

	// 									$return1 = $borrow->execute($sql2);//一切没有问题，将借书记录插入借书表中								
	// 									if ($return1) {
	// 										$json = json_encode(array(
	// 											'code' => 'success',
	// 											'msg' => 'Borrow successfully!'
	// 										));
	// 										echo $json;
	// 									} else {
	// 										$json = json_encode(array(
	// 											'code' => 'fail',
	// 											'msg' => 'SQL Error!'
	// 										));
	// 										echo $json;
	// 									}
	// 								} else {
	// 									$json = json_encode(array(
	// 										'code' => 'fail',
	// 										'msg' => 'Book has been deleted!'
	// 									));
	// 									echo $json;
	// 								}
	// 							} else {
	// 								$json = json_encode(array(
	// 									'code' => 'fail',
	// 									'msg' => 'Book has been borrowed!'
	// 								));
	// 								echo $json;
	// 							}
	// 						} else {
	// 							$json = json_encode(array(
	// 								'code' => 'fail',
	// 								'msg' => 'Book has been ordered!'
	// 							));
	// 							echo $json;
	// 						}
	// 					} else {
	// 						$json = json_encode(array(
	// 							'code' => 'fail',
	// 							'msg' => 'This book is not exist!'
	// 						));
	// 						echo $json;
	// 					}
	// 				} else {
	// 					$json = json_encode(array(
	// 						'code' => 'fail',
	// 						'msg' => 'You can not borrow more than 3 books!'
	// 					));
	// 					echo $json;
	// 				}
	// 			} else {
	// 				$json = json_encode(array(
	// 					'code' => 'fail',
	// 					'msg' => 'You need to pay the penal!'
	// 				));
	// 				echo $json;
	// 			}
	// 		} else {
	// 			$json = json_encode(array(
	// 				'code' => 'fail',
	// 				'msg' => 'This reader is not exist!'
	// 			));
	// 			echo $json;
	// 		}
	// 	} else {
	// 		$json = json_encode(array(
	// 			'code' => 'fail',
	// 			'msg' => 'Please Login!'
	// 		));
	// 		echo $json;
	// 	}
	// }

	public function borrowBook()
	{
		if (cookie('staffAccount') != '') {
			$card_id = $_POST['cardId'];
			$book_id = $_POST['borbookId'];
			$book_id = intval($book_id);
			$bor_time = date('Y-m-d');
			$bor_length = 0;
			$cost = 0.00;
			$staff_id = $_POST['staffId'];
			$user_id;
			$sql0 = " select user_id from lib_user where card_id='" . $card_id . "' ";
			$user = D('User');
			$return0 = $user->query($sql0);//检查用户是否存在
			if ($return0) {
				$user_id = $return0[0]['user_id'];
				$borrow = D('Borrow');
				$book = D('Book_unique');
				$order = D('Order');
				$del = D('Remove');
				$sql2 = "insert into lib_borrow (user_id,book_id,bor_time,bor_length,cost,staff_id) 
					values( '" . $user_id . "','" . $book_id . "','" . $bor_time . "','" . $bor_length . "','" . $cost . "','" . $staff_id . "' ) ";
				$sql1 = "select * from lib_borrow where book_id='{$book_id}' ";
				$sql3 = "select sum(cost) as fine from lib_borrow where user_id='{$user_id}'";
				$sql4 = " select count(user_id) as user  from lib_borrow where user_id='{$user_id}' ";
				$sql5 = " select * from lib_book_unique where book_id='" . $book_id . "'";
				$sql6 = " select * from lib_order where book_id='{$book_id}' ";
				$sql7 = " select * from lib_remove where book_id='{$book_id}' ";
				$sql8 = " delete from lib_order where user_id='{$user_id}' ";
				$return = $borrow->query($sql1);//检查该书号是否已经被借
				$return3 = $borrow->query($sql3);//检查该用户欠款是否为零
				$return4 = $borrow->query($sql4);//检查该用户借书数量
				$return5 = $book->query($sql5);//检查是否存在这本书
				$return6 = $order->query($sql6);//检查是否被预约
				$return7 = $del->query($sql7);//检查书籍是否被删除

				$fine = $return3[0]['fine'];
				$booksum = $return4[0]['user'];
				$orderuser = $return6[0]['user_id'];//查到预约的userid，检查是否本人预约
				if ($fine == 0) {
					if ($booksum < 3) {
						if ($return5) {
							if ($return == null) {
								if ($return7 == null) {
									if ($return6 == null) {
										$return1 = $borrow->execute($sql2);//一切没有问题，将借书记录插入借书表中
										if ($return1) {
											$json = json_encode(array(
												'code' => 'success',
												'msg' => 'Borrow successfully!'
											));
											echo $json;
										} else {
											$json = json_encode(array(
												'code' => 'fail',
												'msg' => ' SQL Error '
											));
											echo $json;
										}
									}
									else if ($orderuser == $user_id) {
										$return1 = $borrow->execute($sql2);//一切没有问题，将借书记录插入借书表中
										$return8 = $order->execute($sql8);//如果借的书是自己预约的，就删除预约
										if ($return1&&$return8) {
											$json = json_encode(array(
												'code' => 'success',
												'msg' => 'Borrow successfully!'
											));
											echo $json;
										} else {
											$json = json_encode(array(
												'code' => 'fail',
												'msg' => ' SQL Erroe '
											));
											echo $json;
										}

									} else {
										$json = json_encode(array(
											'code' => 'fail',
											'msg' => 'This book has been ordered!'
										));
										echo $json;
									}
								} else {
									$json = json_encode(array(
										'code' => 'fail',
										'msg' => 'This book has been deleted!'
									));
									echo $json;
								}
							} else {
								$json = json_encode(array(
									'code' => 'fail',
									'msg' => 'This book is be borrowing!'
								));
								echo $json;
							}

						} else {
							$json = json_encode(array(
								'code' => 'fail',
								'msg' => 'this book is not exist!'
							));
							echo $json;
						}
					} else {
						$json = json_encode(array(
							'code' => 'fail',
							'msg' => 'Reaching the upper limit of borrowing books!'
						));
						echo $json;
					}
				} else {
					$json = json_encode(array(
						'code' => 'fail',
						'msg' => 'Penalty has not be returned!'
					));
					echo $json;
				}
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'This user is not found!'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'cookie exprie'
			));
			echo $json;
		}
	}


	//select book that being returning
	//shi jiahui
	public function fine()
	{
		if (cookie('staffAccount') != '') {

			$book1 = $_POST['bookId'];
			$book = intval($book1);

			$Borrow = D('Borrow');
			$sql = "select * from lib_borrow join lib_user using(user_id) where book_id='" . $book . "' ";
			$return = $Borrow->query($sql);

			if ($return) {
				echo json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'This book is not been borrowed!'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login!'
			));
			echo $json;
		}
	}

	//Update reader's information
	public function updateUser()
	{
		if (cookie('staffAccount') != '') {
			$name = $_POST['name'];
			$userid = $_POST['user_id'];
			$password = $_POST['password'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$card_id = $_POST['card_id'];

			$user = D('User');

			$sql = "update lib_user set name = '" . $name . "',email = '" . $email . "',password='" . $password . "' ,
					address='" . $address . "',card_id='" . $card_id . "'	where user_id = '" . $userid . "'";
			$return = $user->execute($sql);
			if ($return) {
				$json = json_encode(array(
					'code' => 'success',
					'msg' => 'Modify successfully!'
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'SQL Error!'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login!'
			));
			echo $json;
		}
	}

	//add notice
	//qu zhuohan
	public function addNotice()
	{
		if (cookie('staffAccount') != '') {

			$notice_title = $_POST['notice_title'];
			$notice_body = $_POST['notice_body'];
			$notice = D('Notice');


			$sql = " insert into lib_notice (notice_title,notice_body,release_time,staff_id) 
					values( '" . $notice_title . "','" . $notice_body . "'
					,'" . date('Y-m-d') . "','" . cookie('staffAccount') . "' )   ";
			$return = $notice->execute($sql);
			$sql1 = "select * from lib_notice where notice_title='{$notice_title}' order by notice_id desc";
			$return1 = $notice->query($sql1);

			if ($return) {
				$json = json_encode(array(
					'code' => 'success',
					'msg' => 'Add successfully!',
					'things' => $return1
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'SQL Error'
				));
				echo $json;
			}


		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login!'
			));
			echo $json;
		}
	}
	
	//delete notice
	//shi jiahui
	public function removeNotice()
	{
		if (cookie('staffAccount') != '') {
			$noticeId = $_POST['notice_id'];
			$notice = D('Notice');
			$sql = "delete from lib_notice where notice_id = '" . $noticeId . "'";
			$return = $notice->execute($sql);
			if ($return) {
				$json = json_encode(array(
					'code' => 'success',
					'msg' => 'Remove successfully!'
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'SQL Error'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login!'
			));
			echo $json;
		}
	}

	//get notice list
	//shi jiahui
	public function getNotice()
	{
		if (cookie('staffAccount') != '') {
			$user = D('Notice');
			$sql = "select * from lib_notice";
			$return = $user->query($sql);
			if ($return) {
				echo json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'SQL Error!'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login！'
			));
			echo $json;
		}
	}

	//cunyi!!!
	public function incomeMonth()
	{

		if (cookie('staffAccount') != '') {
			$user = D('User');
			$sql = "SELECT
				MONTH(date) as date,
				sum(fine) as fine,
				sum(security_deposit) AS deposit,
				sum(total) as total
			FROM
				lib_daily_income
			GROUP BY MONTH(date)
			order by date desc;";

			$return = $user->query($sql);
			if ($return) {
				echo json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'sql error'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login！'
			));
			echo $json;
		}
	}

	//cunyi!!!
	public function incomeWeek()
	{
		if (cookie('staffAccount') != '') {
			$user = D('User');
			$sql = "SELECT
				WEEK(date) as date,
				sum(fine) as fine,
				sum(security_deposit) AS deposit,
				sum(total) as total
				FROM
				lib_daily_income
				GROUP BY WEEK(date)
				order by date desc;";
			$return = $user->query($sql);
			if ($return) {
				echo json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'sql error'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login！'
			));
			echo $json;
		}




	}

	//cunyi!!!
	public function incomeDay()
	{

		if (cookie('staffAccount') != '') {
			$user = D('User');
			// $sql = "		select * from
			// (SELECT
			// 	count(*)*300 AS deposit,
			// 	register_time as dateTime
			// FROM
			// 	lib_user
			// GROUP BY register_time ) as a  left join
			
			// (SELECT
			// 	sum(fine) AS fine,
			//   ret_time as dateTime
			// FROM
			// 	lib_return
			// GROUP BY ret_time) as b using(dateTime)";
			$sql = "select * from lib_daily_income order by date desc;";
			$return = $user->query($sql);
			if ($return) {
				echo json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'sql error'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login！'
			));
			echo $json;
		}



	}

	//get category list
	//shi jiahui
	public function getCategoryList()
	{
		if (cookie('staffAccount') != '') {
			// sql
			$category = D('Category');
			$sql = "SELECT * FROM lib_category;";
			$return = $category->query($sql);
			$result = array();
			for ($k = 0; $k < count($return); $k++) {
				array_push($result, $return[$k]['category']);
			}
			if ($return) {
				$json = json_encode(array(
					'code' => 'success',
					'data' => json_encode($return),
					'cat' => json_encode($result)
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'SQL Error!'
				));
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login！'
			));
			echo $json;
		}
	}

	//add category
	//shi jiahui
	public function addCategory()
	{
		if (cookie('staffAccount') != '') {
			$category = $_POST['category'];
			$sql = "insert into lib_category (category,add_date,staff_id) 
					values('" . $category . "','" . date('Y-m-d') . "','" . cookie('staffAccount') . "') ";
			$cate = D('Category');
			$return = $cate->execute($sql);

			if ($return) {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'Add successfully!'
				));
				echo $json;

			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'SQL Error!'
				));
				echo $json;
			}

		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login!'
			));
			echo $json;
		}

	}

	//update Category
	//qu zhuohan
	public function updateCate()
	{
		if (cookie('staffAccount') != '') {
			$category = $_POST['upcategory'];
			$category_id = $_POST['upcategory_id'];
			$sql = " update lib_book_species set category = '{$category}' where category in 
					(select category from lib_category where category_id = {$category_id});
					update lib_category set  category='" . $category . "' where category_id='" . $category_id . "';
					";
			$cate = D('Category');
			$return = $cate->execute($sql);

			if ($return) {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'Modify successfully!'
				));
				echo $json;

			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'SQL Error!'
				));
				echo $json;
			}

		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login!'
			));
			echo $json;
		}
	}
	
	
	//manage location
	public function getLocationList()
	{
		if (cookie('staffAccount') != '') {
			// sql
			$location = D('Location');
			$sql = "SELECT * FROM lib_location;";
			$return = $location->query($sql);
			if ($return) {
				$json = json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'SQL Error!'
				));
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login！'
			));
			echo $json;
		}
	}

	//add Location
	public function addLocation()
	{
		if (cookie('staffAccount') != '') {
			$floor = $_POST['floor'];
			$sql = " insert into lib_location (floor,bookshelf,add_date,staff_id) 
					values('" . $floor . "','20','" . date('Y-m-d') . "','" . cookie('staffAccount') . "') ";
			$cate = D('Location');
			$return = $cate->execute($sql);

			if ($return) {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'Add successfully!'
				));
				echo $json;

			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'SQL Error!'
				));
				echo $json;
			}

		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'Please Login!'
			));
			echo $json;
		}
	}

	//cunyi!!!
	public function updateLocation()
	{
		if (cookie('staffAccount') != '') {
			$floor = $_POST['upfloor'];
			$shelf = $_POST['upshelf'];
			$location_id = $_POST['uplocation_id'];
			$sql = " update lib_location set  floor='" . $floor . "',bookshelf='" . $shelf . "' where location_id='" . $location_id . "' ";
			$cate = D('Location');
			$return = $cate->execute($sql);

			if ($return) {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'modify successful!'
				));
				echo $json;

			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'modify fail!'
				));
				echo $json;
			}

		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'cookie exprie!'
			));
			echo $json;
		}
	}

	//cunyi!!!
	public function getFloorShelf()
	{
		if (cookie('staffAccount') != '') {
			$location = D('Location');
			$sql = "select * from lib_location";
			$return = $location->query($sql);
			if ($return) {
				$json = json_encode(array(
					'code' => 'success',
					'data' => json_encode($return)
				));
				echo $json;
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'fail'
				));
				echo $json;
			}

		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'cookie exprie!'
			));
			echo $json;
		}
	}

	//cunyi!!!
	public function payBook()
	{
		if (cookie('staffAccount') != '') {
			$borrow = D('Borrow');
			$book = D('Book_species');
			$bookid = $_POST['bookId'];
			$bookId = intval($bookid);
			$sql1 = " select lib_book_species.price as price,lib_borrow.user_id as user_id,lib_borrow.cost as cost,lib_borrow.bor_time as bor_time
					from lib_book_species,lib_borrow,lib_book_unique 
					where lib_book_unique.book_id = '" . $bookId . "' and lib_borrow.book_id = '" . $bookId . "'
					and lib_book_unique.isbn=lib_book_species.isbn  ";
			$sql0 = " select * from lib_borrow where book_id='" . $bookId . "' ";
			$return0 = $borrow->query($sql0);
			if ($return0) {
				$return1 = $book->query($sql1);
				if ($return1) {
					$json = json_encode(array(
						'code' => 'success',
						'data' => json_encode($return1)
					));
					echo $json;

				} else {
					$json = json_encode(array(
						'code' => 'fail',
						'msg' => 'query fail!'
					));
					echo $json;
				}
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'this book is not be borrowed !'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'cookie exprie!'
			));
			echo $json;
		}
	}
	//交罚款
///cunyi!!!
	public function Pay()
	{
		if (cookie('staffAccount') != '') {
			$bookId = $_POST['bookId'];
			$staffId = $_POST['staffId'];
			$userId = $_POST['userid'];
			$sum = $_POST['penal'];
			$price = $_POST['price'];
			//$reason = $_POST['reason'];
			$bookId = intval($bookId);
			$lost = D('Lost');
			$remove = D('Remove');
			$borrow = D('Borrow');
			$sql0 = " insert into lib_lost (book_id,user_id,price,cost,staff_id) values('{$bookId}','{$userId}','{$price}','{$sum}','{$staffId}'  ) ";
			$sql1 = " insert into lib_remove (book_id,reason,remove_time,staff_id) values('{$bookId}','lost','" . date('Y-m-d') . "','$staffId') ";
			$sql2 = " delete from lib_borrow where book_id='{$bookId}' ";
			$return0 = $lost->execute($sql0);
			$return1 = $remove->execute($sql1);
			$return2 = $borrow->execute($sql2);
			if ($return0) {
				if ($return2) {
					if ($return1) {
						$json = json_encode(array(
							'code' => 'fail',
							'msg' => 'pay success!'
						));
						echo $json;

					} else {
						$json = json_encode(array(
							'code' => 'fail',
							'msg' => 'delete fail!'
						));
						echo $json;
					}
				} else {
					$json = json_encode(array(
						'code' => 'fail',
						'msg' => 'delete fail!'
					));
					echo $json;
				}
			} else {
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'pay fail!'
				));
				echo $json;
			}
		} else {
			$json = json_encode(array(
				'code' => 'fail',
				'msg' => 'cookie exprie!'
			));
			echo $json;
		}

	}



	public function forgetPassword()
	{
		$account = $_POST['account'];
		if($account==""){
			$json = json_encode(array(
				'msg' => "Please input your account first!"
			));
			echo $json;
		}else{
			$pswd = D('Staff');
			$sql = "select * from lib_staff where staff_id = {$account}";
			$return = $pswd->query($sql);
			if($return){
				$password = $return[0]['password'];
				$tel = $return[0]['tel'];
				$name = $return[0]['name'];
				$url = "http://sms.106jiekou.com/utf8/sms.aspx";
				$curlPost = "account=quzhuohan&password=qzh13181981175&mobile={$tel}&content=".rawurlencode("您的订单编码：Hello, {$name}! Your password is {$password}。如需帮助请联系客服。");
//"Hello, {$name}! Your password is {$password}"

				$curl = curl_init();
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_HEADER, false);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_NOBODY, true);
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
				$return_str = curl_exec($curl);
				curl_close($curl);

				$json = json_encode(array(
					'msg' => "Please wait a minite and see your password on your cell phone!"
				));
				echo $json;
			}else{
				$json = json_encode(array(
					'msg' => "This account is not exist!"
				));
				echo $json;
			}
		}
	
	}
	 






}



?>