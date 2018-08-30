<?php require_once('header.php') ?>


    <main id="myMain">
        <h1>Impressum</h1>

        <h2>Legal stuff, you know.</h2>

        <ul>
            <li><h3>CSS getrennt, KEIN inline CSS</h3></li>
            <p>
                Alles CSS wurde in die zwei Dateien format.css und components.css ausgelagert.
                Für die Übersicht haben wir hier zwei verschiedene Dokumente genutzt.
                Am Ende werden diese mittels Grunt zusammengefügt und minimiert.
                Alles CSS-Dateien sind im Ordner styles zu finden.
            </p>

            <li><h3>Responsive Design</h3></li>
            <p>
                Das CSS wurde responsive designt.
            </p>

            <li><h3>Session</h3></li>
            <p>
                Die Sessions wurden für einen Nutzerlogin verwendet.
                <!-- TODO Basti: kurz und knap schreiben wo und wie du die Sessions genutzt hast. -->
            </p>

            <li><h3>Datenbank-Anbindung</h3></li>
            <p>
                In unserer Datenbank werden alle Bücher gespeichert, welche über die Google-Books-API abgerufen werden.
                Nutzer können diese markieren und somit in private Listen speichern. (books.php, mybooks.php, googleBooksAPI.js)
            </p>

            <li><h3>AJAX-Request mit Antwort im JSON-Format</h3></li>
            <p>
                Wir sprechen die Google-Books-API an und verarbeiten JSON Dokumente zu unserer Suchanfrage. (googleBooksAPI.js)
            </p>

            <li><h3>JS-Framework/Toolkit/Node.js</h3></li>
            <p>
                Es wurde Grunt sowie Grunt plugins verwendet, welche via npm gemanagt wurden.
            </p>

            <li><h3>min. eine JS-Funktion</h3></li>
            <p>
                Wir verwenden mehrere JS-Funktionen wie z.B. für den Slider auf der Homeseite
                oder zur Suche in der Tabelle auf der Bucherseite. (functions.js)
            </p>

            <li><h3>Minimierte CSS-/JS-Datei</h3></li>
            <p>
                Alle CSS-Dateien wurden mittels Grunt zusammengeführt und minimiert.
                Alle JS-Dateien wurden mittels eines Onlinetools zusammengeführt und minimiert.
            </p>

            <li><h3>Komprimierung</h3></li>
            <p>
                Mittels .htaccess durchgeführt.
            </p>

            <li><h3>Caching</h3></li>
            <p>
                Wir haben das Caching mittels phpfastcache realisiert.
                <!-- TODO Christopher: kurz und knap beschreiben was du dies bzgl. gemacht hast -->
            </p>

            <li><h3>Suchmaschinenoptimierungen</h3></li>
            <p>
                Blub
                <!-- TODO Christopher: s.o. (falls noch nicht geschehen, dein Dokument auf git hochladen und hier erwähnen) -->
            </p>
        </ul>

    </main>


<?php require_once('footer.php') ?>