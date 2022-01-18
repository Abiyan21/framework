<?php

        $stmt2 = $conn->prepare("SELECT a.auftragID, s.service, p.prioritaet, k.kundenname, k.email, st.status, m.name as Mitarbeiter, a.kommentar 
        FROM auftrag a
        inner JOIN kunde k on a.kunde_kundeID = k.kundeID
        inner Join service s on a.service_serviceID = s.serviceID
        inner JOIN prioritaet p on a.prioritaet_prioritaetID = p.prioritaetID
        inner JOIN stati st on a.stati_statiID = st.statiID
        left outer JOIN mitarbeiter m on a.mitarbeiter_mitarbeiterID = m.mitarbeiterID");
        $stmt2->execute();
        $slct = $stmt2->fetchall();
        echo "<pre>";
    print_r($slct);
    echo "</pre>";

        include "../Views/mainpage.view.php";

?>