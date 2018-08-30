<?php require_once('header.php') ?>
<?php require_once('../php/functions.php') ?>


    <main id="myMain">
        <h1>Meine Bücher</h1>

        <?php
        if (!isset($_SESSION['username'])) {
            ?>
            <p>Sie sind nicht eingeloggt. Bitte loggen Sie sich ein um auf dieses feature zugreifen zu können.</p>
            <?php
        }
        ?>

        <?php
        $status = '';
        if(isset($_GET['status']))
        {
            if($_GET['status'] === 'lesend')
            {
                $status = 'lesend';
            }

            if($_GET['status'] === 'willLesen')
            {
                $status = 'willLesen';
            }

            if($_GET['status'] === 'habeGelesen')
            {
                $status = 'habeGelesen';
            }
        }
        if(isset($_GET['isbn'])) {

          //  echo "Wird ausgeführt <br>";
          //  echo $_SESSION['username']."<br>";

            $isbn = $_GET['isbn'];
            $query = "INSERT INTO userbook (username, isbn13, titel, autor, verlag, status)
                    SELECT '". $_SESSION['username']."', book.isbn13, book.titel, book.autor, book.verlag, '". $status."'
                    FROM book WHERE book.isbn13 = " .$isbn.";";

          //  echo $query;
            $con = getConnection();
            mysqli_query($con, $query);
        }
        ?>
        <?php
        if(isset($_SESSION['username'])) { ?>

            <h2>Deine persönliche Übersicht über alle Bücher die dich interessieren.</h2>

            <!-- Tab links -->
            <div class="tab">
                <button id="defaultOpen" class="tablinks" onclick="openTab(event, 'lesend')">Am Lesen</button>
                <button class="tablinks" onclick="openTab(event, 'willlesen')">Will ich lesen</button>
                <button class="tablinks" onclick="openTab(event, 'gelesen')">Habe ich gelesen</button>
            </div>

            <!-- Tab content -->
            <div id="lesend" class="tabcontent">
                <h3>Am Lesen</h3>
                <p>Hier findest du alle Bücher, welche du als "am lesen" markiert hast.</p>

                <p><?php
                    $query = "SELECT * FROM userbook WHERE status = 'lesend' AND username = '" . $_SESSION['username'] . "';";
                    $con = getConnection();
                    $rightQuery = mysqli_query($con, $query);

                    $datensatz = $rightQuery;
                    if(mysqli_num_rows($rightQuery))
                    {
                        echo "<div class=\"table\"><table id=\"persTable\" class=\"table table-striped table-sm\">";
                        echo "<tr> <th>Titel</th> <th>Autor</th> <th>Verlag</th> </tr>";
                        while ($datensatz = mysqli_fetch_array($rightQuery)) {
                            echo "<tr>";
                            echo "<td>" . $datensatz['titel'] . "</td>";
                            echo "<td>" . $datensatz['autor'] . "</td>";
                            echo "<td>" . $datensatz['verlag'] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table></div>";
                    }
                    ?>
                </p>
            </div>

            <div id="willlesen" class="tabcontent">
                <h3>Will ich lesen</h3>
                <p>Hier findest du alle Bücher, welche du noch lesen möchtest.</p>

                <p><?php
                    $query = "SELECT * FROM userbook WHERE status = 'willLesen' AND username = '" . $_SESSION['username'] . "';";
                    $con = getConnection();
                    $rightQuery = mysqli_query($con, $query);

                    $datensatz = $rightQuery;
                    if(mysqli_num_rows($rightQuery)) {
                        echo "<div class=\"table\"><table id=\"persTable\" class=\"table table-striped table-sm\">";
                        echo "<tr> <th>Titel</th> <th>Autor</th> <th>Verlag</th>  <th>ISBN</th> </tr>";
                        while ($datensatz = mysqli_fetch_array($rightQuery)) {
                            echo "<tr>";
                            echo "<td>" . $datensatz['titel'] . "</td>";
                            echo "<td>" . $datensatz['autor'] . "</td>";
                            echo "<td>" . $datensatz['verlag'] . "</td>";
                            echo "<td>" . $datensatz['isbn13'] . "</td>";
                            echo "</tr>";
                        }
                    }
                    echo "</table></div>";
                    ?>  </p>
            </div>

            <div id="gelesen" class="tabcontent">
                <h3>habe ich gelesen</h3>
                <p>Hier findest du alle Bücher die du schon gelesen hast.</p>

                <p><?php
                    $query = "SELECT * FROM userbook WHERE status = 'habeGelesen' AND username = '" . $_SESSION['username'] . "';";
                    $con = getConnection();
                    $rightQuery = mysqli_query($con, $query);
                    $datensatz = $rightQuery;
                    if(mysqli_num_rows($rightQuery)) {
                        echo "<div class=\"table\"><table id=\"persTable\" class=\"table table-striped table-sm\">";
                        echo "<tr> <th>Titel</th> <th>Autor</th> <th>Verlag</th>  <th>ISBN</th> </tr>";
                        while ($datensatz = mysqli_fetch_array($rightQuery)) {
                            echo "<tr>";
                            echo "<td>" . $datensatz['titel'] . "</td>";
                            echo "<td>" . $datensatz['autor'] . "</td>";
                            echo "<td>" . $datensatz['verlag'] . "</td>";
                            echo "<td>" . $datensatz['isbn13'] . "</td>";
                            echo "</tr></div>";
                        }
                    }
                    echo "</table>";
                    ?>  </p>
            </div>
            <?php
                };
            ?>
    </main>

<?php require_once('footer.php') ?>