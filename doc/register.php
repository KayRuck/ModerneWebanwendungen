<?php require_once('header.php') ?>
<?php require_once '../php/functions.php' ?>
<?php
if(isset($_POST['regBtn']))
{
    session_start();
    registrateUser();
}
?>
    <form action='' method="post">
    <main id="myMain">

        <h2>Registrieren</h2>
        <div class="regis-container">
            <i class="fa fa-user regis-icon"></i>
            <input class="regis-field" type="text" placeholder="Benutzername" name="usrnm">
        </div>

        <div class="regis-container">
            <i class="fa fa-envelope regis-icon"></i>
            <input class="regis-field" type="text" placeholder="Email Adresse" name="email">
        </div>

        <div class="regis-container">
            <i class="fa fa-key regis-icon"></i>
            <input class="regis-field" type="password" placeholder="Passwort" name="psw">
        </div>

        <div class="regis-container">
            <i class="fa fa-key regis-icon"></i>
            <input class="regis-field" type="password" placeholder="Passwort wiederholen" name="psw">
        </div>
        <button type="submit" class="regis-btn" name="regBtn">Register</button>
    </main>
    </form>


<?php require_once('footer.php') ?>