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
                                        echo('<script/>logout()</script>');
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
                        echo ('<li> <a id="job"> Jobs </a> </li>');
                        echo('<li><a onclick="logout()"> Logout </a></li>');
                    }
                ?>
                <li>
                    <a href="#statistic">
                        About Me
                    </a>
                </li>
                <li>
                    <a href="#news">
                        News
                    </a>
                </li>
                <li>
                    <a href="#contacts">
                        Contacts
                    </a>
                </li>
                <li>
                    <button class="side-menu-button1" id="smButton2" onclick="closeSideMenu()"/>
                        X
                    </button>
                </li>
            </ul>

            <div class="header">
                <img id="websiteLogo" src="maxwel_cover (2).jpg" width="100%"/>
                <img style="top: 0" class="side-menu-button2" id="smButton" onmouseover="openSideMenu()" src="menu.png" height="50px" width="100px"/>
            </div>
            <div class="spacer">
                <p> A Programmer you can trust! </p>
            </div>
            <div class="content">
                <div class="main-page">
                    <div class="statistic" id="statistic">

                        <div>
                            <h1> About Me </h1>
                            <p> 
                                Text
                            </p>
                        </div>
                        
                        <div>
                            <h1> Jobs</h1>
                            <?php
                                $number = 5;
                                echo('<p>' . $number . ' jobs</p>');
                            ?>
                        </div>

                        <div>
                            <h1> Rating </h1>
                            <?php
                                $customers = 6;
                                $customersHappy = 5;

                                $rating=(round(($customersHappy / $customers)*100));
                                echo('<p>' . $rating . '%  satisfaction rate </p>');
                            ?>
                        </div>
                    </div>
                    <div class="spacer">
                        <p> What happend and What will happen </p>
                    </div>
                    <div class="news-overlay">
                        <div class="news-container" id="news">
                            <div class="news" id="news1" onmouseover="blockAnimation('news1')" onmouseout="blockAnimationEnd()">
                                <div class="news-panel">
                                    <img src="logo_icon_inverted.png" height="100px" width="100px"/>
                                    <h1> First Post </h1>
                                    <p> Text </p>
                                </div>
                            </div>

                            <div class="news">
                                <div class="news-panel">
                                    <img src="logo_icon_inverted.png" height="100px" width="100px"/>
                                    <h1> Second Post </h1>
                                    <p> Text </p>
                                </div>
                            </div>

                            <div class="news">
                                <div class="news-panel">
                                    <img src="logo_icon_inverted.png" height="100px" width="100px"/>
                                    <h1> Third Post </h1>
                                    <p> Text </p>
                                </div>
                            </div>

                            <div class="news">
                                <div class="news-panel">
                                    <img src="logo_icon_inverted.png" height="100px" width="100px"/>
                                    <h1> Fourth Post </h1>
                                    <p> Text </p>
                                </div>
                            </div>

                            <div class="news">
                                <div class="news-panel">
                                    <img src="logo_icon_inverted.png" height="100px" width="100px"/>
                                    <h1> Fifth Post </h1>
                                    <p> Text </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="spacer">
                <p> How You can contact me </p>
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