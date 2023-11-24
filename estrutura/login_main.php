<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body >        
        <?php
        $op = "";
        $pg = "index";       
        if (filter_input(INPUT_GET, 'pg')) {
            $op = filter_input(INPUT_GET, 'op');
            $pg = filter_input(INPUT_GET, 'pg');     
           }
        if ($pg == 'index') {
            include_once 'login_admin.php';
            }    
        ?>  
    </body>
</html>
