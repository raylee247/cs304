<html>
<?php
	require 'template.php';
	ini_set('session.save_path', '/home/i/i5a8/');
	session_start();
	
	if(isset($_SESSION["username"]))
	{
		echo "<br>Welcome to your list of Pokemon {$_SESSION["username"]}<br>";
		$trainer_info = executePlainSQL("SELECT * FROM party WHERE partyid = '{$_SESSION["username"]}'");
		$row = OCI_Fetch_Array($trainer_info, OCI_BOTH); 
		$party = explode("," , $row[1]);
		
	//DELETE USER BUTTON
		echo "<form action='deleteUser.php'>";
		echo "<button name='delete'>DELETE USER</button></form>";
		echo "</td></tr>";
	//LOG OUT BUTTON
		echo "<form action='deleteUser.php' method='get'>";
		echo "<button name='logout' value='1'>LOG OUT</button></form>";
		echo "</td></tr>";
	//==========================	
		for($i = 0; $i < count($party); $i++)
		{
			echo "<tr><td>";
			$result = executePlainSQL("SELECT * FROM pokemon WHERE pid = '{$party[$i]}'");
			printPoke($result);
			echo "<form action='deletePoke.php' method='get'>";
			echo "<button name='submit' value='{$party[$i]}'>Remove Pokemon</button></form>";
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