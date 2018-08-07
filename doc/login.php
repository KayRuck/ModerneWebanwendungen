<div id="login" class="modal">
    <span onclick="closeLogin()" class="close" title="Close Modal">&times;</span>
    <form class="modal-content animate">
        <div class="modal-container">
            <label for="uname"><strong>Benutzername</strong></label>
            <input type="text" placeholder="Benutzername" name="uname" required>

            <label for="psw"><strong>Passwort</strong></label>
            <input type="text" placeholder="Passwort" name="psw" required>

            <button class="submit modal-button" type="submit">Login</button>
            <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>
        <div class="modal-container modal-container-down" >
            <button type="button" onclick="closeLogin()" class="cancelbtn modal-button">Cancel</button>
            <a class="loginLink" href="passwortVergessen.php">Passwort vergessen?</a>
            <a class="loginLink" href="register.php">Neu hier?</a>
        </div>
    </form>
</div>