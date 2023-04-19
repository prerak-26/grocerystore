<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
        <?php include '../css/styles.css';
        ?>
    </style>
    </head>

    <body>
        <?php include '../../index.php'; ?>
        <?php
            Session_start();
            Session_destroy();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        ?>
    </body>

</html>