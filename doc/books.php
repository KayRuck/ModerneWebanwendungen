<?php require_once('header.php') ?>

    <main id="myMain">
        <h1>Bücherliste</h1>
        <p>Die größte Bücher- und Mangadatenbank die sie online finden werden.</p>

        <input type="text" id="searchInput" onkeyup="tableFilter(1)" placeholder="Filter nach Titel"/>
       <!-- <input type="text" id="searchBar" name="searchvalue" class="searchInput" placeholder="Suche nach Titel..."/> -->

        <div class="table">
            <table id="persTable" class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Titel</th>
                    <th>Autor</th>
                    <th>Verlag</th>
                    <th>Bild</th>
                    <th id="rating">Bewertung</th>
                    <th>Meine Liste</th>
                </tr>
                </thead>
                <tbody id="apiContent" >
                <?php
                // TODO Daten für die Tabelle auslesen. JSON-API(Kay) + Datenbank(Basti)
                //$query = getPersonen();
                //while ($person = mysqli_fetch_array($query)) {
                ?>

                <!-- Dummy Data -->
                <?php //} ?>
                </tbody>
            </table>
        </div>
    </main>


<?php require_once('footer.php') ?>