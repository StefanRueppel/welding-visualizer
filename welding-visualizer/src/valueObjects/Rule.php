<?php

/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 22.04.2017
 * Time: 15:21
 */
class Rule
{

    /** @var string */
    private $name;

    /** @var string */
    private $description;

    /**
     * Rule constructor.
     * @param string $name
     * @param string $description
     */
    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

}