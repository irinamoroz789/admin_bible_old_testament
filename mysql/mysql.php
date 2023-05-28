<?php
//	$conn = new mysqli('localhost', 'root', '', 'bible_old_testament');
    $conn = new mysqli('ivashevo.mysql', 'ivashevo_vkrmor', 'ASDJADbcds32sdfc', 'ivashevo_vkrmorozirina');
	$conn->query("SET NAMES 'utf8'");
	if($conn->connect_error){
		echo 'Error Number: '.$conn->connect_errno.'<br>';
		echo 'Error: '.$conn->connect_error;
	}

    function errorBlockHtml(){
        return <<<HTML
        <!DOCTYPE HTML>
                <html>
                <head>
                    <meta charset="utf-8">
                    <link rel="stylesheet" href="../style/style.php" media="screen">
                </head>
                <body>
    
                <div id="notfound">
                    <div class="notfound">
                        <div class="notfound-404">
                            <h1>404</h1>
                        </div>
                        <h2>Что-то пошло не так...</h2>
                        <p> <a href="../mysql/index.php">Вернуться на главную</a></p>
                    </div>
                </div>
    
                </body>
                </html>
HTML;
	}

