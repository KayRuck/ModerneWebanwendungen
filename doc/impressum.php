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
                Die Sessions wurden in einer Login-Funktion genutzt, um Nutzer über die Session identifizieren zu können.
                Über eine Logout-Funktion wird die Session wieder zerstört. Das Session_start() wird automatisch bei jeder Seite aufgerufen,
                da es über die header.php aufgerufen wird, welche ohnehin in jeder weiteren .php-Datei aufgerufen wird.
            </p>

            <li><h3>Datenbank-Anbindung</h3></li>
            <p>
                In unserer Datenbank werden alle Bücher gespeichert, welche über die Google-Books-API abgerufen werden.
                Nutzer können diese markieren und somit in privaten Listen speichern. (books.php, mybooks.php, googleBooksAPI.js, db.sql, functions.php)
            </p>

            <li><h3>AJAX-Request mit Antwort im JSON-Format</h3></li>
            <p>
                Wir sprechen die Google-Books-API an und verarbeiten JSON Dokumente zu unserer Suchanfrage. (googleBooksAPI.js)
            </p>

            <li><h3>JS-Framework/Toolkit/Node.js</h3></li>
            <p>
                Es wurde Grunt sowie Grunt plugins verwendet, welche via npm gemanagt wurden. (Gruntfile.js)
            </p>

            <li><h3>min. eine JS-Funktion</h3></li>
            <p>
                Wir verwenden mehrere JS-Funktionen wie z.B. für den Slider auf der Homeseite
                oder zur Suche in der Tabelle auf der Bucherseite. (functions.js)
            </p>

            <li><h3>Minimierte CSS-/JS-Datei</h3></li>
            <p>
                Alle CSS-Dateien wurden mittels Grunt zusammengeführt und minimiert. (style.min.css)
                Alle JS-Dateien wurden mittels eines Onlinetools zusammengeführt und minimiert. (script.min.js)
            </p>

            <li><h3>Komprimierung</h3></li>
            <p>
                Mittels .htaccess durchgeführt.
            </p>

            <li><h3>Caching</h3></li>
            <p>
                In "php/functions.php" liegt die Funktion getAVGbuchbewertung() vor. Sie berechnet die durchschnittliche Bewertung von einem Buch und cacht sie für eine Stunde mithilfe von phpfastcache. Somit muss der Durchschnitt nicht bei jeder Anfrage neu berechnet werden.
            </p>

            <li><h3>Suchmaschinenoptimierungen</h3></li>
            <p>
                In der Beispiel-Webseite haben wir folgende Möglichkeiten zur Suchmaschinenoptimierung gefunden:
				<ul>
					<ul><li>&lt;meta name="keywords" content="MoWe,WPF,SEO,optimierung,test,HTML5,CSS3,JavaScript"&gt;</li></ul>
				<li>Kein Title-Tag. Die Website sollte einen Titel haben:</li>
					<ul><li>&lt;title&gt;MoWe – Übung zu SEO&lt;/title&gt;</li></ul>
				<li>Der Link "Klick mich!" verweist auf "seo.php". Diese Seite existiert nicht. Daher sollte entweder der Link entfernt oder die verlinkte Seite angelegt werden.</li>
				<li>Die Seite enthält ein iFrame. Dieser wird von Suchmaschinen ignoriert und sollte vermieden werden.</li>
				<li>Die Datei "css/style.css" sollte minimiert werden, um Ladezeiten zu verringern.</li>
				</ul>
            </p>
        </ul>

    </main>


<?php require_once('footer.php') ?>