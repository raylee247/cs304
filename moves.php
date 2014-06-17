
<html>
	<?php
	require 'template.php';
	session_start();
	echo $header;
	?>

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
                    
					<body>
                		<table>
                        <thead>
                    	<tr>
                    		<td>Name</td>
                    		<td>Type</td>
                            <td>PP</td>
                            <td>PID</td>
                    	</tr>
                        </thead>
                        <tbody>
							<?php
							$result = executePlainSQL("select * from moves");
							echo "<table>";
							while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
								echo "<tr><td>" . $row['name']. "</td><td>" . $row['type'] . "</td><td>" . $row['pp'] . "</td><td>" . $row['pid'] . "</td></tr>";  	
								}
								echo "</table>";
							?>
                   		 </tbody>
                     	 </table>
                	 </body>
                     
<form name="input" action="moves.php" method="get">
	Search by Move Name: <input type="text" name="move"> or
	<select id="types" name="types">
		  <option value="type">Types</option>}
		  <option value="normal">Normal</option>
		  <option value="fighting">Fighting</option>
		  <option value="flying">Flying</option>
		  <option value="poison">Poison</option>
		  <option value="ground">Ground</option>
		  <option value="rock">Rock</option>
		  <option value="bug">Bug</option>
		  <option value="ghost">Ghost</option>
		  <option value="fire">Fire</option>
		  <option value="water">Water</option>
		  <option value="grass">Grass</option>
		  <option value="electric">Electric</option>
		  <option value="psychic">Psychic</option>
		  <option value="ice">Ice</option>
		  <option value="dragon">Dragon</option>
		</select> 
	<input type="submit" value="search">
	</form> 

<form action="moves.php">
    <input type="submit" name="maxPP" value="maxPP" onclick="insert()" />
    <input type="submit" name="minPP" value="minPP" onclick="select()" />
</form>
		
<?php
if($_GET){
		if(isset($_GET['maxPP'])){
			maxpp();
		}elseif(isset($_GET['minPP'])){
			minpp();
		}
	}
	$type = $_GET['types'];
	$move = ucfirst(strtolower($_GET["move"]));
	if($move !=null || $type != null){
		if($move != null){
			//$pokemon = ucfirst($_POST["pokemon"]);
			$result = executePlainSQL("SELECT name,type,pp,effect FROM moves WHERE name = '" . $move . "' OR name LIKE '%" . $move . "%'");
			$search_result = executePlainSQL("SELECT COUNT(*) FROM moves WHERE name = '" . $move . "' OR name LIKE '%" . $move . "%'");
			$count = OCI_Fetch_Array($search_result, OCI_BOTH);
			echo "<br>" . $count[0] . " results found <br>";
			
		}
		if($type != null && $type != "type"){
			$type = strtoupper($type);
			$result = executePlainSQL("SELECT name,type,pp,effect FROM moves WHERE type = '" . $type . "'");
			$search_result = executePlainSQL("SELECT COUNT(*) FROM moves WHERE type = '" . $type . "'");
			$count = OCI_Fetch_Array($search_result, OCI_BOTH);
			echo "<br>" . $count[0] . " results found <br>";
		}
	}
	else{
		$result = executePlainSQL("SELECT * FROM moves");
	}
	printResult($result);
	//$result = executePlainSQL("select * from pokemon");
	//printPoke($result);

function maxpp(){
	$max = executePlainSQL("SELECT * FROM moves m1 WHERE m1.pp >= ALL (SELECT m2.pp FROM moves m2)");
	printResult($max);
}

function minpp(){
	$min = executePlainSQL("SELECT * FROM moves m1 WHERE m1.pp <= ALL (SELECT m2.pp FROM MOVES m2)");
	printResult($min);
}
?>
	
</html>
