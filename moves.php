
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
    
    
   <form name="input" action="moves.php" method="post" style="float:center">
  Filter Moves by Type:
            <select id="filtertypes" name="filtertypes">
              <option value="type">Types</option>
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
           </select> and PP:
           <select id="filterpp" name="filterpp">
              <option value="5">5</option>
              <option value = "10">10</option>
              <option value="10">15</option>
              <option value="20">20</option>
  			  <option value = "25">25</option>
  		   	  <option value = "30">30</option>
  			  <option value = "35">35</option>
              <option value="40">40</option>
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


	if(isset($_GET['filtetypes'])&&(isset($_GET['filterpp']))){
	$filtertype = $_GET['filtertypes'];
	$fitlerpp = $_GET['filterpp'];
 	 //$filtermove = ucfirst(strtolower($_POST["filtermove"]));
		if ($filtertype !==null && $filterpp !==null){
			$result = executePlainSQL("SELECT * FROM moves m1 WHERE NOT EXISTS(SELECT * from moves m2 WHERE NOT EXISTS(SELECT * from moves m3 WHERE m3.type = '{$filtertypes}' AND m3.pp ='{$filterpp}'))");
			}else{
			$result = executePlainSQL("SELECT * FROM moves");
		}printResult($result);
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
	
	function filterMoves(){
		if($_POST['submit'] && $_POST['submit'] != 0){
            $filtertype=$_POST['filtertypes'];
			$pp=$_POST['filterpp'];
            echo $filtertype;
			echo $pp;
        }
         $move = ucfirst(strtolower($_POST["fitlermove"]));
         if($move !== null){
                 //$pokemon = ucfirst($_POST["pokemon"]);
                 $result = executePlainSQL("SELECT * FROM moves m1 WHERE NOT EXISTS(SELECT * from moves m2 WHERE NOT EXISTS(SELECT * from moves m3 WHERE m3.type = '" .$filtertype. "' AND m3.pp ='" . $pp . "'))");
         }
		 else{
                 $result = executePlainSQL("SELECT * FROM moves");
         }
        printResult($result);
		}
        

  

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
