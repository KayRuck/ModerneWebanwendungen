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
        if(isset($_SESSION['username'])) {

            if (isset($_GET['isbn']) && isset($_GET['bewertung'])) {
                $isbn = $_GET['isbn'];
                $username = $_SESSION['username'];
                $bewertung = $_GET['bewertung'];

                buchBewerten($username, $isbn, $bewertung);
            }

            ?>

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
                        echo "<tr> <th>Titel</th> <th>Autor</th> <th>Verlag</th> <th>IBSN</th> <th>Bewertung</th></tr>";
                        while ($datensatz = mysqli_fetch_array($rightQuery)) {
                            echo "<tr>";
                            echo "<td>" . $datensatz['titel'] . "</td>";
                            echo "<td>" . $datensatz['autor'] . "</td>";
                            echo "<td>" . $datensatz['verlag'] . "</td>";
                            echo "<td>" . $datensatz['isbn13'] . "</td>";
                            $bewertung = getAVGbuchbewertung($datensatz['isbn13']);
                            if ($bewertung == -1) {
                                $bewertung = "Noch nicht bewertet :(";
                            }
                            echo "<td>" . $bewertung . "</td>";
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
                        echo "<tr> <th>Titel</th> <th>Autor</th> <th>Verlag</th>  <th>ISBN</th> <th>Bewertung</th> </tr>";
                        while ($datensatz = mysqli_fetch_array($rightQuery)) {
                            echo "<tr>";
                            echo "<td>" . $datensatz['titel'] . "</td>";
                            echo "<td>" . $datensatz['autor'] . "</td>";
                            echo "<td>" . $datensatz['verlag'] . "</td>";
                            echo "<td>" . $datensatz['isbn13'] . "</td>";
                            $bewertung = getAVGbuchbewertung($datensatz['isbn13']);
                            if ($bewertung == -1) {
                                $bewertung = "Noch nicht bewertet :(";
                            }
                            echo "<td>" . $bewertung . "</td>";
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
                        echo "<tr> <th>Titel</th> <th>Autor</th> <th>Verlag</th>  <th>ISBN</th> <th>Allgemeine Bewertung</th> <th>Meine Bewertung</th></tr>";
                        while ($datensatz = mysqli_fetch_array($rightQuery)) {
                            // Bewertung ermitteln

                            echo "<tr>";
                            echo "<td>" . $datensatz['titel'] . "</td>";
                            echo "<td>" . $datensatz['autor'] . "</td>";
                            echo "<td>" . $datensatz['verlag'] . "</td>";
                            echo "<td>" . $datensatz['isbn13'] . "</td>";

                            $bewertung = getAVGbuchbewertung($datensatz['isbn13']);
                            if ($bewertung == -1) $bewertung = "Noch nicht bewertet :(";
                            echo "<td>" . $bewertung . "</td>";

//                            if (isset($datensatz['bewertung'])) {
                            if ($datensatz['bewertung'] != null) {
                                echo "<td>" . $datensatz['bewertung'] . "</td>";
                            }
                            else {
                            ?>
                            <td>
                                <form action='mybooks.php' method='get'>
                                    <input type='hidden' name='isbn' value=' <?php echo $datensatz['isbn13']; ?> '>
                                    <input type="number" class="myList-btn" name='bewertung' min="1" max="5" step="1" placeholder="Ihre Bewertung">
                                    <input type='submit' class='myList-btn' name='bewBtn'>
                                </form>
                            </td>
                            <?php
                            }
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