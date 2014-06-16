<html>
<header>
<?php
require 'template.php';
ini_set('session.save_path', '/home/i/i5a8/');
session_start();
?>

Login Page<br>
</header>
<body>

<form name="input" action="login.php" method="post">
UserName: <input type="text" name="username"><br>
Password: <input type="password" name="password">
<input type="submit" value="login">
</form> 
<br>
<button onclick="location.href = 'register.php';">Register Here</button>

 
<?php
global $db_conn;

//IF FORM IS SUBMITTED ALREADY
if (isset($_POST['username']) and isset($_POST['password'])){
$username = $_POST['username'];
$password = $_POST['password'];

//CHECK IF VALUES ARE IN THE DATABASE

$results = executePlainSQL("select * from users where userid='{$username}' and password='{$password}'");
OCICommit($db_conn);
$arrayResults = OCI_Fetch_Array($results,OCI_BOTH);
OCILogoff($db_conn);

if($arrayResults[0] != null)
{
$_SESSION["username"] = $_POST["username"];
$_SESSION["login"]= true;
header("Location: user.php");

}
else
{
echo "<br>Wrong password or username<br>";
}
}

?>

</body>
<html>
