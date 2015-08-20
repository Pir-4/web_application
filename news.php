<!DOCTYPE html>
	<html lang="en">
	<head>
</head> 
<body>
<div class="container mlogin">
<div id="login">
<h1>Новости</h1>
<form action="" id="newsform" method="get"name="newsform">
<p><label for="newsid">Номер новости<br>
<input class="input" id="id" name="id"size="20"
type="int" value=""></label></p>
	<p class="submit"><input class="button" name="news" type= "submit" value="Search"></p>
	<p class="regtext">Войти в аккаунт? <a href= "login.php">Введите имя пользователя</a>!</p>
   </form>
 </div>
  </div>
</body>
</html>
<?php
require("constants.php");
if(isset($_GET["news"]))
{
	$id = $_GET['id'];
	$st = "SELECT * FROM news WHERE id=$id";
	$query =mysql_query($st);
	echo mysql_error();

	while($row=mysql_fetch_assoc($query))
	{
		//print_r( $row);
		printf($row['news']." ".$row['username']);
	}
}
?>
