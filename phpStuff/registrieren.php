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

                if($password == $password2) {
                    $sql = "'INSERT INTO user (ID, Username, 'Password', Email, 'Date of creation')
                    VALUES ($name, $password1, $mail, 2021-08-25)'";
                }
            }
        ?>
    </body>
</html>