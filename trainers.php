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

<head>
    <style>
    .Pokeguide {
	margin:0px;padding:0px;
	width:100%;
	box-shadow: 10px 10px 5px #888888;
	border:1px solid #ffffff;
	
	-moz-border-radius-bottomleft:3px;
	-webkit-border-bottom-left-radius:3px;
	border-bottom-left-radius:3px;
	
	-moz-border-radius-bottomright:3px;
	-webkit-border-bottom-right-radius:3px;
	border-bottom-right-radius:3px;
	
	-moz-border-radius-topright:3px;
	-webkit-border-top-right-radius:3px;
	border-top-right-radius:3px;
	
	-moz-border-radius-topleft:3px;
	-webkit-border-top-left-radius:3px;
	border-top-left-radius:3px;
}.Pokeguide table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:100%;
	margin:0px;padding:0px;
}.Pokeguide tr:last-child td:last-child {
	-moz-border-radius-bottomright:3px;
	-webkit-border-bottom-right-radius:3px;
	border-bottom-right-radius:3px;
}
.Pokeguide table tr:first-child td:first-child {
	-moz-border-radius-topleft:3px;
	-webkit-border-top-left-radius:3px;
	border-top-left-radius:3px;
}
.Pokeguide table tr:first-child td:last-child {
	-moz-border-radius-topright:3px;
	-webkit-border-top-right-radius:3px;
	border-top-right-radius:3px;
}.Pokeguide tr:last-child td:first-child{
	-moz-border-radius-bottomleft:3px;
	-webkit-border-bottom-left-radius:3px;
	border-bottom-left-radius:3px;
}.Pokeguide tr:hover td{
	background-color:#ffffff;
		

}
.Pokeguide td{
	vertical-align:middle;
	
	background-color:#8fc1ea;

	border:1px solid #ffffff;
	border-width:0px 1px 1px 0px;
	text-align:center;
	padding:13px;
	font-size:14px;
	font-family:Verdana;
	font-weight:normal;
	color:#6d6d6d;
}.Pokeguide tr:last-child td{
	border-width:0px 1px 0px 0px;
}.Pokeguide tr td:last-child{
	border-width:0px 0px 1px 0px;
}.Pokeguide tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.Pokeguide tr:first-child td{
		background:-o-linear-gradient(bottom, #3371af 5%, #3371af 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #3371af), color-stop(1, #3371af) );
	background:-moz-linear-gradient( center top, #3371af 5%, #3371af 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#3371af", endColorstr="#3371af");	background: -o-linear-gradient(top,#3371af,3371af);

	background-color:#3371af;
	border:0px solid #ffffff;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:15px;
	font-family:Helvetica;
	font-weight:bold;
	color:#ffffff;
}
.Pokeguide tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #3371af 5%, #3371af 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #3371af), color-stop(1, #3371af) );
	background:-moz-linear-gradient( center top, #3371af 5%, #3371af 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#3371af", endColorstr="#3371af");	background: -o-linear-gradient(top,#3371af,3371af);

	background-color:#3371af;
}
.Pokeguide tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.Pokeguide tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
    </style>
    </head>

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
	
		//$party = explode("," , $name[1]);
		
		
		//Display information of each trainer that contains %trainer%
		if($count[0] == 1){
			$party = explode("," , $name[1]);
			echo "<br>Name:" . $name[0] . "<br>";
			echo "<br>Location:" . $location[0] . "<br>";
			echo "Party:";
			for($i = 0; $i < count($party); $i++){
				echo "<tr><td>";
				$result = executePlainSQL("SELECT * FROM pokemon WHERE pid = '" . $party[$i] . "'");
				printTrainer($result);
				echo "</td></tr>";
			}
		}			
		if($count[0] > 1){
			while($row = OCI_Fetch_Array($trainer_info, OCI_BOTH)){
				echo "<br>Name:" . $row[0] . "<br>";
				echo "<br>Location:" . $location[0] . "<br>";
				echo "Party:";
				$party = explode(',' , $row[1]);
				for($i = 0; $i < count($party); $i++){
					echo "<tr><td>";
					$result = executePlainSQL("SELECT * FROM pokemon WHERE pid = '" . $party[$i] . "'");
					printTraier($result);
					echo "</td></tr>";
					}
			}
		}
		
	}
	else{
		$regular = executePlainSQL("SELECT tid FROM trainer ORDER BY tid");
		printResult($regular);
	}
	
function printTrainer($result){
	echo "<div class='Pokeguide'>";
	echo '<table>';
	echo '<tr><td>Name</td><td>Image</td></tr>';
	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		echo "<tr><td><a href = profile.php?name=" . $row[1] . ">" . $row[1] . "</a></td><td>" . '<img src="' . $row[2] . '" alt="picture">' . "</td></tr>";
		//echo '<tr><img src="' . $row[2] . '" alt="picture"></tr>';								
	}//<a href="pokemon.php" class="classname">Pokemon</a>
	echo '</table>';
	echo '</div>';
}
?>
                    
	<!-->OCI_close();<-->
</html>