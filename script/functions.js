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
