<?php

namespace GroupByOwnersServiceMain\Tests;

use GroupByOwnersServiceMain\GroupByOwnersService;
use PHPUnit\Framework\TestCase;

class GroupByOwnersServiceTest extends TestCase
{
    public function testGroupByOwners()
    {
        $files = [
            "insurance.txt" => "Company A",
            "letter.docx" => "Company A",
            "Contract.docx" => "Company B",
        ];

        $expectedResult = [
            "Company A" => ["insurance.txt", "letter.docx"],
            "Company B" => ["Contract.docx"],
        ];

        $this->assertEquals($expectedResult, GroupByOwnersService::groupByOwners($files));
    }

    public function testEmptyArray()
    {
        $files = [];
        $this->assertEquals([], GroupByOwnersService::groupByOwners($files));
    }

    public function testSingleOwnerMultipleFiles()
    {
        $files = [
            "file1.txt" => "Company X",
            "file2.txt" => "Company X",
            "file3.txt" => "Company X",
        ];

        $expectedResult = [
            "Company X" => ["file1.txt", "file2.txt", "file3.txt"],
        ];

        $this->assertEquals($expectedResult, GroupByOwnersService::groupByOwners($files));
    }
}
