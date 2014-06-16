<!DOCTYPE HTML>
<!--
	Aerial 1.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<?php
	echo $header;
	?>

				<!-- Header -->
					 <header id="menu">
                	<nav>
               		 <ul>
                		<li><a href="index.php" class="classname">Back To Home</a></li>
                	</ul>
                    </nav>
						<nav>
							<ul>
                            <li><a href="pokemon.php" class="classname">Pokemon</a></li>
							  <li><a href="location.php" class="classname">Location</a></li>
							  <li><a href="moves.php" class="classname">Moves</a></li>
                                <li> <a href="items.php" class="classname">Items</a></li>
                               <li><a href="types.php" class="classname">Types</a>
                               <li><a href="teamBuilder.php" class="classname"> Team Buidler </a></li>
							</ul>
						</nav>
					</header>
                
<form name="input" action="trainers.php" method="get">
Trainer: <input type="text" name="trainer">
<input type="submit" value="search">
</form> 
				<body>
                		<table>
                        <thead>
                    	<tr>
                    		<td>tid</td>
                    		<td>party</td>
                            <td>password</td>
                    	</tr>
                        </thead>
                        <tbody>
							<?php
							$result = executePlainSQL("select * from trainer");
							echo "<table>";
							while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
								echo "<tr><td>" . $row['tid']. "</td><td>" . $row['party'] . "</td><td>" . $row['password'] . "</td></tr>";  	
								echo "</table>";
							?>
                   		 </tbody>
                     	 </table>
                	 </body>
<?php

//SEARCH
	$trainer = ucfirst($_GET["trainer"]);
	if($trainer != null){
		$result = executePlainSQL("select * from trainer where tid = '" . $trainer . "'");
	}
	else{
		$result = executePlainSQL("select * from trainer");
	}
	printItem($result);
	
//Print result	
function printMoves($result){
	echo '<table>';
	echo '<tr><td>tid</td><td>party</td><td>Password</td></tr>';
	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		//echo "<tr><td>" . $row[0] . "</td><td><a href = profile.php?name=" . $row[1] . ">" . $row[1] . "</a></td><td>" . '<img src="' . $row[2] . '" alt="picture">' . "</td></tr>";
		//echo '<tr><img src="' . $row[2] . '" alt="picture"></tr>';								
	}//<a href="pokemon.php" class="classname">Pokemon</a>
	echo '</table>';
}
?>
                    
	<!-->OCI_close();<-->
</html>