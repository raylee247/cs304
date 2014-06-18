<!DOCTYPE HTML>
<html>
	<head>
		<title>PokeGuide</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
		<script src="js/jquery.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<link rel="stylesheet" href="cssmain/table.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
	</head>
	<body>
	<!-- ********************************************************* -->
		<div id="header-wrapper">
			<div class="container">
				<div class="row">
					<div class="12u">
						
						<?php require 'topMenubar.php';?>
					
					</div>
				</div>
			</div>
		</div>
		<div id="main">
			<div class="container">
				<div class="row main-row">
					<div class="12u">
					<h2 style='text-align:center;'>Pokemon List</h2>
<form name="input" action="pokemon.php" method="get">
Pokemon: <input type="text" name="pokemon">
<input type="submit" value="search">
</form> 
<?php
if(isset($_SESSION["username"]) && $numofPoke < 6){
echo "<br>";
echo "<center>Your Party is full with 6 Pokemon, remove one Pokemon to add another</center>";
}
?>
				<br>
<?php
	$pokemon = ucfirst(strtolower($_GET["pokemon"]));
	if($pokemon != null){
		//$pokemon = ucfirst($_POST["pokemon"]);
		$pokemons = array_map('ucfirst', explode(" " , $pokemon));
		$pokemon = implode(" " , $pokemons);
		$result = executePlainSQL("SELECT * FROM pokemon WHERE tname = '" . $pokemon . "' OR tname LIKE '%" . $pokemon . "%'");
	}
	else{
		$result = executePlainSQL("SELECT * FROM pokemon WHERE pid > 0 ORDER BY pid");
	}
	printPoke($result);
	
	
	//$result = executePlainSQL("select * from pokemon");
	//printPoke($result);
	
function printPoke($result){

//========== COUNTS THE NUMBER OF POKEMON IN PARTY
	$PID = executePlainSQL("SELECT party FROM party WHERE partyid = '{$_SESSION["username"]}'");
	$row = OCI_Fetch_Array($PID, OCI_BOTH);

	$updatedParty = explode(",", $row[0]);
	$numofPoke = count($updatedParty);
//==============================
	echo "<div class='Pokeguide'>";
	echo "<table>";
	
	echo "<tr>";
	echo "<td><font size='5px'>Pokedex Number</font></td>";
	echo "<td><font size='5px'>Name</font></td>";
	echo "<td><font size='5px'>Location</font></td>";
	echo "</tr>";
	echo "</table>";
	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) 
	{
		$locQuery = executePlainSQL("select lname from poke_found where pid={$row[0]}");
		$loc = OCI_Fetch_Array($locQuery, OCI_BOTH);
	
		
		echo "<table>";
		echo "<tr>";
		echo "<td><font size='5px'>{$row[0]}</font></td>";
		echo "<td><font size='5px'><a href = profile.php?name={$row[1]}>{$row[1]}</a></font></td>";
		echo "<td><font size='5px'>{$loc[0]}</font></td>";
		echo "</tr>";
		
		echo "<tr>";
		if(isset($_SESSION["username"]) && $numofPoke < 6)
		{
		echo "<td colspan='2'><img src='{$row[2]}' alt='picture'></td>";
		echo "<td>";
		echo "<form action='addPokemon.php' method='get'>";
		echo "<button name='submit' value='{$row[0]}'>Add Pokemon</button></form>";
		echo "</td>";
		}
		else
		{
		echo "<td colspan='3'><img src='{$row[2]}' alt='picture'></td>";
		}
		
	echo "</tr>";								
	}
	echo '</table>';
	echo '</div>';
}
?>				
					
					</div>
				</div>
			</div>
		</div>
		<div id="footer-wrapper">
			<div class="container">
				<div class="row">
					<div class="8u">
					</div>
					<div class="4u">
					</div>
				</div>
				<div class="row">
					<div class="12u">

						<div id="copyright">
									&copy; CS304 - PokeGuide. All rights reserved. | Design: HTML5 UP | Images: fotogrph
						</div>

					</div>
				</div>
			</div>
		</div>
	<!-- ********************************************************* -->
	</body>
</html>