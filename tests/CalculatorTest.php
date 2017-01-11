<?php

namespace App;

use App\Calculator;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
    private $calculator;

    public function setUp() 
    {
        $this->calculator = new Calculator;
    }

    public function testGetItem()
    {
        // arrange
        $this->addDefaultMockData();
        $expectSize = 11;

        // act
        $actual = $this->calculator->getItem();

        // assert
        $this->assertEquals($expectSize, count($actual));
    }

    public function testCalculateCostByGroup()
    {
        // arrange
        $this->addDefaultMockData();
        $property = 'Cost';
        $groupSize = 3;
        $expect = [6, 15, 24, 21];

        // act
        $actual = $this->calculator->calculateSumByGroup($property, $groupSize);

        // assert
        $this->assertEquals($expect, $actual);
    }

    public function testCalculateRevenueByGroup()
    {
        // arrange
        $this->addDefaultMockData();
        $property = 'Revenue';
        $groupSize = 4;
        $expect = [50, 66, 60];

        // act
        $actual = $this->calculator->calculateSumByGroup($property, $groupSize);

        // assert
        $this->assertEquals($expect, $actual);
    }

    public function testCalculateEmployeeOffDayByGroup()
    {
        // arrange
        $this->addEmployeeOffDayStatusMockData();
        $property = 'OffDay';
        $groupSize = 2;
        $expect = [25, 32, 72, 9, 23, 28];

        // act
        $actual = $this->calculator->calculateSumByGroup($property, $groupSize);

        // assert
        $this->assertEquals($expect, $actual);
    }

    private function addDefaultMockData()
    {
        $this->calculator->addItem(['Id' => 1, 'Cost' => 1, 'Revenue' => 11, 'SellPrice' => 21]);
        $this->calculator->addItem(['Id' => 2, 'Cost' => 2, 'Revenue' => 12, 'SellPrice' => 22]);
        $this->calculator->addItem(['Id' => 3, 'Cost' => 3, 'Revenue' => 13, 'SellPrice' => 23]);
        $this->calculator->addItem(['Id' => 4, 'Cost' => 4, 'Revenue' => 14, 'SellPrice' => 24]);
        $this->calculator->addItem(['Id' => 5, 'Cost' => 5, 'Revenue' => 15, 'SellPrice' => 25]);
        $this->calculator->addItem(['Id' => 6, 'Cost' => 6, 'Revenue' => 16, 'SellPrice' => 26]);
        $this->calculator->addItem(['Id' => 7, 'Cost' => 7, 'Revenue' => 17, 'SellPrice' => 27]);
        $this->calculator->addItem(['Id' => 8, 'Cost' => 8, 'Revenue' => 18, 'SellPrice' => 28]);
        $this->calculator->addItem(['Id' => 9, 'Cost' => 9, 'Revenue' => 19, 'SellPrice' => 29]);
        $this->calculator->addItem(['Id' => 10, 'Cost' => 10, 'Revenue' => 20, 'SellPrice' => 30]);
        $this->calculator->addItem(['Id' => 11, 'Cost' => 11, 'Revenue' => 21, 'SellPrice' => 31]);
    }

    private function addEmployeeOffDayStatusMockData()
    {
        $this->calculator->addItem(['EmployeeId' => 1, 'OffDay' => 10, 'WorkDay' => 30]);
        $this->calculator->addItem(['EmployeeId' => 2, 'OffDay' => 15, 'WorkDay' => 25]);
        $this->calculator->addItem(['EmployeeId' => 3, 'OffDay' => 20, 'WorkDay' => 20]);
        $this->calculator->addItem(['EmployeeId' => 4, 'OffDay' => 12, 'WorkDay' => 28]);
        $this->calculator->addItem(['EmployeeId' => 5, 'OffDay' => 24, 'WorkDay' => 16]);
        $this->calculator->addItem(['EmployeeId' => 6, 'OffDay' => 48, 'WorkDay' => 0]);
        $this->calculator->addItem(['EmployeeId' => 7, 'OffDay' => 3, 'WorkDay' => 37]);
        $this->calculator->addItem(['EmployeeId' => 8, 'OffDay' => 6, 'WorkDay' => 34]);
        $this->calculator->addItem(['EmployeeId' => 9, 'OffDay' => 9, 'WorkDay' => 31]);
        $this->calculator->addItem(['EmployeeId' => 10, 'OffDay' => 14, 'WorkDay' => 26]);
        $this->calculator->addItem(['EmployeeId' => 11, 'OffDay' => 28, 'WorkDay' => 12]);
    }

}
