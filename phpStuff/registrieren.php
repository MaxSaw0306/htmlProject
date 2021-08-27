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
        ?>
        <title>
            Registrieren
        </title>
        <link rel="stylesheet" href="phpstyle.css"/>
        <link rel="shortcut icon" type="x-icon" href="logo_small_icon_only.png"/>
        <script src="php-website-code.js">
        </script>
        <meta charset="utf-8"/>
    </head>
    <body>
        <form class="register">
            <input type="text" name="username" placeholder="Benutzername"/>
            <input type="email" name="email" placeholder="Email-Adresse"/>
            <input type="text" name="password1" placeholder="Passwort"/>
            <input type="text" name="password2" placeholder="Passwort bestätigen"/>
            <input type="submit" value="Registieren"/>
        </form>
        <?php
            if (isset($_GET['username']) && isset($_GET['password1'])&& isset($_GET['password2'])&& isset($_GET['email'])) {
                $name = $_GET['username'];
                $mail = $_GET['email'];
                $password1 = $_GET['password1'];
                $password2 = $_GET['password2'];
                $mailtest = 0;
                $nametest = 0;
                if (strlen($name) != 0 || strlen($mail) != 0 || strlen($password1) != 0 || strlen($password2) != 0 ) {
                    if($password1 == $password2) {
                        $sqlTestUsername = "SELECT `Username` from `user` WHERE `Username` = '$name';";
                        $TestUsername=$conn->query($sqlTestUsername);
                        $sqlTestMail = "SELECT `Email` from `user` WHERE `Email` = '$mail';";
                        $TestMail=$conn->query($sqlTestMail);
                        $testUserUniqe=0;
                        $testMailUniqe=0;
                        while($row = mysqli_fetch_assoc($TestUsername)) {
                            if($row["Username"] == $name) {
                                $testUserUniqe = TRUE;
                                break;
                            }
                        }

                        while($row = mysqli_fetch_assoc($TestMail)) {
                            if($row["Email"] == $mail) {
                                $testMailUniqe = TRUE;
                                break;
                            }
                        }


                        if($test == TRUE) {
                            echo("Dieser Name ist bereits vergeben!");
                        }

                        if($test2 == TRUE) {
                            echo("Dieser Account existiert bereits!");
                        }

                        if ($test + $test2 == 0 ) {
                            $sql = "INSERT INTO user (Username, Password, Email) VALUES ('$name', '$password1', '$mail')";
                            $conn->query($sql);
                        }
                    } 
                }
            }
        ?>
    </body>
</html>