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
            $version = rand(0,999999999) + rand(0,999999999);
            echo("<link rel='stylesheet' href='phpstyle.css?v=$version'/>
                <script src='php-website-code.js?v=$version'></script>
            ");
            include 'class.php';

            $sqlGetAllUsers = $conn->query("SELECT * FROM `user`");
            $allUsers = array();
            while ($row = $sqlGetAllUsers -> fetch_assoc()) {
                $newUser = new User($row["ID"], $row["Username"], $row["Email"], $row["Password"], $row["is"], $row["Date of creation"]);
                array_push($allUsers,$newUser);
            }

            $sqlGetAllProgrammers = $conn->query("SELECT * FROM `programmer` INNER JOIN `user` ON `programmer`.`P_ID`=`user`.`ID`");
            $allProgrammers = array();
            while ($row = $sqlGetAllProgrammers -> fetch_assoc()) {
                $newProgrammer = new Programmer($row["P_ID"], $row["First_Name"], $row["Last_Name"], $row["Done_Request"], $row["Status"], $row["ID"], $row["Username"], $row["Email"], $row["Password"], $row["is"], $row["Date of creation"]);
                array_push($allProgrammers, $newProgrammer);
            }

            $sqlGetAllCustommers = $conn->query("SELECT * FROM `customer` INNER JOIN `user` ON `customer`.`C_ID`=`user`.`ID`");
            $allCustomers = array();
            while ($row = $sqlGetAllCustommers -> fetch_assoc()) {
                $newCustommer = new Customer($row["C_ID"], $row["FirstName_or_NameOfCompany"], $row["Last_Name"], $row["Phone"], $row["Company_or_Privat"], $row["ID"], $row["Username"], $row["Email"], $row["Password"], $row["is"], $row["Date of creation"]);
                array_push($allCustomers, $newCustommer);
            }

            $sqlGetAllRequests = $conn->query("SELECT * FROM `requests`");
            $allRequests = array();
            while ($row = $sqlGetAllRequests -> fetch_assoc()) {
                $newRequest = new Request($row["R_ID"], $row["Requested_by"], $row["Working_on"], $row["Topic"], $row["Type"], $row["Requested_on"], $row["Deadline"], $row["Status"] );
                array_push($allRequests, $newRequest);
            }

        ?>
        <meta charset="utf-8"/>
        <link rel="shortcut icon" type="x-icon" href="logo_small_icon_only.png"/>
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
                                $user = $_GET['user'];
                                for ($i = 0; $i < (count($allProgrammers)); $i++) {
                                    $pid = $allProgrammers[$i]->getPid();
                                    $name = $allProgrammers[$i]->getFirstName();
                                    $status = $allProgrammers[$i]->getStatus();
                                    $mail = $allProgrammers[$i]->getEmail();
                                    $username = $allProgrammers[$i]->getUsername();
                                    if($username != $_GET['user']) {
                                        if ($status == "AVAILABLE") {
                                        echo ("<li> <a href='mailto:$mail' id='you' class='programmer-icon' style='background-color: #00ff00'> $name is $status </a></li>");
                                        }

                                        if ($status == "BUSY") {
                                            echo ("<li> <a id='you' class='programmer-icon' style='background-color: #ff0000'> $name is $status </a></li>");
                                        }
                                    } else {
                                        global $userstatus;
                                        $userstatus = $status;
                                    }
                                }
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
                        <a href="mailto:maxwels.contacts@gmail.com" class="list-face">
                            ?
                        </a>
                    </li>
                    <?php
                        $user = $_GET['user'];
                        echo("
                    <li style='width: 40%;'>
                        <a id='busy' class='list-face' onclick='setBusy(`$user`)' style='color: #ff0000; display: flex;'>
                            BUSY
                        </a>
                        <a id='available' class='list-face' onclick='setAvailable(`$user`)' style='color: #00ff00; display: flex;'>
                            AVAILABLE
                        </a>
                    </li>
                    ");
                    ?>
                </ul>
            </div>
            <div class="request-bar">
                <ul>
                    <li class="request-list">
                        <a class="list-face" onclick="showAll2()">
                            Show all
                        </a>
                    </li>
                    <li class="add-request">
                        <a class="list-face" onclick="myRequests()">
                            Work in progress
                        </a>
                    </li>
                    <li class="done-requests">
                        <a class="list-face" onclick="showDone2()">
                            Done
                        </a>
                    </li>
                    <li class="done-requests">
                        <a class="list-face" onclick="showColorPicker()">
                            Color
                        </a>
                    </li>
                </ul>
            </div>
            <div class="main-screen">
                <div class="all-requests" id="allRequests">
                    <?php
                        $sqlGetRequests = "SELECT * FROM requests WHERE `Status` != 'DONE' AND `Working_on` IS NULL";
                        $GetRequests = $conn->query($sqlGetRequests) or die($conn->error);
                        $requestList = array("0");
                        echo( "
                            <table class='request-table'>
                                <thead>
                                    <tr>
                                        <th> Requested by </th>
                                        <th> Topic </th>
                                        <th> Type </th>
                                        <th> Requested on </th>
                                        <th> Deadline </th>
                                        <th> Status </th>
                                    </tr>
                                </thead>
                                <tbody>
                        ");
                        while ($row2 = $GetRequests-> fetch_assoc()) {
                            array_push($requestList, $row2["Requested_by"], $row2["Topic"], $row2["Type"], $row2["Requested_on"], $row2["Deadline"], $row2["Status"]);
                        }
                        $requestCounter = count($requestList);
                        for ($i = ($requestCounter -1); $i > 0; $i--) {
                            if ($i % 6 == 0 && $i != 0) {
                                $requestStatus = $requestList[$i];
                                $requestDeadline = $requestList[$i-1];
                                $requestRequestedOn = $requestList[$i-2];
                                $requestType = $requestList[$i-3];
                                $requestTopic = $requestList[$i-4];
                                $requestBy = $requestList[$i-5];
                                $id = $_GET['user'];
                                

                                echo("
                                    <tr>
                                        <td class='requester'> <a style='width=100%; height=100%;' href=mailto:''> $requestBy </a> </td>
                                        <td> $requestTopic </td>
                                        <td> $requestType </td>
                                        <td> $requestRequestedOn </td>
                                        <td> $requestDeadline </td>
                                        <td> $requestStatus </td>
                                    </tr>"
                                );        
                            }
                        }
                        echo("
                                </tbody>
                            </table>
                        ");
                    ?>
                </div>
                <div class="all-requests" id="myRequests">
                    <?php
                        $sqlGetRequests = "SELECT * FROM requests WHERE `Working_on` = '$id'";
                        $GetRequests = $conn->query($sqlGetRequests) or die($conn->error);
                        $requestList = array("0");
                        echo( "
                            <table class='request-table'>
                                <thead>
                                    <tr>
                                        <th> Working on </th>
                                        <th> Topic </th>
                                        <th> Requested on </th>
                                        <th> Deadline </th>
                                        <th> Status </th>
                                    </tr>
                                </thead>
                                <tbody>
                        ");
                        while ($row2 = $GetRequests-> fetch_assoc()) {
                            array_push($requestList, $row2["Working_on"], $row2["Topic"], $row2["Requested_on"], $row2["Deadline"], $row2["Status"] );
                        }
                        $requestCounter = count($requestList);
                        for ($i = ($requestCounter -1); $i > 0; $i--) {
                            if ($i % 5 == 0 && $i != 0) {
                                $requestStatus = $requestList[$i-4];
                                $requestDeadline = $requestList[$i-3];
                                $requestRequestedOn = $requestList[$i-2];
                                $requestTopic = $requestList[$i-1];
                                $requestWorkingOn = $requestList[$i];
                                echo("
                                    <tr>
                                        <td> $requestStatus </td>
                                        <td> $requestDeadline </td>
                                        <td> $requestRequestedOn </td>
                                        <td> $requestTopic </td>
                                        <td> $requestWorkingOn </td>
                                    </tr>"
                                );        
                            }
                        }
                        echo("
                                </tbody>
                            </table>
                        ");
                        
                    ?>
                </div>
                <div class="all-requests" id="doneRequests">
                    <?php
                        $sqlGetRequests = "SELECT * FROM requests WHERE `Working_on` = '$id' AND `Status` = 'DONE' ";
                        $GetRequests = $conn->query($sqlGetRequests) or die($conn->error);
                        $requestList = array("0");
                        echo( "
                            <table class='request-table'>
                                <thead>
                                    <tr>
                                        <th> Working on </th>
                                        <th> Topic </th>
                                        <th> Requested on </th>
                                        <th> Deadline </th>
                                        <th> Status </th>
                                    </tr>
                                </thead>
                                <tbody>
                        ");
                        while ($row2 = $GetRequests-> fetch_assoc()) {
                            array_push($requestList, $row2["Working_on"], $row2["Topic"], $row2["Requested_on"], $row2["Deadline"], $row2["Status"] );
                        }
                        $requestCounter = count($requestList);
                        for ($i = ($requestCounter -1); $i > 0; $i--) {
                            if ($i % 5 == 0 && $i != 0) {
                                $requestStatus = $requestList[$i-4];
                                $requestDeadline = $requestList[$i-3];
                                $requestRequestedOn = $requestList[$i-2];
                                $requestTopic = $requestList[$i-1];
                                $requestWorkingOn = $requestList[$i];
                                echo("
                                    <tr>
                                        <td> $requestStatus </td>
                                        <td> $requestDeadline </td>
                                        <td> $requestRequestedOn </td>
                                        <td> $requestTopic </td>
                                        <td> $requestWorkingOn </td>
                                    </tr>"
                                );        
                            }
                        }
                        echo("
                                </tbody>
                            </table>
                        ");
                        
                    ?>
                </div>
                <div id="colorPickerMenu" class="colorPickerWindow" style="background: linear-gradient(to bottom, #0c2436 0%,#84cafe 100%);">
                    <div class="color-preview">
                        <div id="green2" style="background: rgb(0, 255, 0)">
                            <label for="green"> Green </label>
                        </div>
                        
                        <div id="red2" style="background: rgb(255, 0, 0)">
                            <label for="red"> Red </label>
                        </div>

                        <div id="blue2"  style="background: rgb(0, 0, 255)">
                            <label for="blue"> Blue </label>
                        </div>
                    </div>
                    <div class="color-picker">
                        <input id="green" onchange="changeColor(1)" name="green" type="range" min="0" max="255" value="255"/>
                        <input id="red" onchange="changeColor(2)" name="red" type="range" min="0" max="255" value="255"/>
                        <input id="blue" onchange="changeColor(3)" name="blue" type="range" min="0" max="255" value="255"/>
                    </div>
                    <div id="color1" onclick="changeColor('color1')" class="color-field" style="border: black solid 2px;"> Color1</div>
                    <div id="color2" onclick="changeColor('color2')" class="color-field" style="border: black solid 2px;"> Color2 </div>
                </div>
            </div>
        <?php
            if ($userstatus == "AVAILABLE") {
                $color = "#00ff00";
                $cord ="2400px";
            } else {
                $color = "#ff0000";
                $cord ="1970px";
            }
            echo("
            <span id='indicator' class='status-indicator' style='background: $color; left: $cord';>

            </span>
            ");
        ?>
        </div>
    </body>
</html>