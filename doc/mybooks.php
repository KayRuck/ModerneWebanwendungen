<?php require_once('header.php') ?>


    <main id="myMain">
        <h1>Meine Bücher</h1>

        <?php
        // TODO abfrage ob eingeloggt
        if (false) {
            ?>
            <p>Sie sind nicht eingeloggt. Bitte loggen Sie sich ein um auf dieses feature zugreifen zu können.</p>
            <?php
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


            <!-- TODO Basti: Aus DB-Lesen und anzeigen lassen -->
            <p>-> zurzeit hast du keine Bücher als "am lesen" markiert</p>
        </div>

        <div id="willlesen" class="tabcontent">
            <h3>Will ich lesen</h3>
            <p>Hier findest du alle Bücher, welche du noch lesen möchtest.</p>

            <!-- TODO Basti: Aus DB-Lesen und anzeigen lassen -->
            <p>-> zurzeit hast du keine Bücher als "Möchte ich lesen" markiert</p>
        </div>

        <div id="gelesen" class="tabcontent">
            <h3>habe ich gelesen</h3>
            <p>Hier findest du alle Bücher die du schon gelesen hast.</p>

            <!-- TODO Basti: Aus DB-Lesen und anzeigen lassen -->
            <p>-> zurzeit hast du keine Bücher als "habe ich gelesen" markiert</p>
        </div>

    </main>


<?php require_once('footer.php') ?>