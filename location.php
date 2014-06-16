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
							  <li><a href="moves.php" class="classname">Moves</a></li>
							 <li> <a href="items.php" class="classname">Items</a></li>
								<li><a href="trainers.php" class="classname">Trainers</a></li>
                               <li><a href="types.php" class="classname">Types</a>
                               <li><a href="teamBuilder.php" class="classname"> Team Buidler </a></li>
							</ul>
						</nav>
                     </header>
                 
<form name="input" action="location.php" method="get">
Location: <input type="text" name="location">
<input type="submit" value="search">
</form> 				

				<body>
                		<table>
                        <thead>
                    	<tr>
                    		<td>lname</td>
                    		<td>description</td>
                    	</tr>
                        </thead>
                        <tbody>
							<?php
							$result = executePlainSQL("select * from location");
							echo "<table>";
							while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
								echo "<tr><td>" . $row['lname']. "</td><td>" . $row['description'] . "</td></tr>";  	
								}
								echo "</table>";
							?>
                   		 </tbody>
                     	 </table>  
                 </body>

<?php

//SEARCH
	$location = ucfirst($_GET["location"]);
	if($item != null){
		$result = executePlainSQL("select * from location where lname = '" . $location . "'");
	}
	else{
		$result = executePlainSQL("select * from location");
	}
	printItem($result);
	
//Print result	
function printLocation($result){
	echo '<table>';
	echo '<tr><td>lname</td><td>description</td></tr>';
	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		//echo "<tr><td>" . $row[0] . "</td><td><a href = profile.php?name=" . $row[1] . ">" . $row[1] . "</a></td><td>" . '<img src="' . $row[2] . '" alt="picture">' . "</td></tr>";
		//echo '<tr><img src="' . $row[2] . '" alt="picture"></tr>';								
	}//<a href="pokemon.php" class="classname">Pokemon</a>
	echo '</table>';
}
?>
                    
	<!-->OCI_close();<-->
</html>