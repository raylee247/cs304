<html>
	<?php
	echo $header;
	require 'template.php';
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
	<!-->OCI_close();<-->

                    
	
</html>