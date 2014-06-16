<html>
<header>
<?php
require 'template.php';
session_start();
?>

Register Page<br>
</header>
<body>

<form name="input" action="register.php" method="post">
UserName: <input type="text" name="username"><br>
Password: <input type="password" name="password">
<input type="submit" value="register">
</form> 
<br>
<button onclick="location.href = 'login.php';">Login Here</button>

<?php
global $db_conn;
if (isset($_POST['username']) and isset($_POST['password'])){
$username = $_POST['username'];
$password = $_POST['password'];


$results = executePlainSQL("select userid from users where userid= '{$username}'");
$arrayResults = OCI_Fetch_Array($results,OCI_BOTH);


if($arrayResults[0] != null)
{
echo 'The username has already been taken, Try another username';
}
else
{
executePlainSQL("insert into party values ('{$username}','1')");
executePlainSQL("insert into users values ('{$username}','{$password}','{$username}')");
header("Location: login.php");
}
OCICommit($db_conn);
OCILogoff($db_conn);

}
?>

</body>
<html>
