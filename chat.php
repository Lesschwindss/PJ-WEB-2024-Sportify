<?php
session_start();
if (isset($_GET['logout'])){
    $logout_message = "<div class='msgln'><span class='left-info'>User <b class='user-name-left'>" .
    $_SESSION['name'] . "</b> a quitté la session de chat.</span><br></div>";
    $myfile = fopen(__DIR__ . "/../php/log.html", "a") or die("Impossible d'ouvrir le fichier!" . __DIR__ . "/../php/log.html");
    fwrite($myfile, $logout_message);
    fclose($myfile);
    session_destroy();
    sleep(1);
    header("Location: chat.php");
}
if (isset($_POST['enter'])){
    if($_POST['name'] != ""){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    } else {
        echo '<span class="error">Veuillez saisir votre nom</span>';
    }
}
function loginForm() {
    echo '<div id="loginform">
            <p>Veuillez saisir votre nom pour continuer!</p>
            <form action="chat.php" method="post">
                <label for="name">Nom: </label>
                <input type="text" name="name" id="name" />
                <input type="submit" name="enter" id="enter" value="Soumettre" />
            </form>
          </div>';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Exemple Chat Texto</title>
<link rel="stylesheet" href="../css/styles.css" />
<style>
/* Styles pour le chat et le bouton de retour */
body {
    font-family: 'Helvetica Neue', Arial, sans-serif;
    color: #333;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

.wrapper {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    text-align: center;
}

#loginform, #wrapper {
    margin: 0 auto;
    padding-bottom: 25px;
    background: #eee;
    width: 600px;
    max-width: 100%;
    border: 2px solid #212121;
    border-radius: 4px;
}

#loginform {
    padding-top: 18px;
    text-align: center;
}

#loginform p {
    padding: 15px 25px;
    font-size: 1.4rem;
    font-weight: bold;
}

#chatbox {
    text-align: left;
    margin: 0 auto;
    margin-bottom: 25px;
    padding: 10px;
    background: #fff;
    height: 300px;
    width: 100%;
    max-width: 530px;
    border: 1px solid #a7a7a7;
    overflow: auto;
    border-radius: 4px;
    border-bottom: 4px solid #a7a7a7;
}

#usermsg {
    flex: 1;
    border-radius: 4px;
    border: 1px solid #ff9800;
    padding: 5px;
}

#name {
    border-radius: 4px;
    border: 1px solid #ff9800;
    padding: 2px 8px;
}

#submitmsg, #enter, #return {
    background: #ff9800;
    border: 2px solid #e65100;
    color: white;
    padding: 4px 10px;
    font-weight: bold;
    border-radius: 4px;
    text-decoration: none;
    margin-top: 10px;
    display: inline-block;
}

.error {
    color: #ff0000;
}

#menu {
    padding: 15px 25px;
    display: flex;
    justify-content: space-between;
}

#menu p.welcome {
    margin: 0;
}

a#exit {
    color: white;
    background: #c62828;
    padding: 4px 8px;
    border-radius: 4px;
    font-weight: bold;
}

.msgln {
    margin: 0 0 5px 0;
}

.msgln span.left-info {
    color: orangered;
}

.msgln span.chat-time {
    color: #666;
    font-size: 60%;
    vertical-align: super;
}

.msgln b.user-name, .msgln b.user-name-left {
    font-weight: bold;
    background: #546e7a;
    color: white;
    padding: 2px 4px;
    font-size: 90%;
    border-radius: 4px;
    margin: 0 5px 0 0;
}

.msgln b.user-name-left {
    background: orangered;
}
</style>
</head>
<body>
    <div class="wrapper">
        <a id="return" href="index.php">Retour au site</a>
        <section class="section py-5">
            <div class="container">
                <?php
                if (!isset($_SESSION['name'])){
                    loginForm();
                } else {
                ?>
                <div id="wrapper">
                    <div id="menu">
                        <p class="welcome">Bienvenue, <b><?php echo $_SESSION['name']; ?></b></p>
                        <p class="logout"><a id="exit" href="#">Quitter la conversation</a></p>
                    </div>
                    <div id="chatbox">
                        <?php
                        if(file_exists("../php/log.html") && filesize("../php/log.html") > 0){
                            $contents = file_get_contents("../php/log.html");
                            echo $contents;
                        }
                        ?>
                    </div>
                    <form name="message" action="">
                        <input name="usermsg" type="text" id="usermsg" />
                        <input name="submitmsg" type="submit" id="submitmsg" value="Envoyer" />
                    </form>
                </div>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script type="text/javascript">
                $(document).ready(function () {
                    $("#submitmsg").click(function () {
                        var clientmsg = $("#usermsg").val();
                        $.post("../php/post.php", { text: clientmsg });
                        $("#usermsg").val("");
                        return false;
                    });
                    function loadLog() {
                        var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20;
                        $.ajax({
                            url: "../php/log.html",
                            cache: false,
                            success: function (html) {
                                $("#chatbox").html(html);
                                var newscrollHeight = $("#chatbox")[0].scrollHeight - 20;
                                if(newscrollHeight > oldscrollHeight){
                                    $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal');
                                }
                            }
                        });
                    }
                    setInterval (loadLog, 2500);
                    $("#exit").click(function () {
                        var exit = confirm("Voulez-vous vraiment mettre fin à la session ?");
                        if (exit == true) {
                            window.location = "chat.php?logout=true";
                        }
                    });
                });
                </script>
                <?php
                }
                ?>
            </div>
        </section>
    </div>
</body>
</html>
