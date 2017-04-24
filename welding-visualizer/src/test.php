<?php
/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 23.04.2017
 * Time: 14:21
 */

include_once "valueObjects/Unit.php";
include_once "valueObjects/Material.php";
include_once "valueObjects/MaterialAttribute.php";
include_once "valueObjects/Milimeter.php";
include_once "valueObjects/Rollet.php";
include_once "valueObjects/Rule.php";
include_once "sqlStorage/MaterialAttributeStorage.php";
include_once "sqlStorage/SqlConnection.php";

$sqlConnection = new SqlConnection();
$materialAttributeStorage = new MaterialAttributeStorage($sqlConnection);

$testAttribute = new MaterialAttribute("Länge", new Milimeter(), []);

$materialAttributeStorage->insertMaterialAttribute($testAttribute);

$materialAttribute = $materialAttributeStorage->getMaterialAttributeById(1);

$myMaterialAttributes = [$materialAttribute,$materialAttribute];

$myMaterialObject = new Material($myMaterialAttributes,"Stahl");

echo json_encode($myMaterialObject);

