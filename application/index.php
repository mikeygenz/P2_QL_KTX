<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/react@18/umd/react.production.min.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js" crossorigin></script>
    <link href="../application/css/index.css" rel="stylesheet">
    <title>KTX</title>
</head>

<body>
    <?php
    session_start();
    ?>
    <div class="container">
        <div class="login">
            <div class="login-form">
                <form action="./login.php" method="post">
                    <h3 class="login-title">Đăng nhập</h3>
                    <div class="login-username-input">
                        <label for="user_name">Tên đăng nhập</label>
                        <input type="text" name="user_name" required />
                    </div>
                    <div class="login-password-input">
                        <label for="password">Mật khẩu</label>
                        <input type="password" name="password" required />
                    </div>
                    <div class="login-submit-input">
                        <button class="submit-input" type="submit" name="login">Đăng nhập</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

</html>