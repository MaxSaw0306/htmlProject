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
            $loggedIn = 0;
            $version = rand(0,10);
            echo("<link rel='stylesheet' href='phpstyle.css?v=$version'/>")
        ?>
        <title>
            Maxwels
        </title>
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
                        <input type="text" placeholder="Username" name="user"/>
                        <input type="password" placeholder="Password" name="login-password"/>
                        <span class="log-buttons">
                            <input type="submit" value="Login"/>
                            <input type="button" value="Register" onclick="register()"/>
                            <input type="button" value="Cancel" onclick="logout()"/>
                            <?php
                                $loggedIn = 0;
                                if (isset($_GET['user']) && isset($_GET['login-password'])) {
                                    $name = $_GET['user'];
                                    $password = $_GET['login-password'];

                                    $sqlTestUsername = "SELECT `Username` from `user` WHERE `Username` = '$name';";
                                    $TestUSername=$conn->query($sqlTestUsername);
                                    $sqlTestPass = "SELECT `Password` from `user` WHERE `Username` = '$name';";
                                    $TestPass=$conn->query($sqlTestPass);
                                    $sqlTestID = "SELECT `ID` from `user` WHERE `Username` = '$name';";
                                    $TestID=$conn->query($sqlTestID);
                                    $test = 0;
                                    $getID = mysqli_query($conn, "SELECT ID as id FROM user WHERE `Username` = '$name';");
                                    $id = mysqli_fetch_assoc($getID);
                                    $ID = ($id['id']);
                                    while($row = mysqli_fetch_assoc($TestUSername)) {
                                        if($row["Username"] == $name) {
                                            while($row = mysqli_fetch_assoc($TestPass)) {
                                                if($row["Password"] == $password) {
                                                    echo('<script>loginOut()</script>');
                                                    $loggedIn = $name;
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

                        $sqlTestIs = "SELECT `is` from `user` WHERE `Username` = '$loggedIn';";
                        $TestIs = $conn->query($sqlTestIs);
                        while($row = mysqli_fetch_assoc($TestIs)) {
                            if($row["is"] == "Programmer" || $row["is"] == "Master") {
                                echo ("<li> <a href='http://localhost/htmlProject/phpStuff/requestProgrammer.php?user=$loggedIn' target='_blank' id='request'> Requests </a> </li>");
                            }

                            if($row["is"] == "Customer") {
                                echo("<il> <a href='http://localhost/htmlProject/phpStuff/requestCustomer.php?user=$loggedIn' target='_blank' id='request'> Requests </a> </li>");
                            }
                        }
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
                    <button class="side-menu-button1" id="smButton2" onclick="closeSideMenu()">
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

                        <div id="6" onmouseenter="newsBlockOpen(6)" onmouseleave="newsBlockClose(6)">
                            <h1 id="60"> About Me </h1>
                            <p id ="61"> 
                                Text
                            </p>
                        </div>
                        
                        <div id="7" onmouseenter="newsBlockOpen(7)" onmouseleave="newsBlockClose(7)">
                            <h1 id="70"> Requests</h1>
                            <?php
                                $number = 5;
                                echo('<p id=71>' . $number . ' Requests</p>');
                            ?>
                        </div>

                        <div id="8" onmouseenter="newsBlockOpen(8)" onmouseleave="newsBlockClose(8)">
                            <h1 id="80"> Rating </h1>
                            <?php
                                $customers = 6;
                                $customersHappy = 5;

                                $rating=(round(($customersHappy / $customers)*100));
                                echo('<p id="81">' . $rating . '%  satisfaction rate </p>');
                            ?>
                        </div>
                    </div>
                    <div class="spacer">
                        <p> What happend and What will happen </p>
                    </div>
                    <div class="news-overlay">
                        <div class="news-container">
                            <div class="news" id="1" onmouseenter="newsBlockOpen(1)" onmouseleave="newsBlockClose(1)">
                                <div class="news-panel">
                                    <img id="10" src="logo_icon_inverted.png" height="100px" width="100px"/>
                                    <h1> First Post </h1>
                                    <p id="11"> Text </p>
                                </div>
                            </div>

                            <div class="news" id="2" onmouseenter="newsBlockOpen(2)" onmouseleave="newsBlockClose(2)">
                                <div class="news-panel">
                                    <img id="20" src="logo_icon_inverted.png" height="100px" width="100px"/>
                                    <h1> Second Post </h1>
                                    <p id="21"> Text </p>
                                </div>
                            </div>

                            <div class="news" id="3" onmouseenter="newsBlockOpen(3)" onmouseleave="newsBlockClose(3)">
                                <div class="news-panel">
                                    <img id="30" src="logo_icon_inverted.png" height="100px" width="100px"/>
                                    <h1> Third Post </h1>
                                    <p id="31"> Text </p>
                                </div>
                            </div>

                            <div class="news" id="4" onmouseenter="newsBlockOpen(4)"onmouseleave="newsBlockClose(4)">
                                <div class="news-panel">
                                    <img id="40" src="logo_icon_inverted.png" height="100px" width="100px"/>
                                    <h1> Fourth Post </h1>
                                    <p id="41"> Text </p>
                                </div>
                            </div>

                            <div class="news" id="5" onmouseenter="newsBlockOpen(5)" onmouseleave="newsBlockClose(5)">
                                <div class="news-panel">
                                    <img id="50" src="logo_icon_inverted.png" height="100px" width="100px"/>
                                    <h1> Fifth Post </h1>
                                    <p id="51"> Text </p>
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