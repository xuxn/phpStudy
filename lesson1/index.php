<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php
	//echo phpinfo();
	//连接数据库
	$db=mysqli_connect("www.phpstudy.local","root","root","test")or die ("database not connection");
 
	//定义变量
 	// $first_name=$_POST['first_name'];
 	// $last_name=$_POST['last_name'];
 	// $email=$_POST['email'];
 	// $outer_form=flase;
 	// $subject=$_POST['subject'];
 	// $message=$_POST['message'];

 	 

 	//显示数据库内容
 	//$query="INSERT INTO email_list(first_name,last_name,email) VALUES('$first_name','$last_name','$email')";
	$query="select * from email_list"; 
	$res=mysqli_query($db,$query);  
	
	if($res){
		echo "<table><tr><th>ID</th><th>FirstName</th><th>LastName</th><th>Email</th></tr>";
		while( $row=mysqli_fetch_array($res)){
			echo "<tr><td>".$row['id']."</td><td>".$row['first_name']."</td><td>".$row['last_name']."</td><td>".$row['email']."</td></tr>";
		} 
		echo "</table>";
	}else{
		die("fetch data failed!");
	}

	//判断表单是否提交
	if(isset($_POST['submit'])){
		//判断主题和邮件内容是否为空
		if((empty($subject))&& (empty($message))){
			$outer_form=true;
			echo "主题和邮件内容都不能为空！";
		}
		if((empty($subject)) && (!empty($message))){
			$outer_form=true;
			echo "邮件内容不能为空！";
		}
		if((!empty($subject)) && (empty($message))){
			$outer_form=true;
			echo "主题内容不能为空！";
		}
		if((!empty($subject)) && (!empty($message))){
			$outer_form=false;
			//mail($to,$subject,$message,$form); 
		}
	}else{
		//表单未提交过
		$outer_form=true;
	}

  	//关闭数据库连接
	mysqli_close($db);

	//判断是否显示表单
	if($outer_form){
 ?>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  	<table>
  		<tr><td>Subject:</td><td><input type="text" name="subject" placeholder="请输入邮件主题"></td></tr>
  		<tr><td>Email Body:</td><td><textarea name="message" placeholder="请输入邮件内容"></textarea></td></tr>
  		<tr><td><button type="submit" name="submit">发送邮件</button></td></tr>
  	</table>
  </form>
  <?php
  }
?>
</body>
</html>