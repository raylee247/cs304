
<html>
	<?php
<<<<<<< HEAD
	require 'template.php';
	session_start();
	echo $header;
	?>
=======
           require 'template.php';
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
>>>>>>> 1247d7b2365c86f951664b99b1cca78e4f2fea69

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


<?php

	if(isset($_GET['filtetype'])&&(isset($_GET['filterpp']))){
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
	if($move != null){
		//$pokemon = ucfirst($_POST["pokemon"]);
		$result = executePlainSQL("SELECT name,type,pp,effect FROM moves WHERE name = '" . $move . "' OR name LIKE '%" . $move . "%'");
		$search_result = executePlainSQL("SELECT COUNT(*) FROM moves WHERE name = '" . $move . "' OR name LIKE '%" . $move . "%'");
		$count = OCI_Fetch_Array($search_result, OCI_BOTH);
		echo "<br>" . $count[0] . " results found <br>";
		
	}
	if($type != null){
		$type = strtoupper($type);
		$result = executePlainSQL("SELECT name,type,pp,effect FROM moves WHERE type = '" . $type . "'");
		$search_result = executePlainSQL("SELECT COUNT(*) FROM moves WHERE type = '" . $type . "'");
		$count = OCI_Fetch_Array($search_result, OCI_BOTH);
		echo "<br>" . $count[0] . " results found <br>";
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
	$max = executePlainSQL("SELECT * FROM m1.moves WHERE m1.pp >= ALL (SELECT m2.pp FROM moves m2)");
	printResult($max);
}

function minpp(){
	$min = executePlainSQL("SELECT * FROM moves m1 WHERE m1.pp <= ALL (SELECCT m2.pp FROM MOVES m2)");
	printResult($min);
?>
	
</html>
