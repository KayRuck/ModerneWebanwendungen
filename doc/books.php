<?php require_once('header.php') ?>

    <main>
        <h1>Bücherliste</h1>
        <p>Die größte Bücher- und Mangadatenbank die sie online finden werden.</p>

        <input type="text" id="searchInput" onkeyup="tableSearch(1)" placeholder="Suche nach Titel..."/>

        <div class="table">
            <table id="persTable" class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Titel</th>
                    <th>Autor</th>
                    <th>Verlag</th>
                    <th>Bild</th>
                    <th>Bewertung</th>
                    <th>Meine Liste</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // TODO Daten für die Tabelle auslesen. JSON-API(Kay) + Datenbank(Basti)
                //$query = getPersonen();
                //while ($person = mysqli_fetch_array($query)) {
                ?>

                <!-- Dummy Data -->
                <tr>
                    <td>978-1506701615<?php // echo $person['Pers_ID']; ?></td>
                    <td>The Witcher Volume 3: Curse of Crows<?php // echo $person['Pers_ID']; ?></td>
                    <td>Paul Tobin<?php // echo $person['Pers_ID']; ?></td>
                    <td>Dark Horse Books<?php // echo $person['pName']; ?></td>
                    <td><img src="../images/witcher_comic.jpg" style="width:33%"><?php // echo $person['pVorname']; ?>
                    </td>
                    <td>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <?php // echo $person['Studiengang']; ?>
                    </td>
                    <td>Wörk in Progress<?php // echo $person['Mitarbeiter']; ?></td>
                </tr>


                <tr>
                    <td>978-1400079162</td>
                    <td>Origin</td>
                    <td>Dan Brown</td>
                    <td>Anchor</td>
                    <td><img src="../images/origin.jpg" style="width:33%"></td>
                    <td>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                    </td>
                    <td>Wörk in Progress</td>
                </tr>
                <?php //} ?>
                </tbody>
            </table>
        </div>
    </main>


<?php require_once('footer.php') ?>