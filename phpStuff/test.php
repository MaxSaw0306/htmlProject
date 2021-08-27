<html>
    <head>
        <?php
            $servername = "localhost";
            $username = "Master";
            $password = "8vOCmO7GYNgiovSH";
            $dbname ="maxwels";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            $test = 0;
        ?>
        <title>
            Maxwels
        </title>
        <link rel="stylesheet" href="phpstyle.css"/>
        <link rel="shortcut icon" type="x-icon" href="logo_small_icon_only.png"/>
        <script src="php-website-code.js">
        </script>
        <meta charset="utf-8"/>
    </head>
    <body>
        <div class="page">
            <ul class="side-menu" id="sideMenu">
                <li class="login-field" id="loginField">
                    <form class="login">
                        <input type="text" placeholder="Benutzername" name="user"/>
                        <input type="password" placeholder="Passwort" name="login-password"/>
                        <span class="log-buttons">
                            <input type="submit" value="Login"/>
                            <input type="button" value="Registrieren" onclick="register()"/>
                            <?php
                                if (isset($_GET['user']) && isset($_GET['login-password'])) {
                                    $name = $_GET['user'];
                                    $password = $_GET['login-password'];

                                    $sqlTestUsername = "SELECT `Username` from `user` WHERE `Username` = '$name';";
                                    $TestUSername=$conn->query($sqlTestUsername);
                                    $sqlTestPass = "SELECT `Password` from `user` WHERE `Username` = '$name';";
                                    $TestPass=$conn->query($sqlTestPass);
                                    $test = 0;
                                    while($row = mysqli_fetch_assoc($TestUSername)) {
                                        if($row["Username"] == $name) {
                                            while($row = mysqli_fetch_assoc($TestPass)) {
                                                if($row["Password"] == $password) {
                                                    echo('<script>loginOut()</script>');
                                                    $test=2;
                                                    break;
                                                }
                                            }
                                        }
                                    }
                                    
                                    if ($test == 2 ) {
                                    } else {
                                        header("Location: " . $_SERVER['SCRIPT_NAME']);
                                        http_response_code(400);
                                    }
                                }
                            ?>
                        </span>
                    </form>
                </li>
                <li>
                    <a onclick="showLogin()" id="showLoginButton">
                        Login
                    </a>
                </li>
                <?php
                    if ($test == 2 ) {
                        echo('<script>test()</script>');
                        echo ('<li> <a id="proflie"> Profli </a> </li>');
                        echo('<li><a onclick="logout()"> Logout </a></li>');
                    }
                ?>
                <li>
                    <a>
                        About Me
                    </a>
                </li>
                <li>
                    <a href="#news">
                        News
                    </a>
                </li>
                <li>
                    <a>
                        Products
                    </a>
                </li>
                <li>
                    <a href="#contacts">
                        Contacts
                    </a>
                </li>
                <li>
                    <button class="side-menu-button1" id="smButton2" onclick="closeSideMenu()">
                        X
                    </button>
                </li>
            </ul>

            <div class="header">
                <img id="websiteLogo" src="maxwel_cover (2).jpg" width="100%"/>
                <button style="top: 0" class="side-menu-button2" id="smButton" onclick="openSideMenu()">
                    X
                </button>
            </div>
            <div class="spacer">
                <h1> A Programmer you can trust! </h1>
            </div>
            <div class="content">
                <div class="main-page">
                    <div class="statistic">

                        <div>
                            <h2> About Me </h2>
                            <p> 
                                Ich heiße Maxim Saweljew unf bin ein eigenständiger Entwickler. <br>
                                Das Programmieren habe ich während meines Fachabitures für mich entdeckt.<br>
                                Dort habe ich mit Python meine ersten Erfahrungen sammeln können,und <br>
                                es wurde schnell zu einem Hobby das viel Zeit in anspruch nahm.<br>
                                Nach meinem Fachabi habe eine Ausbildung in Fachinformatik für <br>
                                Anwendungsentwicklung bei der Firma Venabo GmbH gemacht. Dort lernte <br>
                                ich die Webentwicklung kennen. Lernte Html, Javascript und CSS, als auch <br>
                                PHP sowie SCSS. Es machte von Anfang an viel spaß. Hier stieß ich in <br>
                                der vierten Woche meiner Ausbildung zum ersten mal an ein Problem was <br>
                                für mich unlösbar erschien: Ich scheiterte daran Snake in JS zu programmieren <br>
                                Ich habe lange daran gesessen, bis mir gesagt wurde das ich andere Prioritäten <br>
                                habe, also legte ich es schweren Herzens zur Seite. Doch am (Datum einfügen) <br>
                                bewältigte ich das Problem und beendete dieses Projekt.<br>
                            </p>
                        </div>
                        
                        <div>
                            <h4> Jobs</h4>
                            <?php
                                $number = 5;
                                echo('<p>' . $number . ' jobs</p>');
                            ?>
                        </div>

                        <div>
                            <h4> Rating </h4>
                            <?php
                                $customers = 6;
                                $customersHappy = 5;

                                $rating=(round(($customersHappy / $customers)*100));
                                echo('<p>' . $rating . '%  satisfaction rate </p>');
                            ?>
                        </div>
                    </div>
                    <div class="spacer">
                        <h1> What happend and What will happen </h1>
                    </div>
                    <div class="news-container" id="news">
                        <div class="news">
                            <div class="news-panel">
                                <img src="logo_icon_inverted.png" height="100px" width="100px"/>
                                <h3> First Post </h3>
                                _________________________
                                <h4> Text </h4>
                            </div>
                        </div>

                        <div class="news">
                            <div class="news-panel">
                                <img src="logo_icon_inverted.png" height="100px" width="100px"/>
                                <h3> Second Post </h3>
                                _________________________
                                <h4> Text </h4>
                            </div>
                        </div>

                        <div class="news">
                            <div class="news-panel">
                                <img src="logo_icon_inverted.png" height="100px" width="100px"/>
                                <h3> Third Post </h3>
                                _________________________
                                <h4> Text </h4>
                            </div>
                        </div>

                        <div class="news">
                            <div class="news-panel">
                                <img src="logo_icon_inverted.png" height="100px" width="100px"/>
                                <h3> Fourth Post </h3>
                                _________________________
                                <h4> Text </h4>
                            </div>
                        </div>

                        <div class="news">
                            <div class="news-panel">
                                <img src="logo_icon_inverted.png" height="100px" width="100px"/>
                                <h3> Fifth Post </h3>
                                _________________________
                                <h4> Text </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="spacer">
                <h1> How can You contact me </h1>
            </div>
            <div class="footer">
                <img src="smaller_icon.png" width="200" height="200" />
                <div class="contacts" id="contacts">
                    <p> Copyright © Maxwels 2021 </p>
                    <p> maxwels-programming@gmail.com </p>
                    <p> Tel: 2365/424523542625 </p>
                </div>
                
            </div>
        </div>
    </body>
</html>