<html>
<h>Create Tables</h>
	<p>
		<?php
			include 'template.php';
			
			if($db_conn){
				echo "<br> CREATE TABLES <br>";
				echo "<br> 1 <br>";
				executePlainSQL("CREATE TABLE type_is (tname varchar(30),
														normal double,
														fighting double,
														flying double,
														poison double,
														ground double,
														rock double,
														bug double,
														ghost double,
														fire double,
														water double,
														grass double,
														electric double,
														psychic double,
														ice double,
														dragon double,
														PRIMARY KEY (tname))");
				echo "<br> 2 <br>";
				executePlainSQL ("CREATE TABLE moves (name varchar(30), 
														type varchar(30), 
														pp number, 
														effect varchar(255), 
														pid varchar(255)
														PRIMARY KEY (name))");
				echo "<br> 3 <br>";						
				executePlainSQL ("CREATE TABLE train_poke (tid varchar(50),
															pid varchar(255),
															PRIMARY KEY (tid, pid),
															FOREIGN KEY (tid) REFERENCES trainer,
															FOREIGN KEY (pid) REFERENCES pokemon)");
				echo "<br> 4 <br>";											
				executePlainSQL ("CREATE TABLE pokemon (pid number,
														name varchar(50),
														picture varchar(255),
														PRIMARY KEY (pid))");
				echo "<br> 5 <br>";							
				executePlainSQL ("CREATE TABLE evolve (pid number,
														requirement varchar(255),
														pid2 number,
														PRIMARY KEY (pid),
														FOREIGN KEY (pid2) REFERENCES pokemon)");
				echo "<br> 6 <br>";										
				executePlainSQL ("CREATE TABLE poke_found (pid number,
															lname varchar(255),
															PRIMARY KEY (pid),
															FOREIGN KEY (lname) REFERENCES location)");
				echo "<br> 7 <br>";											
				executePlainSQL ("CREATE TABLE used_on (entry number,
														iid varchar(255),
														pid number,
														tid varchar(255),
														PRIMARY KEY (entry),
														FOREIGN KEY (iid) REFERENCES item,
														FOREIGN KEY (pid) REFERENCES pokemon,
														FOREIGN KEY (tid) REFERENCES trainer)");
				echo "<br> 8 <br>";
				executePlainSQL ("CREATE TABLE trainer (tid varchar(255),
												party varchar(255) NOT NULL,
												PRIMARY KEY (tid))");
				echo "<br> 9 <br>";								
				executePlainSQL ("CREATE TABLE challenge (entry number,
															tid varchar(255),
															tid2 varchar(255),
															PRIMARY KEY  (number),
															FORIEGN KEY (tid) REFERENCES trainer,
															FOREIGN KEY (tid2) REFERENCES trainer)");
				echo "<br> 10 <br>";								
				executePlainSQL ("CREATE TABLE gymleader (tid varchar(255),
															type varchar(255),
															badge varchar(255),
															PRIMARY KEY (badge),
															FOREIGN KEY tid REFERENCES trainer)");
				echo "<br> 11 <br>";
				executePlainSQL ("CREATE TABLE live (tid varchar(255),
													lname varchar(255),
													PRIMARY KEY (tid, lname),
													FOREIGN KEY (tid) REFERENCES trainer,
													FOREIGN KEY (lname) REFERENCES location)");
				echo "<br> 12 <br>";									
				executePlainSQL ("CREATE TABLE item (iid varchar(255),
													type varchar(255),
													Description varchar(255),
													PRIMARY KEY (iid))");
				echo "<br> 13 <br>";									
				executePlainSQL ("CREATE TABLE item_loc (iid varchar(255),
														lname varchar(255),
														PRIMARY KEY (iid,lname))");
				echo "<br> 14 <br>";										
				executePlainSQL ("CREATE TABLE location (lname varchar(255),
														description varchar(255),
														PRIMARY KEY (lname))");
														
			 
		?>
	</p>
</html>