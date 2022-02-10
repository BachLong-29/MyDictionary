<!DOCTYPE html>
<head>
    <title>Dictionary</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <?php require_once "./mvc/views/blocks/css.php"?>
</head>
<body>
    <div class="container-fluid"> 
        <?php require_once "./mvc/views/blocks/header.php";?>
        <div class="body_topic">
            <div class="section"></div>
        </div>
    </div>
    <?php require_once "./mvc/views/blocks/js.php";?>    
    <?php echo $data['load'] ?>
</body>