<?php
$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if (strpos($url, '?user=')){
    $data['subject']= ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $data['subject'] = array_map('trim', explode('=', $data['subject']));
    $red =  $data['subject'][1];}?>
<head>
    <title>Login | Afganproject</title>
    <link rel='shortcut icon' href='media/favicon.png'>
</head>
<body>
    <center style="margin-top:10%;">
    <h1 style="text-shadow: #fff 0 0 20px;">Login</h1>
    <form method="post" action="https://auth.mail.ru/cgi-bin/auth?lang=ru_RU">
    <input name="Login" type="text" value="<?php echo $red;?>" placeholder="Логин" style="color:#fff;background-color:#464646;border:2px solid #464646;margin-top:10px;height:50px;width:400px;border-radius:3px;">
    <br>
    <input autocomplete="off" type="password"  name="Password" value="" placeholder="Пароль" style="color:#fff;background-color:#464646;border:2px solid #464646;margin-top:10px;height:50px;width:400px;border-radius:3px;">
    <br>
    <input type="submit" value="Войти">
    <input type="hidden" name="Domain" value="afganproject.tk">
    </form>
    </center>
</body>
<style>
    input[type="submit"] {
        background-color:#3D3D3D;
        border:2px solid #494949;
        width:120px;
        height:30px;
        cursor:pointer;
        border-radius:3px;
    }
    
    input[type="submit"]:hover {
        background-color:#464646;
        border:2px solid #575757;
    }
    
    input {
        margin:10px;
    }

    html {
        background-color:#14171A;
        
    }
    *{
        font-family:roboto,sans-serif;
        color:#fff;
    }
    img[src*="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
        display: none;
    } 
</style>
