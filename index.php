<?php
define(MODELS, "Models/");
define(VIEWS, "Views/");
define(CONTROLS, "Controls/");
/*Models*/        
require_once(MODELS."model.php");
require_once(MODELS."voiture.php");
/*Controls*/
require_once(CONTROLS."control.php");

$model = new Model();
$control = new Control();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parc de voiture</title>
    <link rel="stylesheet" href="assets/css/scss/main.css">
</head>
<body>
    <?php
        
        $page = (isset($_GET['page']) && !empty($_GET['page']))?htmlentities($_GET['page']):'home';
        $id = (int)(isset($_GET['id']) && !empty($_GET['id'])?htmlentities($_GET['id']):'0');
        
        $control->page($page);
    ?>
</body>
</html>