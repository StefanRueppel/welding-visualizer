<?php

/**
 * Created by PhpStorm.
 * User: Stefan
 * Date: 22.04.2017
 * Time: 15:20
 */
abstract class Unit
{

    /**
     * @param string $unit
     * @return Milimeter
     * @throws Exception
     */
    public static function fromString($unit)
    {
        if ($unit === 'mm') {
            return new Milimeter();
        }

        throw new Exception('unknown unit');
    }

    public abstract function asString();
}