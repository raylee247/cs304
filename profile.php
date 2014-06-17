<?php

require 'template.php';
$name = $_GET['name'];
echo "<h>" . $name . "</h>";
$result = executePlainSQL("SELECT * 
				FROM pokemon p
				INNER JOIN type_is t ON p.type1 = t.tname OR type2 = t.tname
				WHERE p.tname = '" . $name . "'");
/*
executePlainSQL("Select * FROM pokemon p WHERE p.tname '" . $name . "'");				
executePlainSQL("SELECT * FROM pokemon p, type_is t WHERE p.type = t.type");
executePlainSQL("SELECT * FROM pokemon p, evolve e WHERE p.pid = e.pid OR p.pid = e.pid2");
executePlainSQL("SELECT * FROM pokemon p, poke_found f WHERE p.pid = f.pid");
*/
$row= OCI_Fetch_Array($result, OCI_BOTH);
echo "<img src='" . $row[2] . "' alt=picture>";
echo "<table><tr><td>PID</td><td>Types</td></tr>";
if($row[4] != "nothing"){
	echo "<tr><td>" . $row[0] . "</td><td>" . $row[3] . " " . $row[4] . "</td></tr>";
}
if($row[4] == "nothing"){
	echo "<tr><td>" . $row[0] . "</td><td>" . $row[3] . "</td></tr>";
}


echo "Damage Chart</table>";

echo "<table><tr><td>Type</td><td>Normal</td><td>Fighting</td><td>Flying</td><td>Poison</td><td>Ground</td><td>Bug</td><td>Ghost</td><td>Fire</td><td>Water</td><td>Grass</td><td>Electric</td><td>Psychic</td><td>Ice</td><td>Dragon</td></tr>";
echo "<tr>";
for($i = 5; $i <20; $i++){
	echo "<td>" . $row[$i] . "</td>";
}
echo "</tr>";
echo "</table>";
																			
?>