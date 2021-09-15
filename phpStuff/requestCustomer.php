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
                $newRequest = new Request($row["R_ID"], $row["Requested_by"], $row["Working_on"], $row["Topic"], $row["Type"], $row["Requested_on"], $row["Deadline"], $row["Status"], $row["Satisfied"] );
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
                    <li>
                </ul>
            </div>
            <div class="request-bar">
                <ul>
                    <li class="request-list">
                        <a class="list-face" onclick="showAll()">
                            Show all
                        </a>
                        <ul>
                            <?php
                            ?>
                        </ul>
                    </li>
                    <li class="add-request">
                        <a class="list-face" onclick="addRequests()">
                            Add
                        </a>
                    </li>
                    <li class="done-requests">
                        <a class="list-face" onclick="showDone()">
                            Done
                        </a>
                    </li>
                </ul>
            </div>
            <div class="main-screen">
                <div class="all-requests" id="allRequests">
                    <?php
                        echo( "
                            <table class='request-table' id='request-table'>
                                <thead>
                                    <tr>
                                        <th> Working on </th>
                                        <th> Topic </th>
                                        <th> Type </th>
                                        <th> Requested on </th>
                                        <th> Deadline </th>
                                        <th> Status </th>
                                    </tr>
                                </thead>
                                <tbody>
                        ");

                        for ($i = 0; $i < count($allRequests); $i++) {
                            $rid = $allRequests[$i]->getRid();
                            $requestedBy = $allRequests[$i]->getRequestedBy();
                            $workingOn = $allRequests[$i]->getWorkingOn();
                            $topic = $allRequests[$i]->getTopic();
                            $type = $allRequests[$i]->getType();
                            $requestedOn = $allRequests[$i]->getRequestedOn();
                            $deadline = $allRequests[$i]->getDeadline();
                            $status = $allRequests[$i]->getStatus();

                            if ($status != "DONE" && $requestedBy == $_GET['user'] ) {
                                echo("
                                    <tr>
                                        <td class='requester'> <a style='width=100%; height=100%;' href=mailto:''> $workingOn </a> </td>
                                        <td> $topic </td>
                                        <td> $type </td>
                                        <td> $requestedOn </td>
                                        <td> $deadline </td>
                                        <td> $status </td>
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
                        if(isset($_GET['user'])) {
                            $id = $_GET['user'];
                            $sqlGetRequests = "SELECT * FROM requests WHERE `Requested_by` = '$id' AND `Status` = 'DONE'";
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
                        }
                    ?>
                </div>
                <div class="all-requests" id="addRequests">
                    <div class="createRequestBG">
                        <form class="createRequest">
                            <?php
                                $user = $_GET['user'];
                                echo("
                                <input type='hidden' value= $user name='user'/>
                                <label for='topic'> What is it about </label><br>
                                <input type='text' id='topic' name='topic'/><br>
                                <input type='radio' id='website' name='type' value='Website'/>
                                <label class='radio-label' for='website'> Website </label><br>
                                <input type='radio' id='Webdesign' name='type' value='Webdesign'/>
                                <label class='radio-label' for='Webdesign'>Webdesign</label><br>
                                <input type='radio' id='Game' name='type' value='Game'/>
                                <label class='radio-label' for='Game'>Game</label><br>
                                <input type='radio' id='Database' name='type' value='Database'/>
                                <label class='radio-label' for='Database'>Database</label><br>
                                <input type='radio' id='Other' name='type' value='Other'/>
                                <label class='radio-label' for='Other'>Other</label><br>
                                <input type='submit' value='Create Request'/> 
                            ");
                                if (isset($_GET['type']) && isset($_GET['topic']) && isset($_GET['user'])) {
                                    $user = $_GET['user'];
                                    $type = $_GET['type'];
                                    $topic = $_GET['topic'];
                                    $sqlCreateRequest = "INSERT INTO `requests`(`Requested_by`, `Topic`, `Type`) VALUES ('$user', '$type', '$topic')";
                                    $conn->query($sqlCreateRequest) or die($conn-> error);
                                    echo ("<script> self.location = 'http://localhost/htmlProject/phpStuff/requestCustomer.php?user=' </script>");
                                }
                            ?>
                        </form>
                    </div>          
                </div>
            </div>
        </div>
    </body>
</html>