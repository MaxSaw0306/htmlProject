<html>
    <head>
        <title>
            Mawels Homepage
        </title>
        <link rel="stylesheet" href="phpstyle.css"/>
        <link rel="shortcut icon" type="x-icon" href="logo_small_icon_only.png"/>
        <script src="php-website-code.js">
        </script>
    </head>
    <body>
        <div class="page">
            <button style="position: absolute;" class="side-menu-button" id="smButton"onclick="openSideMenu()">
                X
            </button>
            <ul class="side-menu" id="sideMenu">
                <il class="login-field">
                    <form class="login">
                        <input type="text" placeholder="Benutzername" name="user"/>
                        <input type="password" placeholder="Passwort" name="login-password"/>
                        <span class="log-buttons">
                            <input type="submit" value="Login"/>
                            <?php
                                if (isset($_GET['user']) && isset($_GET['login-password'])) {
                                    $name = $_GET['user'];
                                    $password = $_GET['login-password'];
                                    if ($name == "M.Saweljew" && $password == "Test123") {
                                        echo ('<script> window.alert("Willkommen Meister!") </script>');
                                        echo ('<input type="button" value="Logout" onclick="logout()"/>');
                                    } else {

                                        header("Location: " . $_SERVER['SCRIPT_NAME']);
                                        http_response_code(400);
                                    }
                                } else {
                                    echo ('<input type="button" value="Registrieren" onclick="register()"/>');
                                }
                            ?>
                        </span>
                    </form>
                </il>
                <?php
                    if (isset($_GET['user']) && isset($_GET['login-password'])) {
                        $name = $_GET['user'];
                        $password = $_GET['login-password'];
                        if ($name == "M.Saweljew") {
                            if ($password == "Test123") {
                                echo ('<il> <a id="profile"> Profil </a> </il>');
                            }
                        }
                    }
                ?>
                <il>
                    <a>
                        Neuigkeiten
                    </a>
                </il>
                <il>
                    <a>
                        Produkte
                    </a>
                </il>
                <il>
                    <a>
                        Über uns
                    </a>
                </il>
                <il>
                    <a>
                        Kontakt
                    </a>
                </il>
                <il>
                    <button class="side-menu-button" id="smButton" onclick="closeSideMenu()">
                        X
                    </button>
                </il>
            </ul>
            <div class="content">
                <div class="header">
                    <img src="logo_small.png"/>
                </div>
                <div class="main-page">
            	
                </div>
                <div class="footer">

                </div>
            </div>
        </div>
    </body>
</html>