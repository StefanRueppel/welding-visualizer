<?php

/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 23.04.2017
 * Time: 13:56
 */
class SqlConnection
{

    const HOST = "localhost";
    const DATABASE = "welding visualizer";
    const USER = "root";
    const PASSWORD = "";

    /** @var mysqli */
    private $mysqlConnection;

    public function __construct()
    {

        $this->mysqlConnection = mysqli_connect(self::HOST, self::USER, self::PASSWORD, self::DATABASE);
    }

    private function dbQuery($sqlQuery)
    {
        $mysqlResult = mysqli_query($this->mysqlConnection, $sqlQuery);
        if ($mysqlResult === false) {
            throw new Exception('failed sql query: ' . $sqlQuery . '. message: ' . mysqli_error($this->mysqlConnection));
        }
        return $mysqlResult;
    }

    /**
     * @param string $sqlQuery
     * @return array
     * @throws Exception
     */
    public function selectQuery($sqlQuery) {

        /** @var mysqli_result $mySqlResult */
        $mySqlResult = $this->dbQuery($sqlQuery);
        if (!$mySqlResult instanceof mysqli_result) {
            throw new Exception('select query has no result');
        }
        return $mySqlResult->fetch_assoc();
    }

    public function insertQuery($sqlQuery) {

        /** @var mysqli_result $mySqlResult */
        $mySqlResult = $this->dbQuery($sqlQuery);
        if ($mySqlResult instanceof mysqli_result) {
            throw new Exception('insert query has no result');
        }
    }

    /**
     * @param string $id
     * @return string
     */
    public function escape($id)
    {
        return mysqli_real_escape_string($this->mysqlConnection, $id);
    }
}