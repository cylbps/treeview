<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Электронные книги</title>
        <link rel="stylesheet" href="styles/style.css">
        <link rel="stylesheet" href="styles/jquery.treeview.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        <script src="js/jquery.cookie.js"></script>
        <script src="js/jquery.treeview.js"></script>
        <script type="text/javascript" src="js/demo.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <div class="header">
                <h1>Элекронные книги</h1>
            </div>
            <div class="left-menu">
                <h3>Категории</h3>
                <?php
                require_once 'Treeview.php';
                $treeView = new Treeview('categories'); 
                ?>
                <ul id="browser" class="filetree">
                <?php    
                $treeView->getTree();
                ?>
                </ul>
            </div>
        </div>
    </body>
</html>