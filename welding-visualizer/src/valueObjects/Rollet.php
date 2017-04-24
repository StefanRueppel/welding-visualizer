<?php

/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 22.04.2017
 * Time: 15:13
 */
class Rollet implements JsonSerializable {
    /** @var Material */
    private $material;

    /**
     * Rollet constructor.
     * @param Material $material
     */
    public function __construct(Material $material)
    {
        $this->material = $material;
    }


    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize()
    {
        return $this->material;

    }
}