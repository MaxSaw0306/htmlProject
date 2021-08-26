<html>
    <head>
        <?php
            $servername = "localhost";
            $username = "root";

            // Create connection
            $conn = new mysqli($servername, $username);

            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
        ?>
        <title>
            Maxwels Homepage
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

                <li>
                    <a onclick="showLogin()" id="showLoginButton">
                        Login
                    </a>
                </li>
                <?php
                    if (isset($_GET['user']) && isset($_GET['login-password'])) {
                        $name = $_GET['user'];
                        $password = $_GET['login-password'];
                        if ($name == "M.Saweljew") {
                            if ($password == "Test123") {
                                echo('<script>test()</script>');
                                echo ('<li> <a id="proflie"> Profli </a> </li>');
                                echo('<li><a onclick="logout()"> Logout </a></li>');
                            }
                        }
                    }
                ?>
                <li>
                    <a>
                        Neuigkeiten
                    </a>
                </li>
                <li>
                    <a>
                        Produkte
                    </a>
                </li>
                <li>
                    <a>
                        Über mich
                    </a>
                </li>
                <li>
                    <a href="#contacts">
                        Kontakt
                    </a>
                </li>
                <li>
                    <button class="side-menu-button1" id="smButton2" onclick="closeSideMenu()">
                        X
                    </button>
                </li>
            </ul>
            <div class="content">
                <div class="header">
                    <img id="websiteLogo" src="maxwel_cover.jpg" width="100%" height="1440px"/>
                    <script>resizeWebsiteLogo()</script>
                    <button style="top: 0" class="side-menu-button2" id="smButton" onclick="openSideMenu()">
                        X
                    </button>
                </div>
                <div class="main-page">
                    <div class="statistic">

                        <div>
                            <h2> Über mich </h2>
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
                            <h4> Erledigte Aufträge </h4>
                            <?php
                                $number = 5;
                                echo('<p>' . $number . ' Aufträge erledigt</p>');
                            ?>
                        </div>

                        <div>
                            <h4> Rating </h4>
                            <?php
                                $customers = 6;
                                $customersHappy = 5;

                                $rating=(round(($customersHappy / $customers)*100));
                                echo('<p>' . $rating . '%  Zufriedenheistrate </p>');
                            ?>
                        </div>

                    </div>
                    <div>

                    </div>
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
        </div>
    </body>
</html>