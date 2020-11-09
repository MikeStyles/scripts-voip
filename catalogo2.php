#!/usr/bin/php -q
<?php
set_time_limit(30);
$param_error_log = '/tmp/notas.log';
$param_debug_on = 1;
require('phpagi.php');
$agi = new AGI();
$agi->answer();
sleep(1);
$agi->exec_agi("googletts.agi,\"Bienvenido a la panaderia de panes la comarca\",es");

require("definiciones.inc");
$link = mysql_connect(MAQUINA, USUARIO,CLAVE); 
mysql_select_db(DB, $link); 
$result = mysql_query("SELECT nombre,envoltura,costo FROM panes", $link);  

while ($row = mysql_fetch_array($result)){ 
	$agi->exec_agi("googletts.agi,\"".$row['nombre']."\",es");
	sleep(1);
	$agi->exec_agi("googletts.agi,\"".$row['envoltura']."\",es");
	sleep(1);
	$agi->exec_agi("googletts.agi,\"".$row['costo']."\",es");

} 
$agi->goto_dest('ivr-4');
$agi->exec_agi("googletts.agi,\"Para adquirir uno de nuestros productos marque los siguientes numeros\",es");
sleep(1);
$agi->exec_agi("googletts.agi,\"Si desea el pan con queso marque 1\",es");
sleep(1);
$agi->exec_agi("googletts.agi,\"Si desea el pan blanco marque 2\",es");
sleep(1);
$agi->exec_agi("googletts.agi,\"Si desea el pan dulce marque 3\",es");
sleep(1);
$agi->exec_agi("googletts.agi,\"Si desea el pan pizza marque 4\",es");



