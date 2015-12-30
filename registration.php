<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <meta http-equiv="content-type" content="text/html; charset=windows-1251"/>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>Nutrition</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>

		<div id="wrapper">
			<div id="header">
                <?php 
                include("include/auth.php");
                ?>
				<div id="logo">
					<h1><a href="index.php">Диетолог</a><img class="alignleft" src="images/apple1.png"/></h1>
                    
				</div>
                 <?php 
                 include("include/menu.php");
                 ?>
			</div>
             
		<div class="splash">
          <?php  
              $connect = mysql_connect("localhost","student123","JuliaLee") or die(mysql_error());
              mysql_select_db("my_base");
            
               if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $login = $_POST['login'];
                $password = ($_POST['password']);
                $r_password = ($_POST['r_password']);
               
                $result=mysql_query("SELECT login FROM users WHERE login='$login'");
                $row=mysql_fetch_assoc($result);               
                        
                if($row==true){
                    echo '<p style="float:right;  font-size: 0.9em;
                margin:center ;
            	letter-spacing: -1px;
            	text-decoration: none;
            	text-transform: uppercase;
            	color: #FF3867;
            	letter-spacing: 0.25em;
            	padding: 5px 5px 0 10px;
            	transition: background-color .25s ease-in-out;
            	-moz-transition: background-color .25s ease-in-out;
            	-webkit-transition: background-color .25s ease-in-out;">Логин занят!</p>'; 
                }
                else if($password==$r_password){
                $password = md5($password);    
                $query = mysql_query("INSERT INTO users VALUES ('$username', '$login', '$password', '')") or die(mysql_error());
                    echo '<p style="float:right;  font-size: 0.9em;
                margin:center ;
            	letter-spacing: -1px;
            	text-decoration: none;
            	text-transform: uppercase;
            	color: #FF3867;
            	letter-spacing: 0.25em;
            	padding: 5px 5px 0 10px;
            	transition: background-color .25s ease-in-out;
            	-moz-transition: background-color .25s ease-in-out;
            	-webkit-transition: background-color .25s ease-in-out;">Авторизация прошла успешно!</p>';  
                
                }
                else{   
             echo '<p style="float:right;  font-size: 0.9em;
                margin:center ;
            	letter-spacing: -1px;
            	text-decoration: none;
            	text-transform: uppercase;
            	color: #FF3867;
            	letter-spacing: 0.25em;
            	padding: 5px 5px 0 10px;
            	transition: background-color .25s ease-in-out;
            	-moz-transition: background-color .25s ease-in-out;
            	-webkit-transition: background-color .25s ease-in-out;">Пароли должны совпадать!</p>'; 
                }   
               }
            ?>   
				  <form id="reg_in" method="post" action="registration.php">
				  <input type="Text" name="username" placeholder=" Введите имя" required /><br />
				  <input type="Text" name="login" placeholder=" Введите логин" required/><br />
				  <input type="Password" name="password" placeholder=" Введите пароль" required/><br />
				  <input type="Password" name="r_password" placeholder=" Повторите пароль" required/><br />
				  <input type="submit" class="button1" name="submit" value="Зарегистрироваться"/><br />
				  </form> 
        
        
        </div>
            <?php
            include("include/footer.php");
            ?>
	</body>  
</html>