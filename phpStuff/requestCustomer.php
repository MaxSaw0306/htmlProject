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
                                $sqlGetProgrammer = "SELECT * FROM programmer ORDER BY `Status` DESC";
                                $GetProgrammerStatus = $conn->query($sqlGetProgrammer);
                                $ProgrammerList = array();
                                while ($row =$GetProgrammerStatus-> fetch_assoc()) {
                                    array_push($ProgrammerList, $row["First_Name"], $row["Status"]);
                                }
                                for ($counter = count($ProgrammerList)-1; $counter >= 0 ; $counter--) {
                                    if ($ProgrammerList[$counter] == "BUSY") {
                                        $nameProgrammer = $ProgrammerList[$counter-1];
                                        $statusProgrammer = $ProgrammerList[$counter];
                                        echo ("<li> <a class='programmer-icon' style='background-color: red'> $nameProgrammer is $statusProgrammer </a></li>");
                                    }

                                    if ($ProgrammerList[$counter] == "AVAILABLE") {
                                        $nameProgrammer = $ProgrammerList[$counter-1];
                                        $statusProgrammer = $ProgrammerList[$counter];
                                        echo ("<li> <a class='programmer-icon' style='background-color: green'> $nameProgrammer is $statusProgrammer </a></li>");
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
                        <a class="list-face">
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
                    <li>
                        <a class="list-face" onclick="writeMail()">
                            Mail
                        </a>
                    </li>
                </ul>
            </div>
            <div class="main-screen">
                <div class="all-requests" id="allRequests">
                    <?php
                        if(isset($_GET['user'])) {
                            $id = $_GET['user'];
                            $sqlGetRequests = "SELECT * FROM requests WHERE `Requested_by` = '$id' ";
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
                                    echo ("<script> self.location = 'http://localhost/htmlProject/phpStuff/requestCustomer.php?user=Kamilla08' </script>");
                                }
                            ?>
                        </form>
                    </div>          
                </div>
            </div>
        </div>
    </body>
</html>