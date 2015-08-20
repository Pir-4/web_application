<!DOCTYPE html>
	<html lang="en">
	<head>
</head> 
<body>
<div class="container mlogin">
<div id="login">
<h1>Вход</h1>
<form action="" id="loginform" method="get"name="loginform">
<p><label for="user_login">Имя опльзователя<br>
<input class="input" id="username" name="username"size="20"
type="text" value=""></label></p>
<p><label for="user_pass">Пароль<br>
 <input class="input" id="password" name="password"size="20"
  type="text" value=""></label></p> 
	<p class="submit"><input class="button" name="login" type= "submit" value="Log In"></p>
	<p class="regtext">Еще не зарегистрированы?<a href= "register.php">Регистрация</a>!</p>
	<p class="regtext">Хотите посмотреть новости?<a href= "news.php">Новости</a>!</p>
   </form>
 </div>
  </div>
</body>
</html>

<?php
require("constants.php");
	
if(isset($_GET["login"]))
{

	if(!empty($_GET['username']) || !empty($_GET['password']))
	{
		$username=$_GET['username'];
		$password=$_GET['password'];
		$st = "SELECT * FROM users WHERE username='$username' AND password='$password' ";
		//$st = "SELECT * FROM users WHERE username='$username'";
		$query =mysql_query($st);
		$numrows=mysql_num_rows($query) ;

		//$message = $st;
		echo mysql_error();
		if($numrows!= 0)
 		{
			while($row=mysql_fetch_assoc($query))
			{

				printf("Приветсвую ".$row['username']." !");
 			}
		} 
		else 
		{
			//  $message = "Invalid username or password!";
	
			echo  "Invalid username";

 		}
	} 
}
?>
<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
