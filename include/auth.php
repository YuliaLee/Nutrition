                <div id="auth"> 
                    <?php
                        if($_SESSION['name']){
                        echo '<p style="float:right;  font-size: 0.9em;
                    	letter-spacing: -1px;
                    	text-decoration: none;
                    	text-transform: uppercase;
                    	color: #FF3867;
                    	letter-spacing: 0.25em;
                    	padding: 9px 5px 0 10px;
                    	transition: background-color .25s ease-in-out;
                    	-moz-transition: background-color .25s ease-in-out;
                    	-webkit-transition: background-color .25s ease-in-out;">Здравствуйте, '.$_SESSION['name'].'! </p> </br>
                        <form method="post" action="index.php" align="right"><br>
                        <input type="submit" name="logout" value="Выйти" class="button1"/>
                        </form>' ;
                        }
                     ?>
                </div>