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
                    <form id="data" action="calculator.php" method="post">
                    <label for="Text">Введите данные</label> <br />
                    <label for="male">Муж</label><input type="radio" name="sex" id="male" > 
                    <label for="female">Жен</label><input type="radio" name="sex" id="female" checked > <br />
                
                    <label for="weight">Вес, кг</label> <input type="text" name="weightkg" id="weightkg" size="3" maxlength="3" required/><br>
                    <label for="height">Рост, см</label> <input type="text" name="heightsm" id="heightsm" size="3" maxlength="3" required/> <br>
                    <label for="age">Возраст</label> <input type="text" name="ageyear" id="ageyear" size="3" maxlength="3" required/><br> 
                 
                    <label>Физическая активность</label>     
                    <select id="activity">  
                    <option selected="selected" value="1.2">Низкая</option>
                    <option value="1.4">Средняя</option>
                    <option value="1.55">Высокая</option>
                    </select></br>
                    
                    <script type="text/javascript">
                    function formula()
                    {
                        //получаем значения текстовых полей
                        var e = document.getElementById("activity");
                        var value1 = e.options[e.selectedIndex].value;
                        var weightkg = document.getElementById("weightkg").value;
                        var heightsm = document.getElementById("heightsm").value;
                        var ageyear = document.getElementById("ageyear").value;
                        //если все три строки пустые сообщаем об этом
                        if(weightkg.length == 0 && heightsm.length == 0 && ageyear.length == 0) 
                            {
                                alert("Не введены цифры!");
                                return false;
                            }
                        //если строка пустая сообщаем об этом
                        if(weightkg.length == 0)
                            {
                                alert("Вы не ввели число в первом поле!");
                                return false;
                            }
                        else if(heightsm.length == 0)
                            {
                                alert("Вы не ввели число во втором поле!");
                                return false;  
                            }
                        else if(ageyear.length == 0)
                            {
                                alert("Вы не ввели число в третьем поле!");
                                return false;
                            }
                        //если в строке не цифры сообщаем об этом
                        if(weightkg >= 0)
                            {    
                            }else{
                                alert("В первом поле не числовое значение! ");
                                return false;
                            }
                       if(heightsm >= 0)
                            {
                            }else{
                                alert("Во втором поле не числовое значение! ");
                                return false;
                            }
                       if(ageyear >= 0)
                            { 
                            }else{
                                alert("В третьем поле не числовое значение! ");
                                return false;
                            }  
                            
                       if(document.getElementById("male").checked=="1"){
                                var calories = ((88.36 + 4.8 * heightsm + 13.4 * weightkg - 5.7 * ageyear) * value1); //формула
                       }     
                         else{
                                var calories = ((447.6 + 3.1 * heightsm + 9.2 * weightkg - 4.3 * ageyear) * value1);
                         }     
            
                                var water = (35*weightkg); 
                       document.getElementById("calories").innerText = calories;   //калории
                       document.getElementById("cals").value=calories;
                       
                    }
                                
                                
                    </script>
            
                        <div class="container">
                            <input type="button" class="button1" value="Посчитать количество калорий, ккал" onclick="formula()"/> 
                            <div id="calories" class="in-container" ></div>
                        </div>
                            <input type="hidden" id="cals" name="calories" />
                    
                    <script type="text/javascript">
                    function formula1()
                    {
                        //получаем значение
                        var weightkg = document.getElementById("weightkg").value;  
                        if(weightkg.length == 0){
                                alert("Вы не ввели число!");
                                return false;
                            }
                        if(weightkg >= 0)
                            {    
                            }else{
                                alert("В поле не числовое значение!");
                                return false;
                            }    
                        if(!weightkg==0){
                            var water = (35*weightkg);
                        }     
                        document.getElementById("water").innerText = water;      
                        document.getElementById("wat").value=water;          
                    }               
                    </script>
                    
                    
                            <div class="container">
                            <input type="button" class="button1" value="Посчитать количество воды, мл" onclick="formula1()" /> 
                            <div id="water" class="in-container"></div>
                            <input type="hidden" id="wat" name="water" />
                            </div>
                        
                        
                        <div class="container">
                        <input type="submit" class="button1" name="save_data" value="Сохранить данные"/>
                        <?php
                         $connect = mysql_connect("localhost","student123","JuliaLee") or die(mysql_error());
                         mysql_select_db("my_base");
                         if(isset($_POST['save_data'])){
                         
                         $weight = $_POST['weightkg'];
                         $height = $_POST['heightsm'];
                         $age = ($_POST['ageyear']);
                         $calories = ($_POST['calories']);
                         $water = ($_POST['water']);

                         if(isset($_SESSION['name'])){
                         $query = sprintf("INSERT INTO users_data VALUES (NULL,'%s','%s','%d','%d', '%d', '%f','%d')",$_SESSION['name'],date("Y-m-d"), $weight,$height,$age,$calories,$water);
                         $result = mysql_query($query);
                         mysql_close($connect);
                         
                         if($result){
                         echo "<p style=\"display: inline-block\">Данные успешно сохранены!</p>";
                         }
                         else
                         {
                            echo "<p style=\"display: inline-block\">Произошла ошибка</p>";
                         }
                         }
                        
                         else{
                            echo "<p style=\"display: inline-block\">Для сохранения данных необходимо авторизоваться!</p>";
                            }
                        unset($_POST['save_data']);
                        }
                        ?>
                        
                        
                        </div>
                        </form>
        </div>
            <?php
            include("include/footer.php");
            ?>
	</body>
</html>