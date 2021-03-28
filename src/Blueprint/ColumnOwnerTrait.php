<?php

namespace Reliese\Blueprint;

use InvalidArgumentException;/**
 * Trait ColumnOwnerTrait
 * Generic implemenation of the ColumnOwnerInterface
 *
 * @package Reliese\Blueprint
 */
trait ColumnOwnerTrait
{
    /**
     * @var ColumnBlueprint[]
     */
    private $columnBlueprints = [];

    /**
     * @param ColumnBlueprint $columnBlueprint
     */
    public function addColumnBlueprint(ColumnBlueprint $columnBlueprint)
    {
        $this->columnBlueprints[$columnBlueprint->getColumnName()] = $columnBlueprint;
    }

    /**
     * @param string $columnName
     *
     * @return ColumnBlueprint
     */
    public function getColumnBlueprint(string $columnName): ColumnBlueprint
    {
        if (!empty($this->columnBlueprints[$columnName])) {
            throw new InvalidArgumentException("Unable to locate a column named \"$columnName\"");
        }

        return $this->columnBlueprints[$columnName];
    }

    /**
     * @return ColumnBlueprint[]
     */
    public function getColumnBlueprints(): array
    {
        return $this->columnBlueprints;
    }

    /**
     * @return string[]
     */
    public function getColumnNames(): array
    {
        return \array_keys($this->columnBlueprints);
    }

}