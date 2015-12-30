<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
        <meta http-equiv="content-type" content="text/html; charset='utf-8'"/>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>Nutrition</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
            <div id="auth">
                <?php  
                  $connect = mysql_connect("localhost","student123","JuliaLee") or die(mysql_error());
                  mysql_select_db("my_base");
                   if(isset($_POST['enter'])){
                    $e_login = $_POST['e_login'];
                    $e_password = md5($_POST['e_password']);
                    
                    $query = mysql_query("SELECT * FROM users WHERE login = '$e_login'");
                    $user_data = mysql_fetch_array($query);
                    
                    if($user_data['password']==$e_password){
                    $_SESSION['name']=$e_login;
                    }
                   }
                
                   if(isset($_POST['logout'])){
                    unset($_SESSION['name']);
                    session_destroy();
                   }
                
                   
                   if(isset($_SESSION['name'])){
                    echo '<p style="float:right;  font-size: 0.9em;
                	letter-spacing: -1px;
                	text-decoration: none;
                	text-transform: uppercase;
                	color: #FF3867;
                	letter-spacing: 0.25em;
                	padding: 9px 5px 0 5px;
                	transition: background-color .25s ease-in-out;
                	-moz-transition: background-color .25s ease-in-out;
                	-webkit-transition: background-color .25s ease-in-out;">Здравствуйте, '.$_SESSION['name'].'! </p> </br>
                    <form method="post" action="index.php" align="right"><br>
                    <input type="submit" name="logout" value="Выйти" class="button1"/>
                    </form>' ;
                   }
                   else{
                    echo "<form id=\"auth \"method=\"post\" action=\"index.php\" align=\"right\">
                            <input type=\"Text\" name=\"e_login\" placeholder=\" Введите логин\" required/><br />
                            <input type=\"Password\" name=\"e_password\" placeholder=\" Введите пароль\" required /><br />
                            <input type=\"submit\" class=\"button1\" name=\"enter\" value=\"Войти\"/><br />
                            </form>";
                   }                      
                ?>
                </div>                
            	<div id="logo">
					<h1><a href="index.php">Диетолог</a><img class="alignleft" src="images/apple1.png"/></h1>   
				</div>
                        <?php 
                        include("include/menu.php");
                        ?>
			    </div>
		        <div id="splash1">
                <div class="post">
                <h2>Здравствуйте!</h2>
                <p>
			         Данный сайт предназначен для контролирования своей среднесуточной нормы калорий и количества необходимой воды для поддержания нормальсной жизнедеятельности организма.
			    </p>
            </div>
			</div>
                <?php
                include("include/footer.php");
                ?>
	</body>
</html>