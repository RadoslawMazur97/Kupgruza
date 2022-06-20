<?php
$userCookie = "userCookie";
$isAdminCookie = "isAdminCookie";
if(isset($_COOKIE[$userCookie])) {
    setcookie($userCookie, "", time()-3600);
}
if(isset($_COOKIE[$isAdminCookie])) {
    setcookie($isAdminCookie, "", time()-3600);
}

?>

<!DOCTYPE html>
<head>
    <link rel = "stylesheet" type = "text/css" href = "public/css/style.css">
    <title>LOGIN PAGE</title>

</head>

<body>

    <div class = "container">

        <div class = "logo">
            <img src="public/img/logo.svg">
        </div>
        <div class = "login-container">
            <form class = "login" action="login" method ="POST">
                <div class ="messages">
                    <?php if(isset($messages)) {
                        foreach ($messages as $message){
                            echo $message;
                        }

                    }
                    ?>
                </div>
            <input name = "email" type = "text" placeholder = "email@email.com">
            <input name = "password" type = "password" placeholder = "password">
            <button type = "submit">LOGIN</button>
            <div class = "register-text">            
                <h3>Don't have account yet? Register</h3>
            </div>
                <a href ="register" class="button"> REGISTER </a>

             </form>
        </div>
    </div>
</body>