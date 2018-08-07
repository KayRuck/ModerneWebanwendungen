
<?php require_once('header.php') ?>


<main>

    <h2>Passwort vergessen</h2>
    <p> Bitte Email Adresse und Benutzernamen eingeben</p>
    <div class="regis-container">
        <i class="fa fa-user regis-icon"></i>
        <input class="regis-field" type="text" placeholder="Benutzername" name="usrnm">
    </div>

    <div class="regis-container">
        <i class="fa fa-envelope regis-icon"></i>
        <input class="regis-field" type="text" placeholder="Email Adresse" name="email">
    </div>

    <button type="submit" class="regis-btn">Register</button>
</main>


<?php require_once('footer.php') ?>