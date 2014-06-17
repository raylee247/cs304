<html>
	<?php
	require 'template.php';
	session_start();
	ini_set('session.save_path', '/home/i/i5a8/');
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
    
                
                <title>POKEGUIDE</title>
              
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