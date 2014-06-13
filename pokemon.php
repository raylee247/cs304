<html>
<?php
	require 'template.php';
	echo $header;
?>
		<body class="loading">
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">
				<!-- Header -->
					<header id="pokemon">
					<?php
						$result = executePlainSQL("select * from pokemon");
						echo '<table>';
						while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
							for($i = 0; $i <= 1; $i++){
								echo "<tr><td>" . $row[$i] . "</td></tr>"; 
							}
							//echo '<tr><img src="' . $row[2] . '" alt="picture"></tr>';
						}
						echo '</table>';
					?>
					</header>
				<!-- Footer -->
					<footer id="footer">
						<span class="copyright">copyright @ PokeGuide 2014</span>
					</footer>
				
			</div>
		</div>
	</body>
</html>