<!DOCTYPE html>
<head>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <?php require_once "./mvc/views/blocks/css.php"?>
    <title>Dictionary</title>
</head>
<body>
    <div class="container-fluid">
        <?php require_once "./mvc/views/blocks/header.php";?>     
        <div id="home" class="row">
            <div class="col-sm-4">
                <?php require_once "./mvc/views/pages/".$data['pages'].".php";?>  
            </div>
            <div class="col-sm-8" id="read"></div>
        </div>                
    </div>
    <?php require_once "./mvc/views/blocks/js.php";?>
</body>