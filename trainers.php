<!DOCTYPE HTML>
<!--
	Aerial 1.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<?php
	echo $header;
	require 'template.php';
	session_start();
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

<form name="input" action="trainers.php" method="get">
Trainer Name: <input type="text" name="trainer">
<input type="submit" value="search">
</form> 
 
<?php
	$trainer = ucfirst(strtolower($_GET["trainer"]));
	if($trainer != null){
		echo "<br>Search for " . $_GET["trainer"] . "<br>";  
		//Finds trainers 	
		$search_result = executePlainSQL("SELECT COUNT(*) FROM trainer WHERE tid = '" . $trainer ."' OR tid LIKE '%" . $trainer . "%'");
		$count = OCI_Fetch_Array($search_result, OCI_BOTH);
		echo "<br>" . $count[0] . " results found <br>";
		
		//FIND TRAINER VALUES - GRAB THE LIST OF POKEMON
		$trainer_info = executePlainSQL("SELECT * FROM trainer WHERE tid = '" . $trainer ."' OR tid LIKE '%" . $trainer . "%'");
		$name = OCI_Fetch_Array($trainer_info, OCI_BOTH);
		//echo $name[0];
	
		
		//FIND TRAINER LOCATIONS
		$loc = executePlainSQL("SELECT lname FROM live l WHERE l.tid LIKE '%"  . $trainer . "%' OR l.tid = '" . $trainer . "'");
		$location = OCI_Fetch_Array($loc, OCI_BOTH);
		//echo $location[0];
		//
		$party = explode("," , $name[1]);
		
		
		//Display information of each trainer that contains %trainer%
		if($count[0] == 1){
			echo "<br>Name:" . $name[0] . "<br>";
			echo "<br>Location:" . $location[0] . "<br>";
			echo "Party:";
			for($i = 0; $i < count($party); $i++){
				echo "<tr><td>";
				$result = executePlainSQL("SELECT * FROM pokemon WHERE pid = '" . $party[$i] . "'");
				printPoke($result);
				echo "</td></tr>";
			}
		}			
		if($count[0] > 1){
			while($row = OCI_Fetch_Array($trainer_info, OCI_BOTH)){
			
			echo "<br>Name:" . $row[0] . "<br>";
			echo "<br>Location:" . $location[0] . "<br>";
			echo "Party:";
			for($i = 0; $i < count($party); $i++){
				echo "<tr><td>";
				$result = executePlainSQL("SELECT * FROM pokemon WHERE pid = '" . $party[$i] . "'");
				printPoke($result);
				echo "</td></tr>";
				}
			}
		}
		
	}
	else{
		$regular = executePlainSQL("SELECT tid FROM trainer ORDER BY tid");
		printResult($regular);
	}
	
function printPoke($result){
	echo '<table>';
	echo '<tr><td>Name</td><td>Image</td></tr>';
	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		echo "<tr><td><a href = profile.php?name=" . $row[1] . ">" . $row[1] . "</a></td><td>" . '<img src="' . $row[2] . '" alt="picture">' . "</td></tr>";
		//echo '<tr><img src="' . $row[2] . '" alt="picture"></tr>';								
	}//<a href="pokemon.php" class="classname">Pokemon</a>
	echo '</table>';
}
?>
                    
	<!-->OCI_close();<-->
</html>