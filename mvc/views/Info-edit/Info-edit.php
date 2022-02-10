<!DOCTYPE html>
<head>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <?php require_once "./mvc/views/blocks/css.php"?>
    <title>Infomation</title>
</head>
<body>
    <div class="container-fluid">
        <?php require_once "./mvc/views/blocks/header.php";?>             
        <div><?php require_once "./mvc/views/pages/".$data['pages'].".php";?></div>                
    </div>
    <?php require_once "./mvc/views/blocks/js.php";?>
</body>