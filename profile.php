<?php

//need to know what to actually display
$name = $_GET['name'];
executePlainSQL("SELECT * FROM pokemon WHERE tname = '" . $name . "'");
executePlainSQL("SELECT * FROM pokemon p, type_is t WHERE p.type = t.type");
executePlainSQL("SELECT * FROM pokemon p, evolve e WHERE p.pid = e.pid OR p.pid = e.pid2");
executePlainSQL("SELECT * FROM pokemon p, poke_found f WHERE p.pid = f.pid");
?>