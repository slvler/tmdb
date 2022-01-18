<?php


require_once "src/SeederClass.php";



$Seeder = new SeederClass();



$Seeder->setSender('Origin', '192.168.0.2','Party sending the information');
$Seeder->setReceiver('Target','10.2.1.3','Intended recipient of the information');
print $Seeder->getxml();