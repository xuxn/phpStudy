<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<?php
	$db=mysqli_connect("www.phpstudy.local","root","root","lesson2")or die ("cannot connection database"); 

	@$name=$_POST['name'];
	@$score=$_POST['score'];
	@$screenshot=$_POST['screenshot'];
	@$submit=$_POST['submit'];

	$query="INSERT INTO guitar(id,name,score,date_time,screenshot) VALUES('0', '$name','$score','NOW()','$screenshot')"; 
	mysqli_query($db,$query);
	if($submit){
		mysqli_query($db,$query);
	}

?>	
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
	<label for="name">NAME:</label><input type="text" name="name"><br/>
	<label for="score">SCORE:</label><input type="text" name="score"><br/>
	<label for="screenshot">SCREENSHOT:</label><input type="file" name="screenshot"><br/>
	<button type="submit" name="submit">提交</button>
</form> 
</body>
</html>