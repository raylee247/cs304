<html>
	<?php
	require 'template.php';
	session_start();
	ini_set('session.save_path', '/home/i/i5a8/');
	?>
   	<noscript>
    <link rel="stylesheet" href="cssmain/table.css" />
    </noscript>
    
                <head>
                <title>POKEGUIDE</title>
                </head>
                <body bgcolor="#40E0D0">
                
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


<form name="search" action="items.php" method="post">
Search Items: <input type="text" name="item"> with
<select id = "options" name = "options">
<option value= "IID"> IID</option>
<option value= "Type"> Type </option>
<option value= "Description">  Description </option>
</select>
<input type="submit" value="search">
</form> 


<?php
		if(isset($_POST['item'])){
                 $item = $_POST ['options'];
//              echo $item;
         }
         $item = ucfirst(strtolower($_POST["item"]));
		 if($item !==null){
			 $result = executePlainSQL("SELECT * FROM item WHERE type = '" . $item . "' OR iid = '" . $item ."' OR Description LIKE '%" . $item . "%'");
		}else{
			$result = executePlainSQL("SELECT * FROM item");
		}
		printItem($result);
	
function printItem($result){
	echo "<div class='Pokeguide'>";
	echo "<table>";
	echo "<tr><th>IID</th><th>Type</th><th>Description</th></tr>";
	while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
		echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td></tr>";																	
	}	
	echo "</table>";
	echo "</div>";
}
?>       
                        
</html>