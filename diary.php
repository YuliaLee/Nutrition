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
			<div class="diary">
                <?php
	             $connect = mysql_connect("localhost","student123","JuliaLee") or die(mysql_error());
                 mysql_select_db("my_base"); 
                 $login = $_SESSION['name']; 
                 if(isset($_SESSION['name'])){
                 $result = mysql_query("SELECT * FROM users_data WHERE login='" .$login . "'" );
                 echo '<table class="table_diary">';
                 echo '<tr>';
                    echo '<td>Дата</td>';
                    echo '<td>Вес,кг</td>';
                    echo '<td>Рост,см</td>';
                    echo '<td>Возраст</td>';
                    echo '<td>Калории,ккал</td>';
                    echo '<td>Вода,мл</td>';
                 echo '<tr>';
                 while($myrow = mysql_fetch_array($result)){
                    echo '<tr>';
                    echo '<td>'.$myrow['date'].'</td>';
                    echo '<td>'.$myrow['weight'].'</td>';
                    echo '<td>'.$myrow['height'].'</td>';
                    echo '<td>'.$myrow['age'].'</td>';
                    echo '<td>'.$myrow['calories'].'</td>';
                    echo '<td>'.$myrow['water'].'</td>';
                    echo '<tr>';
                 }
                 echo '</table>';
                 }
                 else {
                   echo '<p style=" font-size: 0.9em;
                margin:center ;
            	letter-spacing: -1px;
            	text-decoration: none;
            	text-transform: uppercase;
            	color: #FF3867;
            	letter-spacing: 0.25em;
            	padding: 5px 5px 0 10px;
            	transition: background-color .25s ease-in-out;
            	-moz-transition: background-color .25s ease-in-out;
            	-webkit-transition: background-color .25s ease-in-out;">Для просмотра дневника необходимо авторизоваться</p>'; 
                 }  
                ?>
                
                
			</div>
        <?php
        include("include/footer.php");
        ?>
	</body>
</html>