<?php

/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 22.04.2017
 * Time: 15:15
 */
class Material implements JsonSerializable
{

    /** @var MaterialAttribute[] */
    private $attributes;

    /** @var string */
    private $name;

    /**
     * Material constructor.
     * @param MaterialAttribute[] $attributes
     * @param string $name
     */
    public function __construct(array $attributes, $name)
    {
        $this->attributes = $attributes;
        $this->name = $name;
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
        return $this->attributes;
    }
}