<?php

/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 22.04.2017
 * Time: 15:18
 */
class MaterialAttribute implements JsonSerializable
{

    /** @var string */
    private $name;

    /** @var Unit */
    private $unit;

    /** @var Rule[] */
    private $ruleArray;

    /**
     * MaterialAttribute constructor.
     * @param string $name
     * @param Unit $unit
     * @param Rule[] $ruleArray
     */
    public function __construct($name, Unit $unit, array $ruleArray)
    {
        $this->name = $name;
        $this->unit = $unit;
        $this->ruleArray = $ruleArray;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Unit
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @return Rule[]
     */
    public function getRuleArray()
    {
        return $this->ruleArray;
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
        return [
            'name' => $this->name,
            'unit' => $this->unit
        ];
    }
}