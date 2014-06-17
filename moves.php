
<html>
	<?php
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
                    
                    
         <form name="input" action="moves.php" method="get" style="float:left">
          Search Moves: <input type="text" name="move"> with
         <input type="submit" value="search">
         </form>
 
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

		<?php
         if($_POST['submit'] && $_POST['submit'] != 0){
            $type=$_POST['types'];
            echo $type;
        }
         $move = ucfirst(strtolower($_GET["move"]));
         if($move != null){
                 //$pokemon = ucfirst($_POST["pokemon"]);
                 $result = executePlainSQL("SELECT * FROM moves WHERE name = '" . $move . "' OR name LIKE '%" . $move . "%'");
         }
		 else{
                 $result = executePlainSQL("SELECT * FROM moves");
         }
        printResult($result);
         
		 
		function printResult($result){
			echo "<div class='Pokeguide'>";
			echo "<table>";
			echo "<tr><td>Types</td><td>Normal</td><td>Fighting</td><td>Flying</td><td>Poison</td><td>Ground</td><td>Rock</td><td>Bug</td><td>Ghost</td><td>Fire</td><td>Water</td><td>Grass</td><td>Electric</td><td>Psychic</td><td>Ice</td><td>Dragon</td></tr>";
			while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
				echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td>" . $row[5] . "</td><td>" . $row[6] . "</td><td>" . $row[7] . "</td><td>" . $row[8] . "</td><td>" . $row[9] . "</td><td>" . $row[10] . "</td><td>" . $row[11] . "</td><td>" . $row[12] . "</td><td>" . $row[13] . "</td><td>" . $row[14] . "</td><td>" . $row[15] . "</td></tr>";																	
				}	
			echo "</table>";
			echo "</div>";
			}
  
		?>
        
        	<!-->OCI_close();<-->

 </html>
