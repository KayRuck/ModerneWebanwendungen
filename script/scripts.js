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
                    "                   <a href='mybooks.php?isbn="+isbn+"&status=lesend'><button class='myList-btn' type='button' name='amReadingBtn'> Am Lesen </button></a> <br>" +
                    "                   <a href='mybooks.php?isbn="+isbn+"&status=willLesen'><button class='myList-btn' type='button' name='wantToReadBtn'> Will ich lesen </button></a> <br>" +
                    "                   <a href='mybooks.php?isbn="+isbn+"&status=habeGelesen'><button class='myList-btn' type='button' name='haveReadBtn'> Habe ich gelesen</button></a> <br> " + "</td>";
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

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("slider-element");
    //var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slides[slideIndex - 1].style.display = "block";
}

/**
 * HTML-Tabelle Filtern
 * @param searchCol Spalte in der gesucht werden soll.
 */
function tableFilter(searchCol) {
    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("persTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[searchCol];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }

}

/** Toggle um die "responsive" class beim click des users zu navbar hinzuzufügen */
function toggleResNavbar() {
    var navBar = document.getElementById("myNavbar");
    var main   = document.getElementById("myMain");
    if (navBar.className === "navbar") {
        navBar.className += " responsive";
        main.className    = "resMain";
    } else {
        navBar.className = "navbar";
        main.className   = "";
    }
}

/**
 * Öffnen von Tabs
 * @param tabName zu öffnender Tab
 * @param evt
 */
function openTab(evt, tabName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

// einen Tab am start geöffnet anzeigen.
document.getElementById("defaultOpen").click();

function showLogin() {
    document.getElementById('login').style.display ='block';
}
function closeLogin() {
    document.getElementById('login').style.display ='none';
}
