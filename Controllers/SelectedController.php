<?php
    session_start();
    if($_SESSION['loggedin'] == false)
    {
        header("Location: ../Controllers/LoginController");
    }
    $slctauftrag = $_POST['verarbeiten'];

    require_once '../Models/config.inc.php';
    // Password Hash $2y$10$THXHMra9n0LAxraczsWUvOzqPYANA3vc2jq/An0R60Hb.txGTlhJK
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    
        global $conn;

        $stmt3 = $conn->prepare("SELECT a.auftragID, s.service, p.prioritaet, k.kundenname, k.email, st.status, m.name as Mitarbeiter, a.kommentar 
        FROM auftrag a
        inner JOIN kunde k on a.kunde_kundeID = k.kundeID
        inner Join service s on a.service_serviceID = s.serviceID
        inner JOIN prioritaet p on a.prioritaet_prioritaetID = p.prioritaetID
        inner JOIN stati st on a.stati_statiID = st.statiID
        LEFT OUTER JOIN mitarbeiter m on a.mitarbeiter_mitarbeiterID = m.mitarbeiterID
        WHERE a.auftragID = ?");
        $stmt3->execute(array($slctauftrag));
        $slct2 = $stmt3->fetchall();

    include '../Views/selected.view.php';
    
?>