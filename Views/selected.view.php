<?php
print_r($_SESSION['loggedin']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesheets/pt.css">
    <title>Document</title>
</head>
<body class="bgbcubes">
<div class="container-fluid p-2 bg-dark text-white">
    <div class="row">
      <div class="col-md-4 pt-1">
        <img src="img/logo-really-small.png" class="logo" alt="Logo">
      </div>
      <div class="col-md-4 p-3">
        <ul class="nav nav-pills justify-content-center">
          <li class="nav-item" style="margin:1%">
            <a class="btn btn-outline-light active" href="../Controllers/MainController.php">Home</a>
          </li>
          <li class="nav-item" style="margin:1%">
            <a class="btn btn-outline-light"  href="kontakt.html">Kontakt</a>
          </li>
        </ul>
      </div>
      <div class="col-md-4 p-3 justify-content-center">
        <a type="button" class="btn btn-danger float-end" style="margin: 1%;" href="LogoutController.php">Logout</a>
      </div>
    </div>
  </div>
  <a class="btn btn-outline-light active" href="../Controllers/LoginController.php">Return</a>
<?php
  if ($slct2)
  {
    foreach ($slct2 as $slct2)
    {
      echo $slct2['auftragID'] . "|" . $slct2['service'] . "|" . $slct2['prioritaet'] . "|" . $slct2['kundenname'] . '<br>';
    }
  }
?>

</body>
</html>