<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php

	$db=mysqli_connect("www.phpstudy-lesson1.local","root","root","test")or die ("database not connection");
 

 	$first_name=$_POST['first_name'];
 	$last_name=$_POST['last_name'];
 	$email=$_POST['email'];
 	$subject=”注册成功“;
 	$message="欢迎成为我们的会员！";
 	$from = "xuxn@qq.com";
	$headers = "From: $from";


 	$query="INSERT INTO email_list(first_name,last_name,email) VALUES('$first_name','$last_name','$email')";

 	if (isset($_POST['action']) && $_POST['action'] == 'submitted') {  
	 	mysqli_query($db,$query) or die ("querying is failed");

	 	mail($email,$subject,$message,$headers);
	}
 
	// $query="select * from email_list"; 
	// $res=mysqli_query($db,$query)or die(mysql_error());  
	
	// if($res){
	// 	while( $row=mysqli_fetch_array($res)){
	// 	    echo "<div>".$row['first_name'].$row['last_name']."</div>";  
	// 	} 
	// }else{
	// 	die("fetch data failed!");
	// }
  
	mysqli_close($db);
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<table>
		<tr><td>FirstName:</td><td><input type="text" name="first_name"></td></tr>
		<tr><td>LastName:</td><td><input type="text" name="last_name"></td></tr>
		<tr><td>Email:</td><td><input type="text" name="email"></td></tr>
		<tr><td><button type="submit" name="submit">注册</button></td></tr>
	</table>
</form>

</body>
</html>