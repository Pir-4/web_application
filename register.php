

<!DOCTYPE html>
<html lang="en">
<body>
<div class="container mregister">
<div id="login">
 <h1>Регистрация</h1>
<form action="register.php" id="registerform" method="get"name="registerform">
 <p><label for="user_login">Полное имя<br>
 <input class="input" id="full_name" name="full_name"size="32"  type="text" value=""></label></p>
<p><label for="user_pass">E-mail<br>
<input class="input" id="email" name="email" size="32"type="email" value=""></label></p>
<p><label for="user_pass">Имя пользователя<br>
<input class="input" id="username" name="username"size="20" type="text" value=""></label></p>
<p><label for="user_pass">Пароль<br>
<input class="input" id="password" name="password"size="32"   type="test" value=""></label></p>
<p class="submit"><input class="button" id="register" name= "register" type="submit" value="Зарегистрироваться"></p>
	  <p class="regtext">Уже зарегистрированы? <a href= "login.php">Введите имя пользователя</a>!</p>
 </form>
</div>
</div>
</body>
</html>
<?php
require("constants.php");

if(isset($_GET["register"]))
{
	if(!empty($_GET['full_name']) && !empty($_GET['email']) && !empty($_GET['username']) && !empty($_GET['password'])) 
	{
  		$full_name= htmlspecialchars($_GET['full_name']);
		$email=htmlspecialchars($_GET['email']);
 		$username=htmlspecialchars($_GET['username']);
 		$password=htmlspecialchars($_GET['password']);
 		$query=mysql_query("SELECT * FROM users WHEREusername='".$username."'");
  		$numrows=mysql_num_rows($query);

		if($numrows==0)
   		{
			$sql="INSERT INTO users (full_name, email, username,password)
			VALUES('$full_name','$email', '$username', '$password')";
 			$result=mysql_query($sql);
			echo mysql_error();
			
 			if($result){
				$message = "Account Successfully Created";
			} 
			else 
			{
 				$message = "Failed to insert data information!";
  			}
		} 
		else 
		{
			$message = "That username already exists! Please try another one!";
   		}
	} 
	else 
	{
		$message = "All fields are required!";
	}
}
?>

<?php if (!empty($message)) {echo "<p class=\"error\">" . "MESSAGE: ". $message . "</p>";} ?>
