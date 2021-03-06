<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/react@18/umd/react.production.min.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js" crossorigin></script>
    <script src="../index.js"> </script>
    <link href="../css/home.css" rel="stylesheet">
    <title>KTX</title>
</head>

<body>
    <div class="header" style="background-image: url('img/ktx_tittle.jpg')">

    </div>
    <?php
    session_start();
    ?>
    <?php
    include_once("./top_menu.php");
    ?>
    <div class="main-content">
        <div class="row">
            <?php
            include_once("./navbar.php")
            ?>
            <div class="col-10">
                <div class="content-frame">
                    <div id="main-content">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
    </div>
</body>

</html>