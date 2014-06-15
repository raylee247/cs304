<!DOCTYPE HTML>
<!--
	Aerial 1.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<?php
	require 'template.php';
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
								<li><a href="trainers.php" class="classname">Trainers</a></li>
                               <li><a href="types.php" class="classname">Types</a>
                               <li><a href="teamBuilder.php" class="classname"> Team Buidler </a></li>
							</ul>
						</nav>
					</header>

<form name="input" action="items.php" method="get">
Item: <input type="text" name="item">
<input type="submit" value="search">
</form> 
 
                    <body>
                		<table>
                        <thead>
                    	<tr>
                    		<td>IID</td>
                    		<td>Type</td>
                    	</tr>
                        </thead>
                        <tbody>
							<?php
							$result = executePlainSQL("select * from item");
							echo "<table>";
							while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
								echo "<tr><td>" . $row['iid']. "</td><td>" . $row['type'] . "</td></tr>";  	
								}
								echo "</table>";
							}
							?>
                   		 </tbody>
                     	 </table>
                     </body>
                
             
<?php

//SEARCH
	$item = ucfirst($_GET["item"]);
	if($item != null){
		$result = executePlainSQL("select * from item where type = '" . $item . "'");
	}
	else{
		$result = executePlainSQL("select * from item");
	}
	printItem($result);
	
//Print result	
function printPoke($result){
	echo '<table>';
	echo '<tr><td>IID</td><td>Type</td></tr>';
	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		//echo "<tr><td>" . $row[0] . "</td><td><a href = profile.php?name=" . $row[1] . ">" . $row[1] . "</a></td><td>" . '<img src="' . $row[2] . '" alt="picture">' . "</td></tr>";
		//echo '<tr><img src="' . $row[2] . '" alt="picture"></tr>';								
	}//<a href="pokemon.php" class="classname">Pokemon</a>
	echo '</table>';
}
?>
                    
	<!-->OCI_close();<-->
</html>