<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">
    <!-- Load an icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- -->
    <link rel="stylesheet" href="../styles/format.css">
    <!-- -->
    <link rel="stylesheet" href="../styles/layout.css">
    <!-- -->
    <link rel="stylesheet" href="../styles/components.css">

    <title>Bücherverwaltung</title>
</head>
<body>
<header>

    <div class="navbar">

        <?php
        //Aktive URL ermitteln
        $path = $_SERVER['PHP_SELF'];

        // TODO Basti: prüfen ob eingeloggt oder nicht uns entsprechende Funktion hinterlegen.
        $isLogin = false;
        if ($isLogin) {
            // Nurzer ist bereits eingeoggt
            $login = "<a class='navbarAnker' id=\"logoutBtn\" > Logout </a>";
        } else {
            // Nutzer ist noch nicht eingeloggt
            $login = "<a class='navbarAnker' id=\"loginBtn\" onclick='showLogin()'> Login </a>";
        }
        switch ($path) {
            case "/mowe/doc/index.php":
                ?>
                <a class="navbarAnker" href="." class="active"><i class="fa fa-home"></i> Home</a>
                <a class="navbarAnker" href="books.php"><i class="fa fa-book"></i> Büchersuche</a>
                <a class="navbarAnker" href="mybooks.php"><i class="fa fa-bookmark"></i> Meine Bücher </a>
                <?php
                echo $login;
                break;

            case "/mowe/doc/books.php":
                ?>
                <a class="navbarAnker" href="./"><i class="fa fa-home"></i> Home</a>
                <a class="navbarAnker" href="./books.php" class="active"><i class="fa fa-book"></i> Büchersuche</a>
                <a class="navbarAnker" href="mybooks.php"><i class="fa fa-bookmark"></i> Meine Bücher </a>
                <?php
                echo $login;
                break;

            case "/mowe/doc/mybooks.php":
                ?>
                <a class="navbarAnker" href="./"><i class="fa fa-home"></i> Home</a>
                <a class="navbarAnker" href="books.php"><i class="fa fa-book"></i> Büchersuche</a>
                <a class="navbarAnker" href="./mybooks.php" class="active"><i class="fa fa-bookmark"></i> Meine Bücher </a>
                <?php
                echo $login;
                break;
            default:
                ?>
                <a class="navbarAnker" href="./"><i class="fa fa-home"></i> Home</a>
                <a class="navbarAnker" href="books.php"><i class="fa fa-book"></i> Büchersuche</a>
                <a class="navbarAnker" href="./mybooks.php"><i class="fa fa-bookmark"></i> Meine Bücher </a>
                <?php
                echo $login;
        }

        require_once ("login.php");

        ?>


    </div>
</header>
