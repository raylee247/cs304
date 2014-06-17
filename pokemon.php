<html>

<?php
	require 'template.php';
	ini_set('session.save_path', '/home/i/i5a8/');
	session_start();
	//require 'index.php';
	//echo $header;
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
								<li><a href="trainers.php" class="classname">Trainers</a></li>
                                <li> <a href="items.php" class="classname">Items</a></li>
                               <li><a href="types.php" class="classname">Types</a>
                               <li><a href="teamBuilder.php" class="classname"> Team Buidler </a></li>
							</ul>
						</nav>
					</header>
                   

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
	echo "<div class='Pokeguide'>";
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
	echo '</div>';
}
?>
</html>