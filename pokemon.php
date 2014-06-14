<html>
<?php
	require 'template.php';
	session_start();
	//require 'index.php';
	//echo $header;
?>

<form name="input" action="pokemon.php" method="get">
Pokemon: <input type="text" name="pokemon">
<input type="submit" value="search">
</form> 

<?php

//SEARCH
	$pokemon = ucfirst($_GET["pokemon"]);
	if($pokemon != null){
		//$pokemon = ucfirst($_POST["pokemon"]);
		$result = executePlainSQL("select * from pokemon where name = '" . $pokemon . "'");
	}
	else{
		$result = executePlainSQL("select * from pokemon");
	}
	printPoke($result);
	
//Print result	
function printPoke($result){
	echo '<table>';
	echo '<tr><td>PID</td><td>Name</td><td>Image</td></tr>';
	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		echo "<tr><td>" . $row[0] . "</td><td><a href = profile.php?name=" . $row[1] . ">" . $row[1] . "</a></td><td>" . '<img src="' . $row[2] . '" alt="picture">' . "</td></tr>";
		//echo '<tr><img src="' . $row[2] . '" alt="picture"></tr>';								
	}//<a href="pokemon.php" class="classname">Pokemon</a>
	echo '</table>';
}
?>
</html>