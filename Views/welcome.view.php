<?php
ini_set('display_errors', 'Off');
$passerror = $_SESSION['passerror'];
$nameerror = $_SESSION['nameerror'];
$_SESSION['loggedin'] == 0;
ini_set('error_reporting', E_ALL );

?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Meine Seite</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../stylesheets/pt.css">
</head>
<body class="bgbcubes">
<?php 
  ini_set('display_errors', 'Off');
  if (empty($_SESSION['passerror']) == false or empty($_SESSION['nameerror']) == false)
  {
      echo "<div class='alert alert-danger' style='margin-left:5%; margin-right:5%; margin-top:1%'>" . $passerror . " " . $nameerror . "</div>";
      $_SESSION['passerror'] = "";
      $_SESSION['nameerror'] = "";

  }
  else
  {
    echo "<div class='alert alert-success' style='margin-left:5%; margin-right:5%; margin-top:5%;'><strong>Success:</strong> Erfolgreich abgemeldet!</div>";
  }
  ini_set('error_reporting', E_ALL );

  ?>

 <!-- Form -->
 <div class="container p-3 my-3 bg-dark text-white">
     <h3>Bitte melden Sie sich an!</h3>
    <form action="<?php echo htmlspecialchars('../Controllers/LoginController.php');?>" method="POST">

    <!-- Kundenname -->
      <div class="anmeldung">
        <div class="form-group row">
          <div class="col-sm-10">
            <label for="Benutzername" class="col-md-2 col-form-label-lg ">Benutzername</label>
            <input type="text" pattern="[A-Za-z]{2,}" class="input col-md-8" placeholder="Benutzername" id="benutzername" name="benutzername" required>
          </div>
        </div>
      </div>

      <div class="anmeldung">
        <div class="form-group row">
          <div class="col-sm-10">
            <label for="Passwort" class="col-md-2 col-form-label-lg ">Passwort</label>
            <input type="password" class="input col-md-8" placeholder="Passwort" id="passwort" name="passwort">
          </div>
        </div>
      </div>

      </br>
      <div class="d-grid gap-3">
        <input class="btn btn-outline-light btn-block" type="submit" value="Anmelden"/>
        <input class="btn btn-outline-light btn-block" type="reset" value="Zurücksetzen"/>
      </div>
      
    </form>
<script src="public/js/app.js"></script>
</body>
</html>
