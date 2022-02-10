<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="http://localhost:81/dictionary/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "./mvc/views/blocks/css.php"?>
    <link rel="icon" href="<?php echo BASEURL."/public/images/blue-eyes.png"; ?>"  type="image/png" sizes="16x16 32x32">
    <title>Login</title>
</head>
<body>
    <section>
    <div class="container">
        <div class="user singinBx">
            <?php require_once "./mvc/views/pages/".$data['pages_1'].".php" ?>
        </div>
        <div class="user singupBx">
            <?php require_once "./mvc/views/pages/".$data['pages_2'].".php" ?>            
        </div>
    </div>
    </section>
</body>
</html>