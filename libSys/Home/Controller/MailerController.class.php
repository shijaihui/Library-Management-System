<?php
namespace Home\Controller;
use Think\Controller;
function mailerHelper($to,$type,$content,$subject){
		vendor('PHPMailer.PHPMailerAutoload');
		$mail = new \PHPMailer();

		$mail->SMTPDebug = 0;

		$mail->isSMTP(); //设置mailer使用SMTP协议
		$mail->Host = "smtp.qq.com"; //设置接受邮件的SMTP服务器地址
		$mail->SMTPAuth = true; //开启SMTP认证
		$mail->Username = "2461677579@qq.com";   // SMTP的用户名
		$mail->Password = "mmcvmntuwdpmecec";   //QQ邮箱的SMTP授权码
		$mail->SMTPSecure = "ssl";    //设置开启ssl认证
		$mail->Port = "465"; //端口号465或者587
		$mail->setFrom('2461677579@qq.com','lvbingxu');//设置发件人
		$mail->addAddress($to);
		// $mail->addAttachment('');//添加附件
		// $mail->addReplyTo('xxx@xx.xx','info');//增加回复标签
		// $mail->addCC(); //增加一个抄送
		// $mail->addBCC(); //增加一个密送
		if($type == 'HTML'){
			$mail->isHTML(true);	
		}
		$mail->Subject = $subject;
		$mail->Body = $content;
		if(!$mail->send()){
			return 0;
		}else{
			return 1;
		}

}
class MailerController extends Controller{
	public function sentMailerForResetPwd(){
		$account = $_POST['account'];
		$user = D('User');
		$sql = "select * from lib_user where user_id ='{$account}' ";
		$return = $user->query($sql);
		if($return){
			$content = "<!DOCTYPE html>
						<html>
						<head>
							<title>Password Reset</title>
						</head>
						<body>
							<h1>Hello , '{$account}'</h1><hr>
							<a href='http://localhost/libSys/index.php?s=/Home/index/pwdReset/account/{$account}.html'>click here to reset your password</a>
						</body>
						</html>";
			$subject = "Password Reset";
			$send = mailerHelper($return[0]['email'],'HTML',$content,$subject);
			if($send){
				$json = json_encode(array(
					'code' => 'success',
					'msg' => 'Email has been sent to your Mailer'
				));
				echo $json;
			}else{
				$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'Email send fail,please try again'
				));
				echo $json;
			}
		}else{
			$json = json_encode(array(
					'code' => 'fail',
					'msg' => 'please input your accout'
				));
			echo $json;
		}

	}
	public function remindExpire(){
		$set = D('Setting');
		$sql = "select borrow_length from lib_setting";
		$return = $set->query($sql);
		if($return){
			$length = $return[0]['borrow_length'];
			$currentDate = date("Y-m-d",strtotime("-".$length." day"));

			$borrow = D('Borrow');
			$sql2 = "select a.user_id,a.book_id,title,email,bor_time from lib_borrow a,lib_user b,lib_book_species c,lib_book_unique d where a.user_id=b.user_id and a.book_id=d.book_id and c.isbn=d.isbn and bor_time <= '{$currentDate}' ";
			$return2 = $borrow->query($sql2);
			if($return2){
				print_r($return2);
				for($i=0;$i<count($return2);$i++){
					$subject = "Overdue reminding";
					$content =  "<!DOCTYPE html>
							<html>
							<head>
								<title>{$subject}</title>
							</head>
							<body>
								<h1>Hello , '{$return2[$i]['user_id']}'</h1><hr>
								<p>You have an overdue book.</p>
								<table style='border:1px solid black'> 
										<tr>
											<th>book_id</th>
											<th>title</th>
											<th>bor_time</th>
										</tr>
										<tr>
											<td>{$return2[$i]['book_id']}</td>
											<td>{$return2[$i]['title']}</td>
											<td>{$return2[$i]['bor_time']}</td>
										</tr>
								</table>
							</body>
							</html>";
							echo $return2[$i]['email'];
					$send = mailerHelper($return2[$i]['email'],'HTML',$content,$subject);
					if($send){
						echo "success!";
					}else{
						echo "fail!";
					}
					}
			}
		}
		
	}
}
?>