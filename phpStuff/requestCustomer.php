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
        <meta charset="utf-8"/>
        <link rel="shortcut icon" type="x-icon" href="logo_small_icon_only.png"/>
        <script src="php-website-code.js"></script>
        <title>
            Your Requests
        </title>
    </head>
    <body class="bg">
        <div class="face">
            <div class="programmer-bar">
                <ul>
                    <li class="programmers">
                        <a class="list-face">
                            Programmer
                        </a>
                        <ul>
                            <?php
                                $sqlGetProgrammerName = mysqli_query($conn, "SELECT First_Name as fname FROM programmer WHERE Status = 'AVAILABLE'");
                                $GetProgrammerName = mysqli_fetch_assoc($sqlGetProgrammerName);
                                $name = ($GetProgrammerName['fname']);
                                /* $result = mysqli_query($conn, "SELECT COUNT(P_ID) as total FROM programmer");
                                $data = mysqli_fetch_assoc($result);
                                $counter = ($data['total']);
                                $sqlGetProgrammerName = mysqli_query($conn, "SELECT First_Name as fname FROM programmer");
                                $GetProgrammerName = mysqli_fetch_assoc($sqlGetProgrammerName);
                                $name = ($GetProgrammerName['fname']);
                                $sqlGetProgrammer = mysqli_query($conn, "SELECT Status as stat FROM programmer");
                                $GetProgrammer = mysqli_fetch_assoc($sqlGetProgrammer);
                                $status = $GetProgrammer['stat'];
                                $name2 = 0;
                                echo($counter);
                                while ($counter > 0) {
                                    if ($GetProgrammer['stat'] == "BUSY" && $name != $name2) {
                                        echo ("<li> <a class='programmer-icon' style='background-color: red'> $name is $status </a></li>");
                                        $name2 = $name;
                                        $counter -=1;
                                    }

                                    if ($GetProgrammer['stat'] == "AVAILABLE" && $name != $name2) {
                                        echo ("<li> <a class='programmer-icon' style='background-color: green'> $name is $status </a></li>");
                                        $name2 = $name;
                                        $counter -=2;
                                    }
                                } */
                            ?>
                        </ul>
                    </li>
                    <li class="programm-theme">
                        <a class="list-face">
                            Programms
                        </a>
                        <ul>
                            <li>
                                <a>
                                    Website
                                </a>
                            </li>
                            <li>
                                <a>
                                    Webdesign
                                </a>
                            </li>
                            <li>
                                <a>
                                    Game
                                </a>
                            </li>
                            <li>
                                <a>
                                    Database
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <form class="search-field">
                            <input class="type-field" type="text" placeholder="Name/Mail/ID..."/>
                            <input class="search-button" type="submit" value="🔎"/>
                        </form>
                    </li>
                    <li class="help">
                        <a class="list-face">
                            ?
                        </a>
                    <li>
                </ul>
            </div>
            <div class="request-bar">
                <ul>
                    <li class="request-list">
                        <a class="list-face">
                            Show all
                        </a>
                        <ul>
                            <?php
                            ?>
                        </ul>
                    </li>
                    <li class="add-request">
                        <a class="list-face">
                            Add
                        </a>
                    </li>
                    <li class="done-requests">
                        <a class="list-face">
                            Done
                        </a>
                    <li>
                    <li>
                        <a class="list-face">
                            Mail
                        </a>
                    </li>
                </ul>
            </div>
            <div class="main-screen">
                d
            </div>
        </div>
    </body>
</html>