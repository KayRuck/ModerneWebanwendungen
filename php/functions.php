<?php
include('phpfastcache/phpfastcache.php');

function getConnection() {
    $mysqlhost="localhost"; // MySQL-Host angeben
    $mysqluser="root"; // MySQL-User angeben
    $mysqlpwd=""; // Passwort angeben
    $mysqldb="bcg"; // Gewuenschte Datenbank angeben

    $connection=mysqli_connect($mysqlhost, $mysqluser, $mysqlpwd, $mysqldb)
        or die("Failed to connect to MySQL: " . mysqli_connect_error());
    mysqli_set_charset($connection, 'utf8');
    return $connection;
}

function registrateUser()
{
    $con = getConnection();
    $username = $_POST['usrnm'];
    $useremail = $_POST['email'];
    $userpsw = $_POST['psw'];
    $query = "INSERT INTO user(username, password, email) VALUES ('$username', '$userpsw', '$useremail')";
    mysqli_query($con, "CREATE USER '$username'@'localhost' IDENTIFIED BY '$userpsw';");
    mysqli_query($con,"GRANT ALL ON bcg.* TO '$username'@'localhost'");
    mysqli_query($con, $query);
}

function loginUser()
{
    $mysqlhost="localhost"; // MySQL-Host angeben
    $mysqluser=$_POST['uname']; // MySQL-User angeben
    $mysqlpwd=$_POST['psw']; // Passwort angeben
    $mysqldb="bcg"; // Gewuenschte Datenbank angeben

    $connection=mysqli_connect($mysqlhost, $mysqluser, $mysqlpwd, $mysqldb)
    or die("Failed to connect to MySQL: " . mysqli_connect_error());
    mysqli_set_charset($connection, 'utf8');

    $_SESSION['username'] = $mysqluser;
    $_SESSION['userpsw'] = $mysqlpwd;
    return $connection;
}

/**
 * Gibt die durchschnittliche Bewertung eines Buches
 * zurück. Es muss die intern verwendete buch_id des
 * Buches angegeben werden. 
 * Die Bewertung wird im Cache für $speicherdauer Sekunden
 * gespeichert, um die Ladegeschwindigkeit zu optimieren.
 * Das heißt, die Bewertung ist eventuell veraltet.
 *
 * @param buch_id Die intern genutzte ID des Buches
 * @return Die durchschnittliche Bewertung des Buches 
*/
function getAVGbuchbewertung($buch_id) {
	$speicherdauer = 60;
	$cache = phpFastCache();
	$key = "bewertung$buch_id";
	
	$bewertung = $cache->get($key);
	if($bewertung == null) {
		$con = getConnection();
		$sql = "SELECT AVG(bewertung) `Bewertung` FROM `userbook` WHERE buch_id = $buch_id GROUP BY buch_id";
		$query = mysqli_query($con, $sql) or die("ERROR in der Funktion getAVGbuchbewertung");
		$data = mysqli_fetch_array($query);
		$bewertung = $data['Bewertung'];
		
		$cache->set($key, $bewertung, $speicherdauer);
	}
    return $bewertung;
}

/**
 * Speichert die Buchbewertung von einem Nutzer.
 * Dabei ist zu beachten, dass ein Nutzer nur Bücher bewerten
 * kann, die in seiner Leseliste enthalten sind. Wenn
 * das Buch nicht in der Leseliste vorhanden ist, dann
 * wird die Bewertung nicht in die Datenbank aufgenommen.
 *
 * @param $username Eindeutiger Name des Nutzers
 * @param $buch_id ID des zu bewertenden Buches
 * @param $bewertung Die Bewertung des Nutzers
*/
function buchBewerten($username, $buch_id, $bewertung) {
	$con = getConnection();
	$sql = "UPDATE userbook SET bewertung = $bewertung WHERE username = '$username' AND buch_id = $buch_id ";
	mysqli_query($con, $sql) or die("ERROR in der Funktion buchBewerten");	
}
?>