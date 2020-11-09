#!/usr/bin/php -q
<?php
set_time_limit(30);
$param_error_log = '/tmp/notas.log';
$param_debug_on = 1;
require('phpagi.php');
$agi = new AGI();
$agi->answer();
sleep(1);
$agi->exec_agi("googletts.agi,\"Usted compro un pan con queso\",es");

require("definiciones.inc");
$link = mysql_connect(MAQUINA, USUARIO,CLAVE); 
mysql_select_db(DB, $link); 
$result = mysql_query("INSERT INTO ventas (nombre, costo, envoltura) VALUES ('Pan con queso', 5000, 'Bolsa de papel');", $link);


$agi->exec_agi("googletts.agi,\"Hasta la proxima lo estaremos experando\",es");

$agi->hangup();