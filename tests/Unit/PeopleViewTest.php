<?php

use App\People;
use App\PeopleView;
use App\MissingFieldException;
use PHPUnit\Framework\TestCase;

class PeopleViewTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();

        $this->peoplePath = "tests/people.json";
        $this->people = new People($this->peoplePath);

        $this->bob = (object) [
            'FName' => 'Bob',
            'LName' => 'Rasputin',
            'Age' => 25,
        ];
        $this->larry = (object) [
            'FName' => 'Larry',
            'LName' => 'polanski',
            'Age' => 25,
        ];
        $this->max = (object) [
            'FName' => 'Max',
            'LName' => 'Xzavier',
            'Age' => 29,
        ];
    }

    /** @test */
    public function expectedDataForViewIsReturned()
    {
        $request = [
            'sort_by' => 'FName',
            'sort_order' => 'ASC'
        ];

        $peopleView = new PeopleView($request, $this->peoplePath, 'FName', 'ASC');

        $expected = [
            'errors' => [],
            'selectedSortOrder' => 'ASC',
            'selectedSortBy' => 'FName',
            'availableFields' => [
                'FName',
                'LName',
                'Age',
            ],
            'people' => [
                $this->bob,
                $this->larry,
                $this->max,
            ],
        ];

        $this->assertEquals($expected, $peopleView->getData());
    }
}
