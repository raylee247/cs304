<html>
<?php
	require 'template.php';
	//session_start();
	//require 'index.php';
	//echo $header;

	$sess = true;
	$trainer = 'Rival_1';
	if($sess){
		echo "<br>" . $trainer . "<br>";
		$trainer_info = executePlainSQL("SELECT * FROM trainer WHERE tid = '" . $trainer ."'");
		$row = OCI_Fetch_Array($trainer_info, OCI_BOTH); 
		
		$party = explode("," , $row[1]);
		for($i = 0; $i < count($party); $i++){
			echo "<tr><td>";
			$result = executePlainSQL("SELECT * FROM pokemon WHERE pid = '" . $party[$i] . "'");
			printPoke($result);
			echo "<button onclick="removePoke()">Remove Pokemon</button>";
			echo "</td></tr>";
		}
	}
	else{
		echo "Please <a href = login.php>Login</a> / <a href = register.php>Register</a> to view Trainer profile";
	}
	
function remove(){
	
}
	
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


<script>
function removePoke()
{
 alert("<?php remove(); ?>");
 }
</script>

</html>