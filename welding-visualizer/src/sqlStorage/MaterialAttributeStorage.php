<?php

/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 23.04.2017
 * Time: 13:55
 */
class MaterialAttributeStorage
{

    /** @var SqlConnection */
    private $sqlConnection;

    /**
     * MaterialAttributeStorage constructor.
     * @param SqlConnection $sqlConnection
     */
    public function __construct(SqlConnection $sqlConnection)
    {
        $this->sqlConnection = $sqlConnection;
    }

    /**
     * @param $id
     * @return MaterialAttribute
     */
    public function getMaterialAttributeById($id) {

        $escapedId = $this->sqlConnection->escape($id);
        $sqlQuery = 'SELECT name, unit FROM attributes WHERE attribute_id = ' . $escapedId . ';';
        $resultArray = $this->sqlConnection->selectQuery($sqlQuery);

        if (empty($resultArray)) {
            throw new Exception('no material attribute found for id ' . $id);
        }

        var_dump($resultArray);

        $materialAttribute = new MaterialAttribute(
            $resultArray['name'],
            Unit::fromString($resultArray['unit']),
            []
        );
        return $materialAttribute;
    }

    /**
     * @param MaterialAttribute $materialAttribute
     */
    public function insertMaterialAttribute(MaterialAttribute $materialAttribute) {

        $escapedName = $this->sqlConnection->escape($materialAttribute->getName());
        $escapedUnit = $this->sqlConnection->escape($materialAttribute->getUnit()->asString());
        $sqlQuery = 'INSERT INTO `attributes` (`name`, `unit`) VALUES ("'. $escapedName .'","' . $escapedUnit . '");';
        $this->sqlConnection->InsertQuery($sqlQuery);
    }
}