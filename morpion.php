<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Document</title>
</head>
<body>
    <?php 
       // print_r($_GET);  
        $x=$_GET['x'];

        $y=$_GET['y'];

        $j=$_GET['j']; 

        if($j==1) {
            $j = 2;
        } else {
            $j = 1;
        }

    
    ?>
    <table>
    <tr> 
        <td>
            <a href="?x=1&y=1&j=j<?php echo $j ?>">
                <?php 
                    if($x==1 && $y==1 && $j==1) {
                        echo "O";
                    }
                    else if ($x==1 && $y==1 && $j==0){
                        echo "x";
                    
                    }
                    else {
                        echo "_";
                    }
                ?>
            </a>
        </td>
        <td>
            <a href="?x=1&y=2">_</a>
        </td>
        <td>
            <a href="?x=1&y=3">_</a>
        </td>
   <?php phpinfo() ?>
    </tr>
    </table>
</body>
</html>





