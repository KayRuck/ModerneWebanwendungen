$(document).ready(function () {
    //$('#btn').click(function () {

        $.ajax({
            url: 'https://www.googleapis.com/books/v1/volumes?q=One+Piece',
            method: 'GET',
            dataType: 'json'
        }).done(function (data) {

            // Innerhalb der Variablen "data" liegt nun das gesamte Ergebnis
            // Wir geben aber auf der Konsole nur die Eigenschaft "items" aus.
            // Wollen Sie die gesamte Ausgabe sehen, geben Sie nur "data" aus.
            console.log(data.items);

            // "items" ist ein Array mit allen Buechern, die wiederum als Objekte
            // gespeichert sind. Die Buecher werden in eine andere Variable
            // umkopiert.
            var arrBuecher = data.items;

            var tableHtml = "";
            // gehe die Schleife durch alle Buecher durch.
            for (var i = 0; i < arrBuecher.length; i++) {
                var ISBN_13 = " ";

                // Jedes Buchobjekt verfuegt ueber eine Eigenschaft "volumeInfo",
                //                    <th>ISBN</th>
                //                     <th>Titel</th>
                //                     <th>Autor</th>
                //                     <th>Verlag</th>
                //                     <th>Bild</th>
                // die wiederum ein Objekt ist. Dieses Objekt hat die Eigenschaft
                // "title". Wir koennen "einfach" bis dahin durchgreifen und den Titel
                // direkt ausgeben.
                // console.log(arrBuecher[i].volumeInfo.industryIdentifiers[1].identifier + arrBuecher[i].volumeInfo.industryIdentifiers[1].type);

                if(arrBuecher[i].volumeInfo.industryIdentifiers[1].type === "ISBN_13") ISBN_13 = arrBuecher[i].volumeInfo.industryIdentifiers[1].identifier;
                else ISBN_13 = arrBuecher[i].volumeInfo.industryIdentifiers[0].identifier;

                // console.log(ISBN_13);
                var isbn = ISBN_13;
                var title = arrBuecher[i].volumeInfo.title;
                var author = arrBuecher[i].volumeInfo.authors;
                var publisher = arrBuecher[i].volumeInfo.publisher;

                if (window.XMLHttpRequest) {
                    xmlhttp = new XMLHttpRequest();
                }

                xmlhttp.open("GET", "writeToDB.php?isbn=" + isbn + "&title=" + title + "&author=" + author + "&publisher=" + publisher, true);
                xmlhttp.send();

                tableHtml += "<tr>";
                tableHtml += "<td>" + ISBN_13 + "</td>";
                tableHtml += "<td>" + arrBuecher[i].volumeInfo.title + "</td>";
                tableHtml += "<td>" + arrBuecher[i].volumeInfo.authors + "</td>";
                tableHtml += "<td>" + arrBuecher[i].volumeInfo.publisher + "</td>";
                tableHtml += "<td>" + "<img class='searchImg' src=\"" + arrBuecher[i].volumeInfo.imageLinks.thumbnail + "\"></td>"; console.log(isbn);
                tableHtml += "<td>" +
                    "                   <a href='mybooks.php?isbn="+isbn+"&status=lesend'><button type='button' name='amReadingBtn'> Am Lesen </button></a> <br>" +
                    "                   <a href='mybooks.php?isbn="+isbn+"&status=willLesen'><button type='button' name='wantToReadBtn'> Will ich lesen </button></a> <br>" +
                    "                   <a href='mybooks.php?isbn="+isbn+"&status=habeGelesen'><button type='button' name='haveReadBtn'> Habe ich gelesen</button></a> <br> " + "</td>";
                tableHtml += "</tr>";

                document.getElementById("apiContent").innerHTML = tableHtml;


            }

        }).fail(function () {
            alert('fehler');
            console.log('fehler');
        });
    //onclick='amReading("+isbn+")
   // });
});
