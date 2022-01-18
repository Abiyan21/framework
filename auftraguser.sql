USE `auftrag` ;

CREATE USER 'auftraguser'@'localhost' IDENTIFIED BY 'auftrag123';

GRANT delete, insert, select, update on *.* TO 'auftraguser'@'localhost';

show grants for 'auftraguser'@'localhost';
