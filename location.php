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
                               <li><a href="teamBuilder.php" class="classname"> Team Builder </a></li>
							</ul>
						</nav>
                     </header>
                 
<form name="search" action="location.php" method="post">
Search Location: <input type="text" name="location"> 
<input type="submit" value="search">
</form> 	

				

<?php

//SEARCH
	if(isset($_POST['location'])){
                 $location = $_POST ['options'];
	              echo $location;
         }
	$location = ucfirst(strtolower($_POST["location"]));
	
	if($location != null){ //changing to !== null will make it show only locations in queries 
		//$location = str_replace(' ', '', $location);
		$location =	preg_replace('/\s+/', '', $location);
		$result = executePlainSQL("SELECT * FROM location WHERE lname = '" . $location . "' OR lname LIKE '%" . $location . "%'");

	}
	else{
		$result = executePlainSQL("SELECT * FROM location");
	}
	var_dump(location);
	printLocation($result);

//Print result	

function printLocation($result){
	echo "<div class='Pokeguide'>";
	echo '<table>';
	echo '<tr><td>Location</td><td>Description</td></tr>';
	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		if((strpos($row[0],'Evolve') === false) and (strpos($row[0],'LName') === false)){	  
			echo '<tr>';
			echo '<td>' . $row[0] . '</td>';
			echo '<td>' . $row[1] . '</td>';
			echo '</tr>';
		}
		
							
	}
	echo "</table>";
	echo "</div>";
}

?>
                    
	
</html>