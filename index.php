<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
// do not touch this includes!!! Never ever!!!
include "config/config.php";
include "include/tools.php";
include "include/functions.php";
include "include/init.php";
include "version.php";
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
		<meta name="viewport" content="width=device-width, initial-scale=0.6,maximum-scale=1, user-scalable=yes">
		<meta http-equiv="refresh" content="<?php echo REFRESHAFTER?>">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
		<!-- Das neueste kompilierte und minimierte CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<!-- Optionales Theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
		<!-- Das neueste kompilierte und minimierte JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<!-- Datatables -->
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		
		<link rel="stylesheet" href="style.css" type="text/css">
		
		<title>YSF Dashborad</title>
		
		<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
		
		<script>
			var i = 0;
			function move() {
				if ( document.getElementById("myBar") ) { 
					if (i == 0) {
						i = 1;
						var elem = document.getElementById("myBar");
						var width = 1;
						var id = setInterval(frame, 600);
						function frame() {
							if (width >= 100) {
								clearInterval(id);
								i = 0;
							} else {
								width++;
								elem.style.width = width + "%";
							}
						}
					}
				}
			}
		</script>

	</head>
	
	<body onload="move();">

		<div id="myProgress">
			<div id="myBar"></div>
		</div>

		<div class="page-header">
		
			<h1 class="H1">
				<?php echo getConfigItem("Info", "Name", $configs); ?>
			</h1>
			
			<br />
			
			<span class="H1">Id:[your id here]</span>
				<br />
			<span class="H1b">[comment here]</span>
			
			
			<div id="logo" class="LogoDiv"><img class="LogoImg" src="<?php echo LOGO ?>"></div>

		</div>

<?php

// checkSetup();

include "include/txinfo.php"; // JAVASCRIPT

include "include/lh.php";

include "include/gateways.php";

include "include/allheard.php";

//include "include/sysinfo.php";

//include "include/disk.php";

?>
		<div class="panel panel-info">YSFReflector-Dashboard by <b>IZ6RND</b></div>
		
	</body>
	
</html>

