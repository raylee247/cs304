<html>
<?php
	require 'template.php';
	ini_set('session.save_path', '/home/i/i5a8/');
	session_start();
	//require 'index.php';
	//echo $header;
?>

<form name="input" action="pokemon.php" method="get">
Pokemon: <input type="text" name="pokemon">
<input type="submit" value="search">
</form> 

<?php
	$pokemon = ucfirst(strtolower($_GET["pokemon"]));
	if($pokemon != null){
		//$pokemon = ucfirst($_POST["pokemon"]);
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
	
	echo '<table>';
	echo '<tr><td>PID</td><td>Name</td><td>Image</td></tr>';
	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		echo "<tr><td>" . $row[0] . "</td><td><a href = profile.php?name=" . $row[1] . ">" . $row[1] . "</a></td><td>" . '<img src="' . $row[2] . '" alt="picture">' . "</td>";
		if(isset($_SESSION["username"]) && $numofPoke < 6)
		{
		echo "<td>";
		echo "<form action='addPokemon.php' method='get'>";
		echo "<button name='submit' value='{$row[0]}'>Add Pokemon</button></form>";
		echo "</td>";
		}
		echo "</tr>";								
	}
	echo '</table>';
}
?>
</html>