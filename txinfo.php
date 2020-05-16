<?php

$mode = "normal"; // "demo" or "normal"  legge un file di Log in finta trasmissione

$debug = 0; 
/* 
LIVELLI: 
0: nulla
1 solo TX
2 LIVELLO PURPLE
3: LIVELLO ORANGE
4: LIVELLO DEEP / BLACK
*/

header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
include "config/config.php";
include "include/tools.php";
include "include/functions.php";

$configs = getYSFReflectorConfig();

$logLines = getYSFReflectorLogIZ6RND($mode); // BLUE

if ($debug > 0){
	echo "<b><font color=red>[Debug Attivato]</font></b>";
} else {
	// echo "<b><font color=gray>[Debug Disattivato]</font></b>";
}

if ($debug >= 4){
	echo "<div class=\"DebugDeep\">";
	echo "[DebugDeep: 4]<br />";
	print_r($logLines);
	echo "</div>";
}

$reverseLogLines = $logLines;
array_multisort($reverseLogLines,SORT_DESC);


// LIVELLO PINK
if ($debug >= 2){
	echo "<div class=\"DebugPink\">";
	echo "[DebugPink: 2]<br />";
	print_r($reverseLogLines);
	echo "</div>";
}


// $lastHeard = getLastHeard($reverseLogLines, True);
$lastHeard = getLastHeardIZ6RND($reverseLogLines, True);
// $lastHeard = getHeardList($reverseLogLines);

// LIVELLO ORANGE
if ($debug >= 3){
	echo "<div class=\"DebugOrange\">";
	echo "[DebugOrange: 3]<br />";
	print_r($lastHeard);
	echo "</div>";
}

$listElem = $lastHeard[0];


if ($debug >= 1){
	echo "<div class=\"DebugRed\">";
	echo "[DebugRed: 1]<br />";
	print_r($listElem);
	echo "</div>";
}


if ( $listElem[4] == "transmitting" && $listElem[1] != "" ) {
	echo "<table>";
	echo "<tr>";
	echo"<td nowrap class=\"rigaTX\">$listElem[0]</td>"; // TIME STAMP
	echo"<td nowrap class=\"rigaTX\">".str_replace("0","&Oslash;",$listElem[1])."</td>"; // CALL SIGN
	echo"<td nowrap class=\"rigaTX\">$listElem[2]</td>"; 
	echo"<td nowrap class=\"rigaTX\">".str_replace("0","&Oslash;",$listElem[3])."</td>";
	$UTC = new DateTimeZone("UTC");
	$d1 = new DateTime($listElem[0], new DateTimeZone(TIMEZONE));
	$d2 = new DateTime('now', new DateTimeZone(TIMEZONE));
	$diff = $d2->getTimestamp() - $d1->getTimestamp();
	echo"<td nowrap class=\"rigaTX\">$diff s</td>"; // TEMPO
	echo "</tr>";
	echo "</table>";
} else {
	// echo"<table><tr><td colspan=\"5\" class=\"riga\">[$MyIntermittenza] nessuna trasmissione</td></tr></table>";
	echo"<table><tr><td colspan=\"5\" class=\"riga\"></td></tr></table>";
}

?>


