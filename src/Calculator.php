<?php

namespace App;

class Calculator
{
    private $item = null;

    public function __construct()
    {
        $this->item = [];
    }

    public function addItem(Array $item)
    {
        $this->item[] = $item;
    }

    public function getItem() 
    {
        return $this->item;
    }

    public function calculateSumByGroup($property, $groupSize)
    {
        if (!is_string($property)) {
            throw new \Exception('Property must be a string.');
        }

        if (!is_int($groupSize)) {
            throw new \Exception('GroupSize must be a integer.');
        }

        $index = 1;
        $no = 0;
        $sum[$no] = 0;

        foreach ($this->item as $item) {
            if (!isset($item[$property])) {
                throw new \Exception('Property not found.');
            }

            if (!is_numeric($item[$property])) {
                throw new \Exception('Data must be numeric.');
            }

            $sum[$no] += $item[$property];

            if (0 === $index % $groupSize) {
                $no++;
                $sum[$no] = 0;
            }

            $index++;
        }

        return $sum;
    }
}
