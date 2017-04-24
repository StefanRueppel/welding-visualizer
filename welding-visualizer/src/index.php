<?php
define("HOST", "localhost");
define("DATABASE", "welding visualizer");
define("ADMINISTRATOR", "root");
define("PASSWORD", "");

include_once "src/valueObjects/Unit.php";
include_once "src/valueObjects/Material.php";
include_once "src/valueObjects/MaterialAttribute.php";
include_once "src/valueObjects/Milimeter.php";
include_once "src/valueObjects/Rollet.php";
include_once "src/valueObjects/Rule.php";


function db_connect($sqlHost, $sqlAdministrator, $sqlPassword, $sqlDatabase)
{
    $mysqlConnection = mysqli_connect($sqlHost, $sqlAdministrator, $sqlPassword, $sqlDatabase);
    return $mysqlConnection;
}

function db_disconnect($sqlConnection)
{
    $mysqlConnection = mysqli_close($sqlConnection);
    return $mysqlConnection;
}

function db_reset($sqlConnection,$sqlPw)
{
    if ($sqlPw == PASSWORD) { echo "delete database";}
    else echo "wrong password";
    return $sqlConnection;
}

function db_query($sqlConnection,$sqlQuery)
{
  $mysqlConnection = mysqli_query($sqlConnection,$sqlQuery);
    return $mysqlConnection;
}



/*
$myAttributes = [new MaterialAttribute("Härte", new Milimeter(), [])];

$meinMaterial = new Material($myAttributes, "Stahl");

$Rollet1 = new Rollet($meinMaterial);

echo json_encode($Rollet1);
*/

$mysqlConnection = db_connect(HOST, ADMINISTRATOR, PASSWORD, DATABASE);
echo $mysqlConnection->get_server_info();

$mysqlConnection = db_disconnect($mysqlConnection);
echo $mysqlConnection;

?>