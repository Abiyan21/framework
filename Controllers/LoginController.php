<?php
session_start();

require_once '../Models/config.inc.php';
// Password Hash $2y$10$THXHMra9n0LAxraczsWUvOzqPYANA3vc2jq/An0R60Hb.txGTlhJK

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "Connected successfully";

function logincheck($benutzername,$passwort)
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM mitarbeiter WHERE username = ?");
    $stmt->execute(array($benutzername));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $usr = $user["username"] ?? null;
    
    
        if($benutzername==$usr)
        {
        if (password_verify($passwort, $user['passwort']))
        {
            $_SESSION['username'] = $benutzername;
            $_SESSION['loggedin'] = true;
            require "../Controllers/MainController.php";
            exit;
        }
        else
        {
            $_SESSION['passerror'] = "<strong>Error:</strong> Das Passwort ist falsch!";
            $_SESSION['loggedin'] = false;
            require '../Views/welcome.view.php';
        }

    }else 
    {
        $_SESSION['nameerror'] = "<strong>Error:</strong> Der Benutzername ist falsch!";
        $_SESSION['loggedin'] = false;
        require '../Views/welcome.view.php';
    }
    }
ini_set('display_errors', 'Off');
if ($_SESSION['loggedin'] == 1)
{
    header("location: MainController.php");
}
else
{
    if (isset($_POST['benutzername']))
    {
        $benutzername = $_POST['benutzername'];
    }    
    else 
    {    
        $_SESSION['nameerror'] = '<strong>Error:</strong> Bitte geben Sie Ihren Namen ein';
        require_once '../Views/welcome.view.php';
    }

    if (isset($_POST['passwort']))
    {
        $passwort = $_POST['passwort'];
    }
    else
    {
            $_SESSION['passerror'] = '<strong>Error:</strong> Bitte geben Sie Ihren Passwort ein.';
        require_once '../Views/welcome.view.php';
    }


    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {

        logincheck($benutzername,$passwort);
        
    }
}
ini_set('error_reporting', E_ALL );


?>